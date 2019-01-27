<?php
    // ini controller untuk mengatur semua fungsi untuk level mahasiswa
    if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ptgs_c extends DefController
{
    public $username;
    function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->library('form_validation');  
        $this->load->model('Tahun_ajaran_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Kampus_asal_model');
        $this->load->model('Transkrip_model');
        $this->load->model('Det_transkrip_model');
        $this->load->model('Konversi_model');
        $this->load->model('Det_konversi_model');
        $this->load->model('Mk_kampus_asal_model');
        $this->load->model('Mk_amikom_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Nilai_kriteria_model');
        $this->load->model('Parameter_model');
        $this->username=$this->session->userdata('usn');
    }

    public function index()
    {
        $user = $this->Mahasiswa_model->get_by_id($this->username);
        $data = array(
            'user_data' => $user,
            'pageTitle' => 'Dashboard',
            'username' => $this->username,
        );

        $this->render_page('page_ptgs/dashboard',$data);
    }

    //list tahun ajar
    public function th_ajar(){
        $ta = $this->Tahun_ajaran_model->get_all();
        $data = array(
            'ta' => $ta,
            'pageTitle' => 'Tahun Ajar',
            'username' => $this->username,
        );
        $this->render_page('page_ptgs/th_ajar',$data);
    }

    //simpan data tambah ta
    public function tambah_ta(){
        $data = array(
            'tahun' => $this->input->post('th',TRUE),
            'deskripsi' => $this->input->post('deskripsi',TRUE),
            'status' => $this->input->post('stts',TRUE),
        );
        if($this->input->post('stts',TRUE) == 'berjalan'){
            $this->Tahun_ajaran_model->off_another_ta();
        }
        $this->Tahun_ajaran_model->insert($data);
        redirect(site_url('ta'));
    }

    //simpan data ubah ta
    public function ubah_ta(){
        $data = array(
            'tahun' => $this->input->post('th',TRUE),
            'deskripsi' => $this->input->post('deskripsi',TRUE),
            'status' => $this->input->post('stts',TRUE),
        );
        if($this->input->post('stts',TRUE) == 'berjalan'){
            $this->Tahun_ajaran_model->off_another_ta();
        }
        $this->Tahun_ajaran_model->update($this->input->post('id_', TRUE), $data);
        redirect(site_url('ta'));
    }

    //hapus ta
    public function hapus_ta($id){
        $this->Tahun_ajaran_model->delete($id);
        redirect(site_url('ta'));
    }


    //list mk amikom
    public function mk_amikom(){
        $id_ta_aktif = $this->Tahun_ajaran_model->get_ta_aktif();
        $ta = $this->Tahun_ajaran_model->get_name_ta($id_ta_aktif);
        $matkul = $this->Mk_amikom_model->get_list_mk($id_ta_aktif);

        $data = array(
            'ta' => $ta,
            'matkul' => $matkul,
            'pageTitle' => 'Kurikulum Amikom',
            'username' => $this->username,
        );
        $this->render_page('page_ptgs/mk_amikom',$data);
    }

    //simpan data tambah mk amikom
    public function tambah_mk_am(){
        $data = array(
            'kode_mk' => $this->input->post('kode',TRUE),
            'id_ta' => $this->Tahun_ajaran_model->get_ta_aktif(),
            'nama' => $this->input->post('nm',TRUE),
            'jml_sks' => $this->input->post('sks',TRUE),
            'jenis' => $this->input->post('jenis',TRUE),
            'rps' => $this->input->post('rps',TRUE),
            // 'prasyarat' => $this->input->post('syrt',TRUE),
        );
        $this->Mk_amikom_model->insert($data);
        redirect(site_url('kurikulum'));
    }
    
    //simpan data ubah mk amikom
    public function ubah_mk_am(){
        $data = array(
            'kode_mk' => $this->input->post('kode',TRUE),
            'id_ta' => $this->Tahun_ajaran_model->get_ta_aktif(),
            'nama' => $this->input->post('nm',TRUE),
            'jml_sks' => $this->input->post('sks',TRUE),
            'jenis' => $this->input->post('jenis',TRUE),
            'rps' => $this->input->post('rps',TRUE),
            // 'prasyarat' => $this->input->post('syrt',TRUE),
        );
        $this->Mk_amikom_model->update($this->input->post('id_', TRUE), $data);
        redirect(site_url('kurikulum'));
    }
    
    //hapus mk amikom
    public function hapus_mk_am($id){
        $this->Mk_amikom_model->delete($id);
        redirect(site_url('kurikulum'));
    }


    //list kriteria ahp
    public function ahp_list(){
        $kriteria = $this->Kriteria_model->get_all();
        $jml_kriteria = $this->Kriteria_model->total_rows(NULL); 
        $data = array(
            'kriteria' => $kriteria,
            'pageTitle' => 'Set Up AHP',
            'username' => $this->username,
            'jumlah' => $jml_kriteria,
        );
        $this->render_page('page_ptgs/ahp_v',$data);
    }

    //update kriterie utama
    public function simpan_kriteria()
    {
        $jml_kriteria = $this->Kriteria_model->total_rows(NULL); 
        for($a=1;$a<=$jml_kriteria;$a++){
            for($t=1;$t<=$jml_kriteria;$t++){
                if($t>$a){
                    $data = array(
                        'id_kriteria_asal' => $a,    
                        'id_kriteria_tujuan' => $t,    
                        'nilai_prioritas_kriteria' => $this->input->post('input'.$a.$t, TRUE),
                    );    
                    $id_ = $this->Nilai_kriteria_model->get_id($a,$t);
                    $this->Nilai_kriteria_model->update($id_, $data);
                }
            }
        }
        redirect(site_url('ahp'));
        
        /*
        $data = array(
            'a' => $jml_kriteria,
            'pageTitle' => 'Set Up AHP',
            'username' => $this->username,  
        );
        $this->render_page('page_ptgs/dashboard',$data);
        */
    }
    //list rules
    public function rules(){
        $rules = $this->Parameter_model->get_all();
        $data = array(
            'rules'=>$rules,
            'pageTitle' => 'Aturan Parameter',
            'username' => $this->username,
        );
        $this->render_page('page_ptgs/rules',$data);
    }

    //list mahasiswa
    public function mahasiswa() 
    {
        $mahasiswa = $this->Mahasiswa_model->get_all();
        $data = array(
            'mhs_data' => $mahasiswa,
            'pageTitle' => 'Data Mahasiswa',
            'username' => $this->session->userdata('usn'),
        );
        $this->render_page('page_ptgs/mahasiswa',$data);
    }

    //ubah mhs
    public function ubah_mhs($id){
        $data = array(
            'nama' => $this->input->post('nama', TRUE),
            'id_jurusan_d3' => $this->input->post('d3', TRUE),
            'no_hp' => $this->input->post('hp', TRUE),
        );
        $this->Mahasiswa_model->update($id, $data);
        redirect(site_url('data_mhs'));
    }

    //hapus mhs
    public function hapus_mhs($id){
        $this->Mahasiswa_model->delete($id);
        redirect(site_url('data_mhs'));
    }

    //list transkrip berdasarkan nim
    public function transkrip($nim) 
    {
        $transkrip = $this->Det_transkrip_model->get_transkrip($nim);
        $data = array(
            'transkrip' => $transkrip,
            'pageTitle' => 'Transkrip ',
            'username' => $this->session->userdata('usn'),
        );
        $this->render_page('page_ptgs/transkrip',$data);
    }
}
?>