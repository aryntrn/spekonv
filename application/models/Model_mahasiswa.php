<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_mahasiswa extends CI_Model
{

    public $table = 'mahasiswa';
    public $id = 'nim';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('nim,nama,id_jurusan_d3,no_hp');
        $this->datatables->from('mahasiswa');
        //add this line for join
        //$this->datatables->join('table2', 'mahasiswa.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('c_mahasiswa/read/$1'),'Read')." | ".anchor(site_url('c_mahasiswa/update/$1'),'Update')." | ".anchor(site_url('c_mahasiswa/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'nim');
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nim', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('id_jurusan_d3', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nim', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('id_jurusan_d3', $q);
	$this->db->or_like('no_hp', $q);
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
