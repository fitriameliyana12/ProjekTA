<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('download');
        $this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
		$this->load->model('KontrakSiswa_model');

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
        $data['kontrakkelas']=$this->MapelKelas_model->getIndex()->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/kontrakKelas', $data);
        
    }

    public function listKontrak($kodeKelas, $kodeMapel)
    {
        $siswa = $this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['kelas'] = $this->Kelas_model->getIndex('kelas',array('KodeKelas'=>$kodeKelas))->result();
        $data['mapel']=$this->Mapel_model->getIndex('mapel',array('KodeMapel'=>$kodeMapel))->result();
        $data['kontrak']=$this->KontrakSiswa_model->getKontrakKelas($kodeKelas,$kodeMapel)->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/listKontrak',$data);
    }

    public function detailKontrak($idkontrak,$kodeKelas,$kodeMapel)
    {
        $idUser = $this->session->userdata('id_User');
        $no_induk =  $this->Siswa_model->getSiswaByUser($idUser);
        $data['kontrak'] = $this->KontrakSiswa_model->getTambah('kontrak',array('id_kontrak'=>$idkontrak))->result();
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['kontrak_id'] = $idkontrak;
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/detailkontrak',$data);
    }

    public function downloadKontrak($nama)
    {
        $pth = file_get_contents(base_url()."assets/kontrak/".$nama);
        force_download($nama, $pth);
    }

}
?>