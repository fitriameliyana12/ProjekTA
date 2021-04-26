<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Login_model');

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