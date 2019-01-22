<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
    }
	
	public function index() {
		//if(isset($_SESSION['username'])){header('location: dashboard');}
		// else{
		$this->load->view('index');
		// }
	}


	public function cek_login() {
		$data = array('usn' => $this->input->post('username', TRUE),
						'paswd' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Log-in';
				$sess_data['usid'] = $sess->usid;
				$sess_data['usn'] = $sess->usn;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='ptgs') {
				redirect('dashboard');
			}
			elseif ($this->session->userdata('level')=='mhs') {
				redirect('mahasiswa');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout(){
	    // Hapus semua data pada session
	    $this->session->sess_destroy();
	 
	    // redirect ke halaman login 
	    redirect('auth');
	}
}

?>