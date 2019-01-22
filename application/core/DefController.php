<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DefController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
    }

    public function cekLogin(){
        if (!$this->session->userdata('usn')) {
          redirect('auth');
        }
    }

    public function getUserData(){
        // Ambil semua data session
        $userData = $this->session->userdata();
     
        // Return userdata
        return $userData;
    }
 
    public function isPetugas(){
        // Mengambil data session
        $userData = $this->getUserData();
     
        // Jika level user bukan petugas
        // maka redirect ke halaman 404
        if ($userData['level'] !== 'ptgs') show_404();
    }

	function render_page($content, $data = NULL){
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 * */
        $data['head'] = $this->load->view('_template/head', $data, TRUE);
        $data['header'] = $this->load->view('_template/main-header', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['sidebar'] = $this->load->view('_template/main-sidebar', $data, TRUE);
        $data['footer'] = $this->load->view('_template/main-footer', $data, TRUE);
        $data['js'] = $this->load->view('_template/js', $data, TRUE);
        
        $this->load->view('_template/index', $data);
    }

}

