<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Det_konversi_model extends CI_Model
{

    public $table = 'det_konversi';
    public $id = 'id_det_konv';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_det_konv,id_konversi,id_sintesis,bobot_ahp,status_dipilih');
        $this->datatables->from('det_konversi');
        //add this line for join
        //$this->datatables->join('table2', 'det_konversi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('det_konversi/read/$1'),'Read')." | ".anchor(site_url('det_konversi/update/$1'),'Update')." | ".anchor(site_url('det_konversi/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_det_konv');
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
        $this->db->like('id_det_konv', $q);
	$this->db->or_like('id_konversi', $q);
	$this->db->or_like('id_sintesis', $q);
	$this->db->or_like('bobot_ahp', $q);
	$this->db->or_like('status_dipilih', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_det_konv', $q);
	$this->db->or_like('id_konversi', $q);
	$this->db->or_like('id_sintesis', $q);
	$this->db->or_like('bobot_ahp', $q);
	$this->db->or_like('status_dipilih', $q);
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