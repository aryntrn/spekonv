<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai_kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_kriteria_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('nilai_kriteria/nilai_kriteria_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Nilai_kriteria_model->json();
    }

    public function read($id) 
    {
        $row = $this->Nilai_kriteria_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nilai_kriteria' => $row->id_nilai_kriteria,
		'id_kriteria_asal' => $row->id_kriteria_asal,
		'id_kriteria_tujuan' => $row->id_kriteria_tujuan,
		'nilai_prioritas_kriteria' => $row->nilai_prioritas_kriteria,
	    );
            $this->load->view('nilai_kriteria/nilai_kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_kriteria'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai_kriteria/create_action'),
	    'id_nilai_kriteria' => set_value('id_nilai_kriteria'),
	    'id_kriteria_asal' => set_value('id_kriteria_asal'),
	    'id_kriteria_tujuan' => set_value('id_kriteria_tujuan'),
	    'nilai_prioritas_kriteria' => set_value('nilai_prioritas_kriteria'),
	);
        $this->load->view('nilai_kriteria/nilai_kriteria_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kriteria_asal' => $this->input->post('id_kriteria_asal',TRUE),
		'id_kriteria_tujuan' => $this->input->post('id_kriteria_tujuan',TRUE),
		'nilai_prioritas_kriteria' => $this->input->post('nilai_prioritas_kriteria',TRUE),
	    );

            $this->Nilai_kriteria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai_kriteria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nilai_kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai_kriteria/update_action'),
		'id_nilai_kriteria' => set_value('id_nilai_kriteria', $row->id_nilai_kriteria),
		'id_kriteria_asal' => set_value('id_kriteria_asal', $row->id_kriteria_asal),
		'id_kriteria_tujuan' => set_value('id_kriteria_tujuan', $row->id_kriteria_tujuan),
		'nilai_prioritas_kriteria' => set_value('nilai_prioritas_kriteria', $row->nilai_prioritas_kriteria),
	    );
            $this->load->view('nilai_kriteria/nilai_kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_kriteria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai_kriteria', TRUE));
        } else {
            $data = array(
		'id_kriteria_asal' => $this->input->post('id_kriteria_asal',TRUE),
		'id_kriteria_tujuan' => $this->input->post('id_kriteria_tujuan',TRUE),
		'nilai_prioritas_kriteria' => $this->input->post('nilai_prioritas_kriteria',TRUE),
	    );

            $this->Nilai_kriteria_model->update($this->input->post('id_nilai_kriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai_kriteria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nilai_kriteria_model->get_by_id($id);

        if ($row) {
            $this->Nilai_kriteria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai_kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_kriteria'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kriteria_asal', 'id kriteria asal', 'trim|required');
	$this->form_validation->set_rules('id_kriteria_tujuan', 'id kriteria tujuan', 'trim|required');
	$this->form_validation->set_rules('nilai_prioritas_kriteria', 'nilai prioritas kriteria', 'trim|required');

	$this->form_validation->set_rules('id_nilai_kriteria', 'id_nilai_kriteria', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nilai_kriteria.php */
/* Location: ./application/controllers/Nilai_kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:35:36 */
/* http://harviacode.com */