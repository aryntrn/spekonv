<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_c extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
    }

    public function konv(){
    	$this->load->view('print/konversi');
    }

    // public function lap(){
    // 	$this->load->view('print/laporan');
    // }
}