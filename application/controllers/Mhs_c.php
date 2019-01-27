<?php
    // ini controller untuk mengatur semua fungsi untuk level mahasiswa
    if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mhs_c extends DefController
{
    public $username;
    function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->library('form_validation');  
        $this->load->model('Mahasiswa_model');
        $this->load->model('Kampus_asal_model');
        $this->load->model('Transkrip_model');
        $this->load->model('Det_transkrip_model');
        $this->load->model('Konversi_model');
        $this->load->model('Det_konversi_model');
        $this->load->model('Mk_kampus_asal_model');
        $this->username=$this->session->userdata('usn');
    }

    public function index()
    {
        $mahasiswa = $this->Mahasiswa_model->get_by_id($this->username);
        $univ = $this->Kampus_asal_model->get_name_by_id($mahasiswa->id_jurusan_d3);
        $data = array(
            'mhs_data' => $mahasiswa,
            'univ' => $univ,
            'pageTitle' => 'Data Mahasiswa',
            'username' => $this->username,
        );

        $this->render_page('page_mhs/profile',$data);
    }

    public function transkrip()
    {
        $id_transkrip = $this->Transkrip_model->get_id($this->username);
        $det_transkrip = $this->Det_transkrip_model->get_transkrip_mhs($id_transkrip);
        $data = array(
            'id' => $id_transkrip,
            'mk' => $det_transkrip,
            'pageTitle' => 'Data Transkrip D3',
            'username' => $this->username,
        );

        $this->render_page('page_mhs/transkrip',$data);
    }

    public function update_rps(){
        $data = array(
            'rps' => $this->input->post('rps_input',TRUE),
        );

        $this->Det_transkrip_model->update($this->input->post('id_', TRUE), $data);
        redirect(site_url('mhs_c/transkrip'));
    }

    public function konversi(){
        $id_konv = $this->Konversi_model->get_id($this->username);
        $acc_mhs = $this->Konversi_model->get_by_id($id_konv);
        $acc = $acc_mhs->status_acc_mhs;
        $det_konv = $this->Det_konversi_model->get_hasil_konversi($id_konv);
        $data = array(
            'id' => $id_konv,
            'acc_mhs' => $acc,
            'konversi' => $det_konv,
            'pageTitle' => 'Acc Hasil Konversi',
            'username' => $this->username,
        );

        $this->render_page('page_mhs/konversi',$data);
    }

    public function acc_konv(){
        $data = array(
            'status_acc_mhs' => 'acc',
        );
        $this->Konversi_model->update($this->input->post('id', TRUE), $data);
        redirect(site_url('mhs_c/konversi'));
    }
}
?>