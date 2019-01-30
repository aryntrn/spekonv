<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mk_amikom extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mk_amikom_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('mk_amikom/mk_amikom_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mk_amikom_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mk_amikom_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mk_amikom' => $row->id_mk_amikom,
		'id_ta' => $row->id_ta,
		'nama' => $row->nama,
		'jml_sks' => $row->jml_sks,
		'jenis' => $row->jenis,
		'rps' => $row->rps,
		'prasyarat' => $row->prasyarat,
	    );
            $this->load->view('mk_amikom/mk_amikom_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mk_amikom'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mk_amikom/create_action'),
	    'id_mk_amikom' => set_value('id_mk_amikom'),
	    'id_ta' => set_value('id_ta'),
	    'nama' => set_value('nama'),
	    'jml_sks' => set_value('jml_sks'),
	    'jenis' => set_value('jenis'),
	    'rps' => set_value('rps'),
	    'prasyarat' => set_value('prasyarat'),
	);
        $this->load->view('mk_amikom/mk_amikom_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_ta' => $this->input->post('id_ta',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jml_sks' => $this->input->post('jml_sks',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'rps' => $this->input->post('rps',TRUE),
		'prasyarat' => $this->input->post('prasyarat',TRUE),
	    );

            $this->Mk_amikom_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mk_amikom'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mk_amikom_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mk_amikom/update_action'),
		'id_mk_amikom' => set_value('id_mk_amikom', $row->id_mk_amikom),
		'id_ta' => set_value('id_ta', $row->id_ta),
		'nama' => set_value('nama', $row->nama),
		'jml_sks' => set_value('jml_sks', $row->jml_sks),
		'jenis' => set_value('jenis', $row->jenis),
		'rps' => set_value('rps', $row->rps),
		'prasyarat' => set_value('prasyarat', $row->prasyarat),
	    );
            $this->load->view('mk_amikom/mk_amikom_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mk_amikom'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mk_amikom', TRUE));
        } else {
            $data = array(
		'id_ta' => $this->input->post('id_ta',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jml_sks' => $this->input->post('jml_sks',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'rps' => $this->input->post('rps',TRUE),
		'prasyarat' => $this->input->post('prasyarat',TRUE),
	    );

            $this->Mk_amikom_model->update($this->input->post('id_mk_amikom', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mk_amikom'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mk_amikom_model->get_by_id($id);

        if ($row) {
            $this->Mk_amikom_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mk_amikom'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mk_amikom'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_ta', 'id ta', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jml_sks', 'jml sks', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('rps', 'rps', 'trim|required');
	$this->form_validation->set_rules('prasyarat', 'prasyarat', 'trim|required');

	$this->form_validation->set_rules('id_mk_amikom', 'id_mk_amikom', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mk_amikom.xls";
        $judul = "mk_amikom";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Ta");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jml Sks");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Rps");
	xlsWriteLabel($tablehead, $kolomhead++, "Prasyarat");

	foreach ($this->Mk_amikom_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_ta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jml_sks);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rps);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prasyarat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mk_amikom.php */
/* Location: ./application/controllers/Mk_amikom.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 13:32:58 */
/* http://harviacode.com */