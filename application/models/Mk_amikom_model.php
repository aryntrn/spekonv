<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mk_amikom_model extends CI_Model
{

    public $table = 'mk_amikom';
    public $id = 'id_mk_amikom';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_mk_amikom,id_ta,nama,jml_sks,jenis,rps,prasyarat');
        $this->datatables->from('mk_amikom');
        //add this line for join
        //$this->datatables->join('table2', 'mk_amikom.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('mk_amikom/read/$1'),'Read')." | ".anchor(site_url('mk_amikom/update/$1'),'Update')." | ".anchor(site_url('mk_amikom/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_mk_amikom');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    //get mk amikom di ta yang aktif 
    // $ta_aktif = id tahun ajar yang sedang berjalan
    function get_list_mk($ta_aktif){
        $this->db->select('mk_amikom.*');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_ta = mk_amikom.id_ta');
        $this->db->where('tahun_ajaran.id_ta', $ta_aktif);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_mk_amikom', $q);
    	$this->db->or_like('id_ta', $q);
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('jml_sks', $q);
    	$this->db->or_like('jenis', $q);
    	$this->db->or_like('rps', $q);
    	$this->db->or_like('prasyarat', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_mk_amikom', $q);
    	$this->db->or_like('id_ta', $q);
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('jml_sks', $q);
    	$this->db->or_like('jenis', $q);
    	$this->db->or_like('rps', $q);
    	$this->db->or_like('prasyarat', $q);
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
