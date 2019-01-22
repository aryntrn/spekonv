<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mk_kampus_asal_model extends CI_Model
{

    public $table = 'mk_kampus_asal';
    public $id = 'id_mk_asal';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_mk_asal,id_jurusan,nama_indo,nama_inggris,jml_sks');
        $this->datatables->from('mk_kampus_asal');
        //add this line for join
        //$this->datatables->join('table2', 'mk_kampus_asal.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('mk_kampus_asal/read/$1'),'Read')." | ".anchor(site_url('mk_kampus_asal/update/$1'),'Update')." | ".anchor(site_url('mk_kampus_asal/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_mk_asal');
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

    // get nama matkul by id
    function get_info_mk_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_mk_asal', $q);
	$this->db->or_like('id_jurusan', $q);
	$this->db->or_like('nama_indo', $q);
	$this->db->or_like('nama_inggris', $q);
	$this->db->or_like('jml_sks', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_mk_asal', $q);
	$this->db->or_like('id_jurusan', $q);
	$this->db->or_like('nama_indo', $q);
	$this->db->or_like('nama_inggris', $q);
	$this->db->or_like('jml_sks', $q);
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
