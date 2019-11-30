<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perhitungan_model extends CI_Model
{

    public $table = 'perhitungan';
    public $id = 'id_phtg';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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

    function get_id($mkam,$mkas){
        $this->db->select('id_phtg');
        $this->db->where('id_mk_amikom',$mkam);
        $this->db->where('id_mk_asal',$mkas);
        return $this->db->get($this->table)->row()->id_phtg;
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_phtg', $q);
	$this->db->or_like('id_mk_amikom', $q);
	$this->db->or_like('id_mk_asal', $q);
	$this->db->or_like('total_hitung_ahp', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_phtg', $q);
    	$this->db->or_like('id_mk_amikom', $q);
    	$this->db->or_like('id_mk_asal', $q);
    	$this->db->or_like('total_hitung_ahp', $q);
    	$this->db->or_like('status', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_by_univ($idj){
        $this->db->select('p.*,m_as.*,m_am.*');
        $this->db->from('perhitungan as p');
        $this->db->join('mk_kampus_asal as m_as','p.id_mk_asal=m_as.id_mk_asal');
        $this->db->join('mk_amikom as m_am','p.id_mk_amikom=m_am.id_mk_amikom');
        $this->db->join('kampus_asal as k','k.id_jurusan = m_as.id_jurusan');
        $this->db->where('m_as.id_jurusan',$idj);
        $this->db->order_by('p.total_hitung_ahp', $this->order);
        $this->db->group_by('p.id_mk_asal');
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