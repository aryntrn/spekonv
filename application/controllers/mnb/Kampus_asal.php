<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kampus_asal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kampus_asal_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('kampus_asal/kampus_asal_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kampus_asal_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kampus_asal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jurusan' => $row->id_jurusan,
		'nama_univ' => $row->nama_univ,
		'nama_jurusan' => $row->nama_jurusan,
		'th_angkatan' => $row->th_angkatan,
	    );
            $this->load->view('kampus_asal/kampus_asal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kampus_asal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kampus_asal/create_action'),
	    'id_jurusan' => set_value('id_jurusan'),
	    'nama_univ' => set_value('nama_univ'),
	    'nama_jurusan' => set_value('nama_jurusan'),
	    'th_angkatan' => set_value('th_angkatan'),
	);
        $this->load->view('kampus_asal/kampus_asal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_univ' => $this->input->post('nama_univ',TRUE),
		'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
		'th_angkatan' => $this->input->post('th_angkatan',TRUE),
	    );

            $this->Kampus_asal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kampus_asal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kampus_asal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kampus_asal/update_action'),
		'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
		'nama_univ' => set_value('nama_univ', $row->nama_univ),
		'nama_jurusan' => set_value('nama_jurusan', $row->nama_jurusan),
		'th_angkatan' => set_value('th_angkatan', $row->th_angkatan),
	    );
            $this->load->view('kampus_asal/kampus_asal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kampus_asal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jurusan', TRUE));
        } else {
            $data = array(
		'nama_univ' => $this->input->post('nama_univ',TRUE),
		'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
		'th_angkatan' => $this->input->post('th_angkatan',TRUE),
	    );

            $this->Kampus_asal_model->update($this->input->post('id_jurusan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kampus_asal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kampus_asal_model->get_by_id($id);

        if ($row) {
            $this->Kampus_asal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kampus_asal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kampus_asal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_univ', 'nama univ', 'trim|required');
	$this->form_validation->set_rules('nama_jurusan', 'nama jurusan', 'trim|required');
	$this->form_validation->set_rules('th_angkatan', 'th angkatan', 'trim|required');

	$this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kampus_asal.php */
/* Location: ./application/controllers/Kampus_asal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:33:53 */
/* http://harviacode.com */