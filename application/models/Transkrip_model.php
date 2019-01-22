<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transkrip_model extends CI_Model
{

    public $table = 'transkrip';
    public $id = 'id_transkrip';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_transkrip,nim,id_jurusan');
        $this->datatables->from('transkrip');
        //add this line for join
        //$this->datatables->join('table2', 'transkrip.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transkrip/read/$1'),'Read')." | ".anchor(site_url('transkrip/update/$1'),'Update')." | ".anchor(site_url('transkrip/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_transkrip');
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

    // get id transkrip
    function get_id($nim)
    {
        $this->db->select('id_transkrip');
        $this->db->where('nim', $nim);
        return $this->db->get($this->table)->row()->id_transkrip;
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transkrip', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('id_jurusan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transkrip', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('id_jurusan', $q);
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
