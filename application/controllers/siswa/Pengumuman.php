<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->model('Pengumuman_model');
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
        $data['pengumumanList'] = $this->Pengumuman_model->getPengumuman();
        $this->load->view('siswa/headerSiswa');
        $this->load->view('siswa/pengumuman_siswa', $data);
    }
}