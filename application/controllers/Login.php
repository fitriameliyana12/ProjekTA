<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller

{

	public function __construct()

	{

		parent::__construct();

		$this->load->model('Login_model');

		$this->load->library(array('form_validation','session'));

		$this->load->database('elearningta');

		$this->load->helper('url');

	}

	public function index()

	{

		$session = $this->session->userdata('isLogin');

		if($session == FALSE)

		{

			redirect('login/login');

		}else

		{

			redirect('admin/overview');

		}

	}


	public function login()

	{

		$this->form_validation->set_rules('username', 'Username', 'required');

		$this->form_validation->set_rules('pass', 'Password', 'required');

// $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run()==FALSE)

		{
			$this->load->view('login/login');

		}else

		{

			$username = $this->input->post('username');

			$password = $this->input->post('pass');

			$cek = $this->db->get_where('user', array('username' => $username, 'password' => md5($password)))->result_array();

			if(count($cek) > 0)

			{

				$this->session->set_userdata('isLogin', TRUE);

				$this->session->set_userdata('id_User',$cek[0]['id_user']);

				$this->session->set_userdata('username',$username);

				$this->session->set_userdata('status',$cek[0]['status']);

				$this->session->set_userdata('level',$cek[0]['level']);

				if ($cek[0]['status'] == "AKTIF"){
                    if($cek[0]['level'] == 'Admin') {
                        // Super Admin
                        redirect('index.php/admin/overview');
                    } else if ($cek[0]['level'] == 'Guru') {
                        // Pegawai/Guru
                        redirect('index.php/guru/overviewGuru');
                    } else {
                        // Pemilik/Siswa
                        redirect('index.php/siswa/overviewSiswa');
                    } 
                    
                } else{
                    echo " <script>

				alert('Failed Login: Akun Anda NON-AKTIF');

				history.go(-1);

				</script>";
                }
	
			}else{
				echo " <script>

				alert('Failed Login: Check your username and password!');

				history.go(-1);

				</script>";

			}

		}

	}

	public function logout()

	{

		$this->session->sess_destroy();

		redirect('index.php/login/login');

	}

	public function lupa_sandi()
	{
		$this->load->view('login/lupa_sandi');
	}

	
}

?>
