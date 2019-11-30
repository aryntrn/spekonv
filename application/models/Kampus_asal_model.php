<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kampus_asal_model extends CI_Model
{

    public $table = 'kampus_asal';
    public $id = 'id_jurusan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
 
    // datatables
    function json() {
        $this->datatables->select('id_jurusan,nama_univ,nama_jurusan,th_angkatan');
        $this->datatables->from('kampus_asal');
        //add this line for join
        //$this->datatables->join('table2', 'kampus_asal.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kampus_asal/read/$1'),'Read')." | ".anchor(site_url('kampus_asal/update/$1'),'Update')." | ".anchor(site_url('kampus_asal/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_jurusan');
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

    //get name univ by id
     function get_name_by_id($id)
    {
        $this->db->select('nama_univ');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_jurusan', $q);
    	$this->db->or_like('nama_univ', $q);
    	$this->db->or_like('nama_jurusan', $q);
    	$this->db->or_like('th_angkatan', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jurusan', $q);
    	$this->db->or_like('nama_univ', $q);
    	$this->db->or_like('nama_jurusan', $q);
    	$this->db->or_like('th_angkatan', $q);
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
