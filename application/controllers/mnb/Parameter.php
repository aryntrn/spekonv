<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parameter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Parameter_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('parameter/parameter_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Parameter_model->json();
    }

    public function read($id) 
    {
        $row = $this->Parameter_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rules' => $row->id_rules,
		'id_kriteria' => $row->id_kriteria,
		'nama_param' => $row->nama_param,
		'jenis_param' => $row->jenis_param,
		'param_angka' => $row->param_angka,
		'batas_min' => $row->batas_min,
		'batas_max' => $row->batas_max,
		'nilai_skala_ahp' => $row->nilai_skala_ahp,
	    );
            $this->load->view('parameter/parameter_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('parameter/create_action'),
	    'id_rules' => set_value('id_rules'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'nama_param' => set_value('nama_param'),
	    'jenis_param' => set_value('jenis_param'),
	    'param_angka' => set_value('param_angka'),
	    'batas_min' => set_value('batas_min'),
	    'batas_max' => set_value('batas_max'),
	    'nilai_skala_ahp' => set_value('nilai_skala_ahp'),
	);
        $this->load->view('parameter/parameter_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nama_param' => $this->input->post('nama_param',TRUE),
		'jenis_param' => $this->input->post('jenis_param',TRUE),
		'param_angka' => $this->input->post('param_angka',TRUE),
		'batas_min' => $this->input->post('batas_min',TRUE),
		'batas_max' => $this->input->post('batas_max',TRUE),
		'nilai_skala_ahp' => $this->input->post('nilai_skala_ahp',TRUE),
	    );

            $this->Parameter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('parameter'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Parameter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('parameter/update_action'),
		'id_rules' => set_value('id_rules', $row->id_rules),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'nama_param' => set_value('nama_param', $row->nama_param),
		'jenis_param' => set_value('jenis_param', $row->jenis_param),
		'param_angka' => set_value('param_angka', $row->param_angka),
		'batas_min' => set_value('batas_min', $row->batas_min),
		'batas_max' => set_value('batas_max', $row->batas_max),
		'nilai_skala_ahp' => set_value('nilai_skala_ahp', $row->nilai_skala_ahp),
	    );
            $this->load->view('parameter/parameter_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rules', TRUE));
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nama_param' => $this->input->post('nama_param',TRUE),
		'jenis_param' => $this->input->post('jenis_param',TRUE),
		'param_angka' => $this->input->post('param_angka',TRUE),
		'batas_min' => $this->input->post('batas_min',TRUE),
		'batas_max' => $this->input->post('batas_max',TRUE),
		'nilai_skala_ahp' => $this->input->post('nilai_skala_ahp',TRUE),
	    );

            $this->Parameter_model->update($this->input->post('id_rules', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('parameter'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Parameter_model->get_by_id($id);

        if ($row) {
            $this->Parameter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('parameter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kriteria', 'id kriteria', 'trim|required');
	$this->form_validation->set_rules('nama_param', 'nama param', 'trim|required');
	$this->form_validation->set_rules('jenis_param', 'jenis param', 'trim|required');
	$this->form_validation->set_rules('param_angka', 'param angka', 'trim|required');
	$this->form_validation->set_rules('batas_min', 'batas min', 'trim|required');
	$this->form_validation->set_rules('batas_max', 'batas max', 'trim|required');
	$this->form_validation->set_rules('nilai_skala_ahp', 'nilai skala ahp', 'trim|required');

	$this->form_validation->set_rules('id_rules', 'id_rules', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Parameter.php */
/* Location: ./application/controllers/Parameter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:35:02 */
/* http://harviacode.com */