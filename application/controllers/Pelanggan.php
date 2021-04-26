<?php

class Pelanggan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Obat_model');
	}


	public function index()
	{
		$data['obatList'] = $this->Obat_model->getObat();

		$this->load->view('template/header', $data);
		$this->load->view('template/pelanggan', $data);
		$this->load->view('template/footer', $data);
	}
}