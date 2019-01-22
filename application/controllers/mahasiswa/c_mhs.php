<?php
//session_start();
class C_mhs extends DefController {

	public function __construct() {
		parent::__construct();
		$this->cekLogin();
		$this->load->helper('text');
	}
	public function index() {
		$data['pageTitle'] = 'Dashboard';
		
		$data['username'] = $this->session->userdata('usn');
		$this->render_page('mahasiswa/index',$data);
	}
}
?>