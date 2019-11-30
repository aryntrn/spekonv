<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sintesis_alternatif_model extends CI_Model
{

    public $table = 'sintesis_alternatif';
    public $id = 'id_sintesis';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_sintesis,id_mk_amikom,id_mk_asal,nilai_asli,id_rules');
        $this->datatables->from('sintesis_alternatif');
        //add this line for join
        //$this->datatables->join('table2', 'sintesis_alternatif.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('sintesis_alternatif/read/$1'),'Read')." | ".anchor(site_url('sintesis_alternatif/update/$1'),'Update')." | ".anchor(site_url('sintesis_alternatif/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_sintesis');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    //nampilin semua hasil perhitungan ahp berdasar jurusan (univ)
    function get_by_univ($idjurusan){

        $this->db->select('m_am.*,m_d3.*,r.*,s.*');
        $this->db->from('sintesis_alternatif as s');
        $this->db->join('mk_amikom as m_am','m_am.id_mk_amikom = s.id_mk_amikom', 'inner');
        $this->db->join('mk_kampus_asal as m_d3', 'm_d3.id_mk_asal = s.id_mk_asal', 'inner');
        $this->db->join('ratings as r','r.id_ratings = s.id_ratings', 'inner');
        $this->db->join('kampus_asal as k','k.id_jurusan = m_d3.id_jurusan', 'inner');
        $this->db->where('k.id_jurusan',$idjurusan);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_sintesis', $q);
    	$this->db->or_like('id_mk_amikom', $q);
    	$this->db->or_like('id_mk_asal', $q);
    	$this->db->or_like('nilai_asli', $q);
    	$this->db->or_like('id_rules', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_sintesis', $q);
    	$this->db->or_like('id_mk_amikom', $q);
    	$this->db->or_like('id_mk_asal', $q);
    	$this->db->or_like('nilai_asli', $q);
    	$this->db->or_like('id_rules', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
