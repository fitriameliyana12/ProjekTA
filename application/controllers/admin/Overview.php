<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
		
		// //anti bypass
        if ($this->session->userdata('level') == "Guru") {
            redirect('/guru/overviewGuru');
        } elseif ($this->session->userdata('level') == "Siswa") {
            redirect('/siswa/overviewsiswa');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
	}

	public function index()
	{
        if($this->session->userdata('isLogin') == FALSE)

		{

			redirect('login/login');

		}else

		{

			$this->load->model('Login_model');

			$user = $this->session->userdata('username');

			$data['level'] = $this->session->userdata('level');

			$this->load->view('admin/header', $data);
			$this->load->view('admin/overview', $data);
		}
	}
}