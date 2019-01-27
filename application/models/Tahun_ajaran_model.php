<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahun_ajaran_model extends CI_Model
{

    public $table = 'tahun_ajaran';
    public $id = 'id_ta';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');    
    }

    // datatables
    function json() {
        $this->datatables->select('id_ta,tahun,deskripsi,status');
        $this->datatables->from('tahun_ajaran');
        //add this line for join
        //$this->datatables->join('table2', 'tahun_ajaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tahun_ajaran/read/$1'),'Read')." | ".anchor(site_url('tahun_ajaran/update/$1'),'Update')." | ".anchor(site_url('tahun_ajaran/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_ta');
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
    
    //get tahun ajar berdasar id
    function get_name_ta($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row()->tahun;
    }

    //get tahun ajar berdasar id
    function get_ta_aktif()
    {
        $this->db->where('status', 'berjalan');
        return $this->db->get($this->table)->row()->id_ta;
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_ta', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // atur semua status jadi tidak aktif saat ada pergantian tahun ajar yang aktif
    function off_another_ta(){
        $id = $this->get_ta_aktif();
        $data = array('status' => 'tdk_aktif');
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_ta', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('status', $q);
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
