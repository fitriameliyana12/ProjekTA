	<?php

	class Beranda extends CI_Controller {
	    public function __construct()
	    {
			parent::__construct();
			$this->load->helper('url');
		}


		public function index()
		{
			$this->load->view('template/header');
			$this->load->view('template/index');
			$this->load->view('template/footer');
		}
	}