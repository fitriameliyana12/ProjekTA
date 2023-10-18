<?php

class OverviewSiswa extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Login_model');
		$this->load->model('Guru_model');
        $this->load->model('Siswa_model');

		// //anti bypass
        if ($this->session->userdata('level') == "Admin") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "Guru") {
            redirect('/guru/overviewGuru');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
	}

	public function index()
	{
		// $data['obatmenipis'] = $this->obat_model->getObatMenipis();
        if($this->session->userdata('isLogin') == FALSE)

		{

			redirect('login/login');

		}else

		{

			$this->load->model('Login_model');

			$user = $this->session->userdata('username');

			$data['level'] = $this->session->userdata('level');

			//$data['user'] = $this->m_login->userData($user);

			$this->load->view('siswa/headerSiswa', $data);
			$this->load->view('siswa/overviewSiswa', $data);
		}
	}
}