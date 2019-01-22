<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_mahasiswa extends DefController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_mahasiswa');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
    }

    public function index()
    {
        $mahasiswa = $this->Model_mahasiswa->get_all();
        $data = array(
            'mhs_data' => $mahasiswa,
            'pageTitle' => 'Data Mahasiswa',
            'username' => $this->session->userdata('usn'),
        );

        $this->render_page('mahasiswa/mhs',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_mahasiswa->json();
    }

    public function read($id) 
    {
        $row = $this->Model_mahasiswa->get_by_id($id);
        if ($row) {
            $data = array(
		'nim' => $row->nim,
		'nama' => $row->nama,
		'id_jurusan_d3' => $row->id_jurusan_d3,
		'no_hp' => $row->no_hp,
	    );
            $this->load->view('mahasiswa/mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_mahasiswa/create_action'),
	    'nim' => set_value('nim'),
	    'nama' => set_value('nama'),
	    'id_jurusan_d3' => set_value('id_jurusan_d3'),
	    'no_hp' => set_value('no_hp'),
	);
        $this->load->view('mahasiswa/mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'id_jurusan_d3' => $this->input->post('id_jurusan_d3',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Model_mahasiswa->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_mahasiswa->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_mahasiswa/update_action'),
        		'nim' => set_value('nim', $row->nim),
        		'nama' => set_value('nama', $row->nama),
        		'id_jurusan_d3' => set_value('id_jurusan_d3', $row->id_jurusan_d3),
        		'no_hp' => set_value('no_hp', $row->no_hp),
        	);
            $this->load->view('mahasiswa/mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nim', TRUE));
        } else {
            $data = array(
        		'nama' => $this->input->post('nama',TRUE),
        		'id_jurusan_d3' => $this->input->post('id_jurusan_d3',TRUE),
        		'no_hp' => $this->input->post('no_hp',TRUE),
    	    );

            $this->Model_mahasiswa->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_mahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_mahasiswa->get_by_id($id);

        if ($row) {
            $this->Model_mahasiswa->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('id_jurusan_d3', 'id jurusan d3', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

	$this->form_validation->set_rules('nim', 'nim', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mahasiswa.xls";
        $judul = "mahasiswa";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Jurusan D3");
    	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");

	foreach ($this->Model_mahasiswa->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jurusan_d3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file C_mahasiswa.php */
/* Location: ./application/controllers/C_mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-18 00:02:01 */
/* http://harviacode.com */