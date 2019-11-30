<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DefModel extends CI_Model{
	// File ini berisi function model CRUD, import yang bisa digunakan untuk semua model yang menerapkannya


	public $table = '';
	public $id = '';
	public $order = '';

	function __construct()
    {
        parent::__construct();
    }

    function set_table($tablename, $idfield){
    	$this->table = $tablename;
    	$this->id = $id_field;
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

    //get all data
    function getall()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    //get by id
    function getbyid($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}