<?php
class Kegiatan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		// $this->load->model('Guru_model');
	}

	public function index()
	{
		// $data['guruList'] = $this->Guru_model->getGuru();
		$this->load->view('template/header');
		$this->load->view('template/kegiatan');
		$this->load->view('template/footer');
	}
}