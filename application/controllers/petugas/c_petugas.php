<?php
	class C_petugas extends DefController {

		public function __construct() {
			parent::__construct();

			$this->cekLogin();
	 	    $this->isPetugas();
	 
			$this->load->helper('text');
		}
		public function index() {
			$data['pageTitle'] = 'Dashboard';

			$data['username'] = $this->session->userdata('usn');
			$this->render_page('petugas/idxptgs',$data);
		}
	}
?>