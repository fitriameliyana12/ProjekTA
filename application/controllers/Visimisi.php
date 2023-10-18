<?php
class Visimisi extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/visimisi');
		$this->load->view('template/footer');
	}
}