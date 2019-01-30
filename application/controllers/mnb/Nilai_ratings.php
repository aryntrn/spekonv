<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai_ratings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_ratings_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nilai_ratings/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nilai_ratings/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nilai_ratings/index.html';
            $config['first_url'] = base_url() . 'nilai_ratings/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nilai_ratings_model->total_rows($q);
        $nilai_ratings = $this->Nilai_ratings_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nilai_ratings_data' => $nilai_ratings,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('nilai_ratings/nilai_ratings_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nilai_ratings_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nilai_ratings' => $row->id_nilai_ratings,
		'id_ratings_asal' => $row->id_ratings_asal,
		'id_ratings_tujuan' => $row->id_ratings_tujuan,
		'kepentingan_ratings' => $row->kepentingan_ratings,
	    );
            $this->load->view('nilai_ratings/nilai_ratings_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_ratings'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai_ratings/create_action'),
	    'id_nilai_ratings' => set_value('id_nilai_ratings'),
	    'id_ratings_asal' => set_value('id_ratings_asal'),
	    'id_ratings_tujuan' => set_value('id_ratings_tujuan'),
	    'kepentingan_ratings' => set_value('kepentingan_ratings'),
	);
        $this->load->view('nilai_ratings/nilai_ratings_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_ratings_asal' => $this->input->post('id_ratings_asal',TRUE),
		'id_ratings_tujuan' => $this->input->post('id_ratings_tujuan',TRUE),
		'kepentingan_ratings' => $this->input->post('kepentingan_ratings',TRUE),
	    );

            $this->Nilai_ratings_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai_ratings'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nilai_ratings_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai_ratings/update_action'),
		'id_nilai_ratings' => set_value('id_nilai_ratings', $row->id_nilai_ratings),
		'id_ratings_asal' => set_value('id_ratings_asal', $row->id_ratings_asal),
		'id_ratings_tujuan' => set_value('id_ratings_tujuan', $row->id_ratings_tujuan),
		'kepentingan_ratings' => set_value('kepentingan_ratings', $row->kepentingan_ratings),
	    );
            $this->load->view('nilai_ratings/nilai_ratings_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_ratings'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai_ratings', TRUE));
        } else {
            $data = array(
		'id_ratings_asal' => $this->input->post('id_ratings_asal',TRUE),
		'id_ratings_tujuan' => $this->input->post('id_ratings_tujuan',TRUE),
		'kepentingan_ratings' => $this->input->post('kepentingan_ratings',TRUE),
	    );

            $this->Nilai_ratings_model->update($this->input->post('id_nilai_ratings', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai_ratings'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nilai_ratings_model->get_by_id($id);

        if ($row) {
            $this->Nilai_ratings_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai_ratings'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_ratings'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_ratings_asal', 'id ratings asal', 'trim|required');
	$this->form_validation->set_rules('id_ratings_tujuan', 'id ratings tujuan', 'trim|required');
	$this->form_validation->set_rules('kepentingan_ratings', 'kepentingan ratings', 'trim|required');

	$this->form_validation->set_rules('id_nilai_ratings', 'id_nilai_ratings', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nilai_ratings.php */
/* Location: ./application/controllers/Nilai_ratings.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-28 07:15:31 */
/* http://harviacode.com */