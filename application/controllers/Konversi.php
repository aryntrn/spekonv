<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konversi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konversi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('konversi/konversi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Konversi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Konversi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konversi' => $row->id_konversi,
		'nim' => $row->nim,
		'total_sks' => $row->total_sks,
		'ipk' => $row->ipk,
		'status_acc_mhs' => $row->status_acc_mhs,
		'status_acc_petugas' => $row->status_acc_petugas,
	    );
            $this->load->view('konversi/konversi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konversi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('konversi/create_action'),
	    'id_konversi' => set_value('id_konversi'),
	    'nim' => set_value('nim'),
	    'total_sks' => set_value('total_sks'),
	    'ipk' => set_value('ipk'),
	    'status_acc_mhs' => set_value('status_acc_mhs'),
	    'status_acc_petugas' => set_value('status_acc_petugas'),
	);
        $this->load->view('konversi/konversi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'total_sks' => $this->input->post('total_sks',TRUE),
		'ipk' => $this->input->post('ipk',TRUE),
		'status_acc_mhs' => $this->input->post('status_acc_mhs',TRUE),
		'status_acc_petugas' => $this->input->post('status_acc_petugas',TRUE),
	    );

            $this->Konversi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konversi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Konversi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('konversi/update_action'),
		'id_konversi' => set_value('id_konversi', $row->id_konversi),
		'nim' => set_value('nim', $row->nim),
		'total_sks' => set_value('total_sks', $row->total_sks),
		'ipk' => set_value('ipk', $row->ipk),
		'status_acc_mhs' => set_value('status_acc_mhs', $row->status_acc_mhs),
		'status_acc_petugas' => set_value('status_acc_petugas', $row->status_acc_petugas),
	    );
            $this->load->view('konversi/konversi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konversi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_konversi', TRUE));
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'total_sks' => $this->input->post('total_sks',TRUE),
		'ipk' => $this->input->post('ipk',TRUE),
		'status_acc_mhs' => $this->input->post('status_acc_mhs',TRUE),
		'status_acc_petugas' => $this->input->post('status_acc_petugas',TRUE),
	    );

            $this->Konversi_model->update($this->input->post('id_konversi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konversi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Konversi_model->get_by_id($id);

        if ($row) {
            $this->Konversi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konversi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konversi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nim', 'nim', 'trim|required');
	$this->form_validation->set_rules('total_sks', 'total sks', 'trim|required');
	$this->form_validation->set_rules('ipk', 'ipk', 'trim|required|numeric');
	$this->form_validation->set_rules('status_acc_mhs', 'status acc mhs', 'trim|required');
	$this->form_validation->set_rules('status_acc_petugas', 'status acc petugas', 'trim|required');

	$this->form_validation->set_rules('id_konversi', 'id_konversi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Konversi.php */
/* Location: ./application/controllers/Konversi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:36:02 */
/* http://harviacode.com */