<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{

    public $table = 'kriteria';
    public $id = 'id_kriteria';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_kriteria,nama,deskripsi');
        $this->datatables->from('kriteria');
        //add this line for join
        //$this->datatables->join('table2', 'kriteria.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kriteria/read/$1'),'Read')." | ".anchor(site_url('kriteria/update/$1'),'Update')." | ".anchor(site_url('kriteria/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kriteria');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('nilai_kriteria.*, kriteria.*');
        $this->db->join('nilai_kriteria','kriteria.id_kriteria = nilai_kriteria.id_kriteria_asal AND kriteria.id_kriteria = nilai_kriteria.id_kriteria_tujuan');
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
        $this->db->like('id_kriteria', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kriteria', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('deskripsi', $q);
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
