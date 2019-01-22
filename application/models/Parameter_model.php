<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parameter_model extends CI_Model
{

    public $table = 'parameter';
    public $id = 'id_rules';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_rules,id_kriteria,nama_param,jenis_param,param_angka,batas_min,batas_max,nilai_skala_ahp');
        $this->datatables->from('parameter');
        //add this line for join
        //$this->datatables->join('table2', 'parameter.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('parameter/read/$1'),'Read')." | ".anchor(site_url('parameter/update/$1'),'Update')." | ".anchor(site_url('parameter/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_rules');
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
        $this->db->like('id_rules', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('nama_param', $q);
	$this->db->or_like('jenis_param', $q);
	$this->db->or_like('param_angka', $q);
	$this->db->or_like('batas_min', $q);
	$this->db->or_like('batas_max', $q);
	$this->db->or_like('nilai_skala_ahp', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_rules', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('nama_param', $q);
	$this->db->or_like('jenis_param', $q);
	$this->db->or_like('param_angka', $q);
	$this->db->or_like('batas_min', $q);
	$this->db->or_like('batas_max', $q);
	$this->db->or_like('nilai_skala_ahp', $q);
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
