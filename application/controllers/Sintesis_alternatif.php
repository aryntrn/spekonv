<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sintesis_alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sintesis_alternatif_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('sintesis_alternatif/sintesis_alternatif_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sintesis_alternatif_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sintesis_alternatif_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sintesis' => $row->id_sintesis,
		'id_mk_amikom' => $row->id_mk_amikom,
		'id_mk_asal' => $row->id_mk_asal,
		'nilai_asli' => $row->nilai_asli,
		'id_rules' => $row->id_rules,
	    );
            $this->load->view('sintesis_alternatif/sintesis_alternatif_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sintesis_alternatif'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sintesis_alternatif/create_action'),
	    'id_sintesis' => set_value('id_sintesis'),
	    'id_mk_amikom' => set_value('id_mk_amikom'),
	    'id_mk_asal' => set_value('id_mk_asal'),
	    'nilai_asli' => set_value('nilai_asli'),
	    'id_rules' => set_value('id_rules'),
	);
        $this->load->view('sintesis_alternatif/sintesis_alternatif_form', $data);
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
		'nilai_asli' => $this->input->post('nilai_asli',TRUE),
		'id_rules' => $this->input->post('id_rules',TRUE),
	    );

            $this->Sintesis_alternatif_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sintesis_alternatif'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sintesis_alternatif_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sintesis_alternatif/update_action'),
		'id_sintesis' => set_value('id_sintesis', $row->id_sintesis),
		'id_mk_amikom' => set_value('id_mk_amikom', $row->id_mk_amikom),
		'id_mk_asal' => set_value('id_mk_asal', $row->id_mk_asal),
		'nilai_asli' => set_value('nilai_asli', $row->nilai_asli),
		'id_rules' => set_value('id_rules', $row->id_rules),
	    );
            $this->load->view('sintesis_alternatif/sintesis_alternatif_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sintesis_alternatif'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sintesis', TRUE));
        } else {
            $data = array(
		'id_mk_amikom' => $this->input->post('id_mk_amikom',TRUE),
		'id_mk_asal' => $this->input->post('id_mk_asal',TRUE),
		'nilai_asli' => $this->input->post('nilai_asli',TRUE),
		'id_rules' => $this->input->post('id_rules',TRUE),
	    );

            $this->Sintesis_alternatif_model->update($this->input->post('id_sintesis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sintesis_alternatif'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sintesis_alternatif_model->get_by_id($id);

        if ($row) {
            $this->Sintesis_alternatif_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sintesis_alternatif'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sintesis_alternatif'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mk_amikom', 'id mk amikom', 'trim|required');
	$this->form_validation->set_rules('id_mk_asal', 'id mk asal', 'trim|required');
	$this->form_validation->set_rules('nilai_asli', 'nilai asli', 'trim|required');
	$this->form_validation->set_rules('id_rules', 'id rules', 'trim|required');

	$this->form_validation->set_rules('id_sintesis', 'id_sintesis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sintesis_alternatif.php */
/* Location: ./application/controllers/Sintesis_alternatif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:36:44 */
/* http://harviacode.com */