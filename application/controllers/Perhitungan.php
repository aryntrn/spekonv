<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perhitungan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perhitungan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perhitungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perhitungan/index.html';
            $config['first_url'] = base_url() . 'perhitungan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perhitungan_model->total_rows($q);
        $perhitungan = $this->Perhitungan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perhitungan_data' => $perhitungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('perhitungan/perhitungan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Perhitungan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_phtg' => $row->id_phtg,
		'id_mk_amikom' => $row->id_mk_amikom,
		'id_mk_asal' => $row->id_mk_asal,
		'total_hitung_ahp' => $row->total_hitung_ahp,
		'status' => $row->status,
	    );
            $this->load->view('perhitungan/perhitungan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perhitungan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perhitungan/create_action'),
	    'id_phtg' => set_value('id_phtg'),
	    'id_mk_amikom' => set_value('id_mk_amikom'),
	    'id_mk_asal' => set_value('id_mk_asal'),
	    'total_hitung_ahp' => set_value('total_hitung_ahp'),
	    'status' => set_value('status'),
	);
        $this->load->view('perhitungan/perhitungan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_mk_amikom' => $this->input->post('id_mk_amikom',TRUE),
		'id_mk_asal' => $this->input->post('id_mk_asal',TRUE),
		'total_hitung_ahp' => $this->input->post('total_hitung_ahp',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Perhitungan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perhitungan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perhitungan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perhitungan/update_action'),
		'id_phtg' => set_value('id_phtg', $row->id_phtg),
		'id_mk_amikom' => set_value('id_mk_amikom', $row->id_mk_amikom),
		'id_mk_asal' => set_value('id_mk_asal', $row->id_mk_asal),
		'total_hitung_ahp' => set_value('total_hitung_ahp', $row->total_hitung_ahp),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('perhitungan/perhitungan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perhitungan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_phtg', TRUE));
        } else {
            $data = array(
		'id_mk_amikom' => $this->input->post('id_mk_amikom',TRUE),
		'id_mk_asal' => $this->input->post('id_mk_asal',TRUE),
		'total_hitung_ahp' => $this->input->post('total_hitung_ahp',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Perhitungan_model->update($this->input->post('id_phtg', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perhitungan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perhitungan_model->get_by_id($id);

        if ($row) {
            $this->Perhitungan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perhitungan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perhitungan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mk_amikom', 'id mk amikom', 'trim|required');
	$this->form_validation->set_rules('id_mk_asal', 'id mk asal', 'trim|required');
	$this->form_validation->set_rules('total_hitung_ahp', 'total hitung ahp', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_phtg', 'id_phtg', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perhitungan.php */
/* Location: ./application/controllers/Perhitungan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-29 08:37:32 */
/* http://harviacode.com */