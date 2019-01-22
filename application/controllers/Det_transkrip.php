<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Det_transkrip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Det_transkrip_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('det_transkrip/det_transkrip_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Det_transkrip_model->json();
    }

    public function read($id) 
    {
        $row = $this->Det_transkrip_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_det_transkrip' => $row->id_det_transkrip,
		'id_transkrip' => $row->id_transkrip,
		'id_mk_asal' => $row->id_mk_asal,
		'rps' => $row->rps,
		'nilai' => $row->nilai,
	    );
            $this->load->view('det_transkrip/det_transkrip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('det_transkrip'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('det_transkrip/create_action'),
	    'id_det_transkrip' => set_value('id_det_transkrip'),
	    'id_transkrip' => set_value('id_transkrip'),
	    'id_mk_asal' => set_value('id_mk_asal'),
	    'rps' => set_value('rps'),
	    'nilai' => set_value('nilai'),
	);
        $this->load->view('det_transkrip/det_transkrip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_transkrip' => $this->input->post('id_transkrip',TRUE),
		'id_mk_asal' => $this->input->post('id_mk_asal',TRUE),
		'rps' => $this->input->post('rps',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Det_transkrip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('det_transkrip'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Det_transkrip_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('det_transkrip/update_action'),
		'id_det_transkrip' => set_value('id_det_transkrip', $row->id_det_transkrip),
		'id_transkrip' => set_value('id_transkrip', $row->id_transkrip),
		'id_mk_asal' => set_value('id_mk_asal', $row->id_mk_asal),
		'rps' => set_value('rps', $row->rps),
		'nilai' => set_value('nilai', $row->nilai),
	    );
            $this->load->view('det_transkrip/det_transkrip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('det_transkrip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_det_transkrip', TRUE));
        } else {
            $data = array(
		'id_transkrip' => $this->input->post('id_transkrip',TRUE),
		'id_mk_asal' => $this->input->post('id_mk_asal',TRUE),
		'rps' => $this->input->post('rps',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Det_transkrip_model->update($this->input->post('id_det_transkrip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('det_transkrip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Det_transkrip_model->get_by_id($id);

        if ($row) {
            $this->Det_transkrip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('det_transkrip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('det_transkrip'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_transkrip', 'id transkrip', 'trim|required');
	$this->form_validation->set_rules('id_mk_asal', 'id mk asal', 'trim|required');
	$this->form_validation->set_rules('rps', 'rps', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');

	$this->form_validation->set_rules('id_det_transkrip', 'id_det_transkrip', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Det_transkrip.php */
/* Location: ./application/controllers/Det_transkrip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:34:41 */
/* http://harviacode.com */