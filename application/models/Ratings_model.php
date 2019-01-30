<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ratings_model extends CI_Model
{

    public $table = 'ratings';
    public $id = 'id_ratings';
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_ratings', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('jenis_param', $q);
	$this->db->or_like('param_angka', $q);
	$this->db->or_like('batas_min', $q);
	$this->db->or_like('batas_max', $q);
	$this->db->or_like('priorities_ratings', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    function get_ratings_by_kriteria($id){
        $this->db->select('kriteria.*,ratings.*');
        $this->db->join('kriteria','kriteria.id_kriteria=ratings.id_kriteria');
        $this->db->where('ratings.id_kriteria',$id);
        return $this->db->get($this->table)->result();
    }

    function total_rows_by_kriteria($id_kriteria){
        $this->db->select('kriteria.*,ratings.*');
        $this->db->join('kriteria','kriteria.id_kriteria=ratings.id_kriteria');
        $this->db->where('ratings.id_kriteria',$id_kriteria);
        $this->db->from($this->table);
        return $this->db->count_all_results();   
    }
    

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_ratings', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('jenis_param', $q);
	$this->db->or_like('param_angka', $q);
	$this->db->or_like('batas_min', $q);
	$this->db->or_like('batas_max', $q);
	$this->db->or_like('priorities_ratings', $q);
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
