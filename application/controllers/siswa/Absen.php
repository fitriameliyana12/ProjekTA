<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
        $this->load->model('Absen_model');

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
        $data['data']=$this->Kelas_model->getKelas();
        $data['siswa']=$this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
        $data['mapel']=$this->MapelKelas_model->getMapel()->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/absenSiswa', $data);
        
    }

    public function listAbsen($kodeKelas, $kodeMapel)
    {
        {
            $siswa = $this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
            $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
            $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
            $data['KodeKelas'] = $kodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            // $data['absen']=$this->Absen_model->absensi($kodeKelas, $kodeMapel, $siswa->no_induk)->result();
            $data['absen'] = $this->Absen_model->getAbsenSiswa($kodeKelas, $kodeMapel, $siswa->no_induk)->result();
            $this->load->view('siswa/headerSiswa', $data);
            $this->load->view('siswa/cekAbsensi', $data);
        }
    }

}
?>