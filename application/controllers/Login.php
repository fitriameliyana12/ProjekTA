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

				$this->session->set_userdata('level',$cek[0]['level']);

				if($cek[0]['level'] == 1) {
	// Super Admin
					
					redirect('index.php/admin/overview');
				} else if ($cek[0]['level'] == 2 ) {
	// Pegawai/Guru
					redirect('index.php/guru/overviewGuru');
				} else {
	// Pemilik/Siswa
					redirect('index.php/siswa/overviewSiswa');
				}

			}else

			{

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

	public function proses_lupa_sandi()
	{

		$username = $this->input->post('username');
		$this->db->where('username', $username);
		$user = $this->db->get('user')->row();
		$this->db->where('username', $username);
		$user2 = $this->db->get('user')->num_rows();

		if ($user2 < 1) {
			$this->session->set_flashdata('pesan', 'Username tidak ada!');
			redirect('index.php/login/lupa_sandi');
		} else {
			$this->load->library('email');
			$config = array();
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_user'] = 'farishelmi20@gmail.com';
			$config['smtp_pass'] = '13598faris';
			$config['smtp_port'] = 465;
			$kepada = $user->email;
			$subyek = 'Lupa Password Arjasa';
			$message = "<div>
			<h3>Berikut adalah username dan password Anda pada Sistem Apotek Arjasa</h3>
			<h3>Username : ".$username."</h3>
			<h3>Password : ".$user->password2."</h3><br>

			<h3>Mohon untuk segera diganti.</h3>
			</div>";
			$this->email->initialize($config);	
			$this->email->set_newline("\r\n");
			$this->email->from("arjasa@system.com", "No-Reply:Sistem Arjasa");
			$this->email->to($kepada);
			$this->email->subject($subyek);
			$this->email->message($message);
			if ($this->email->send()) {
						//echo "Telah terkirim ke".$this->input->post('i_email_pengguna');
				$this->load->view('login/v_berhasil_lupa');
			} else {
						//echo "Gagal kirim<br>";
						//echo $kepada."<br>".$subyek."<br>".$message;
				echo $this->email->print_debugger();
			}

		}

	}

}

?>
