<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		// $this->load->model('Materi_model');
        $this->load->model('MapelKelas_model');
		$this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        
	}

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->getKelas();
        $data['guru'] = $this->Guru_model->getGuru();
        $data['mapelKelas'] = $this->MapelKelas_model->getIndex($this->session->userdata('id_user'))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/materikelas', $data);
        
    }

    public function listMateri($kelas,$mapel)
    {
        $data['kelas'] = $kelas;
        $data['mapelKelas']=$id_mapel;
        $data['materiList']=$this->Materi_model->getMateri($this->session->userdata('id_user'))->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/materi_list',$data);
    }

    public function detailMateri()
    {
        $data['materi'] = $this->Materi_model->getMateriDetail()->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/detailmateri',$data);
    }

    public function download($nama)
    {
        $pth = file_get_contents(base_url()."assets/tugas/".$nama);
        force_download($nama, $pth);
    }

}
?>