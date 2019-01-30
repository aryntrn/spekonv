<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ratings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ratings_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ratings/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ratings/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ratings/index.html';
            $config['first_url'] = base_url() . 'ratings/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ratings_model->total_rows($q);
        $ratings = $this->Ratings_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ratings_data' => $ratings,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('ratings/ratings_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ratings_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ratings' => $row->id_ratings,
		'id_kriteria' => $row->id_kriteria,
		'nama' => $row->nama,
		'jenis_param' => $row->jenis_param,
		'param_angka' => $row->param_angka,
		'batas_min' => $row->batas_min,
		'batas_max' => $row->batas_max,
		'priorities_ratings' => $row->priorities_ratings,
	    );
            $this->load->view('ratings/ratings_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ratings'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ratings/create_action'),
	    'id_ratings' => set_value('id_ratings'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'nama' => set_value('nama'),
	    'jenis_param' => set_value('jenis_param'),
	    'param_angka' => set_value('param_angka'),
	    'batas_min' => set_value('batas_min'),
	    'batas_max' => set_value('batas_max'),
	    'priorities_ratings' => set_value('priorities_ratings'),
	);
        $this->load->view('ratings/ratings_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_param' => $this->input->post('jenis_param',TRUE),
		'param_angka' => $this->input->post('param_angka',TRUE),
		'batas_min' => $this->input->post('batas_min',TRUE),
		'batas_max' => $this->input->post('batas_max',TRUE),
		'priorities_ratings' => $this->input->post('priorities_ratings',TRUE),
	    );

            $this->Ratings_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ratings'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ratings_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ratings/update_action'),
		'id_ratings' => set_value('id_ratings', $row->id_ratings),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'nama' => set_value('nama', $row->nama),
		'jenis_param' => set_value('jenis_param', $row->jenis_param),
		'param_angka' => set_value('param_angka', $row->param_angka),
		'batas_min' => set_value('batas_min', $row->batas_min),
		'batas_max' => set_value('batas_max', $row->batas_max),
		'priorities_ratings' => set_value('priorities_ratings', $row->priorities_ratings),
	    );
            $this->load->view('ratings/ratings_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ratings'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ratings', TRUE));
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_param' => $this->input->post('jenis_param',TRUE),
		'param_angka' => $this->input->post('param_angka',TRUE),
		'batas_min' => $this->input->post('batas_min',TRUE),
		'batas_max' => $this->input->post('batas_max',TRUE),
		'priorities_ratings' => $this->input->post('priorities_ratings',TRUE),
	    );

            $this->Ratings_model->update($this->input->post('id_ratings', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ratings'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ratings_model->get_by_id($id);

        if ($row) {
            $this->Ratings_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ratings'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ratings'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kriteria', 'id kriteria', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_param', 'jenis param', 'trim|required');
	$this->form_validation->set_rules('param_angka', 'param angka', 'trim|required');
	$this->form_validation->set_rules('batas_min', 'batas min', 'trim|required');
	$this->form_validation->set_rules('batas_max', 'batas max', 'trim|required');
	$this->form_validation->set_rules('priorities_ratings', 'priorities ratings', 'trim|required');

	$this->form_validation->set_rules('id_ratings', 'id_ratings', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ratings.php */
/* Location: ./application/controllers/Ratings.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-28 07:15:43 */
/* http://harviacode.com */