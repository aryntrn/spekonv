<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Det_transkrip_model extends CI_Model
{

    public $table = 'det_transkrip';
    public $table2 = 'mk_kampus_asal';
    public $id = 'id_det_transkrip';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_det_transkrip,id_transkrip,id_mk_asal,rps,nilai');
        $this->datatables->from('det_transkrip');
        //add this line for join
        //$this->datatables->join('table2', 'det_transkrip.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('det_transkrip/read/$1'),'Read')." | ".anchor(site_url('det_transkrip/update/$1'),'Update')." | ".anchor(site_url('det_transkrip/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_det_transkrip');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('d3.nama_indo, d3.jml_sks, det_transkrip.*');
        $this->db->join('mk_kampus_asal as d3', 'd3.id_mk_asal=det_transkrip.id_mk_asal');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where('$this->id', $id);
        return $this->db->get($this->table)->row();
    }

    function get_transkrip($nim){
        $this->db->select('d3.nama_indo, d3.jml_sks, det_transkrip.*');
        $this->db->join('mk_kampus_asal as d3', 'd3.id_mk_asal=det_transkrip.id_mk_asal');
        $this->db->join('transkrip', 'transkrip.id_transkrip=det_transkrip.id_transkrip');
        $this->db->where('transkrip.nim', $nim);
        return $this->db->get($this->table)->result();
    }

    // get detail transkrip tiap mahasiswa - untuk level mahasiswa
    function get_transkrip_mhs($id_trskrp)
    {
        $this->db->select('det_transkrip.id_det_transkrip as iddet, mk_kampus_asal.nama_indo as nama, mk_kampus_asal.jml_sks as sks, det_transkrip.rps as rps');
        $this->db->join('mk_kampus_asal', 'det_transkrip.id_mk_asal = mk_kampus_asal.id_mk_asal');
        $this->db->where('id_transkrip', $id_trskrp);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_det_transkrip', $q);
	$this->db->or_like('id_transkrip', $q);
	$this->db->or_like('id_mk_asal', $q);
	$this->db->or_like('rps', $q);
	$this->db->or_like('nilai', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_det_transkrip', $q);
	$this->db->or_like('id_transkrip', $q);
	$this->db->or_like('id_mk_asal', $q);
	$this->db->or_like('rps', $q);
	$this->db->or_like('nilai', $q);
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
