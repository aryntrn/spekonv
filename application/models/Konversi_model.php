<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konversi_model extends CI_Model
{

    public $table = 'konversi';
    public $id = 'id_konversi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_konversi,nim,total_sks,ipk,status_acc_mhs,status_acc_petugas');
        $this->datatables->from('konversi');
        //add this line for join
        //$this->datatables->join('table2', 'konversi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('konversi/read/$1'),'Read')." | ".anchor(site_url('konversi/update/$1'),'Update')." | ".anchor(site_url('konversi/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_konversi');
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
        $this->db->like('id_konversi', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('total_sks', $q);
	$this->db->or_like('ipk', $q);
	$this->db->or_like('status_acc_mhs', $q);
	$this->db->or_like('status_acc_petugas', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_konversi', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('total_sks', $q);
	$this->db->or_like('ipk', $q);
	$this->db->or_like('status_acc_mhs', $q);
	$this->db->or_like('status_acc_petugas', $q);
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