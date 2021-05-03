<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Materi_model');
		$this->load->model('Mapel_model');
        $this->load->model('Guru_model');
		$this->load->model('User_model');

        // //anti bypass
        if ($this->session->userdata('level') == "1") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "2") {
            redirect('/siswa/overviewGuru');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
	}

    public function index()
    {
        $data['materi'] = $this->Materi_model->getMateri()->result();
        $data['mapel'] = $this->Mapel_model->getMapel()->result();
        $data['guru'] = $this->Guru_model->getGuru()->result();
        $data['user'] = $this->User_model($this->session->userdata('id_user'))->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/materikelas', $data);
        
    }

    public function listMateri()
    {
        $data['materiList']=$this->Materi_model->getMateri()->result();
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