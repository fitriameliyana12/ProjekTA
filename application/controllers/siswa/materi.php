<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('download');
		$this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
        $this->load->model('MateriSiswa_model');
        $this->load->model('Pertemuan_model');
        $this->load->model('PertemuanKelas_model');

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
        $this->load->view('siswa/materiSiswa', $data);
        
    }

    public function listPertemuan($kodeKelas, $kodeMapel)
    {
        $siswa = $this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['pertemuan'] = $this->PertemuanKelas_model->getIndex()->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/listPertemuan_siswa', $data);
    }

    public function listMateri($kodePertemuan,$kodeKelas,$kodeMapel)
    {
        $data['KodePertemuan'] = $kodePertemuan;
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['pertemuan'] = $this->MateriSiswa_model->getView('minggu_pertemuan',array('KodePertemuan' =>$kodePertemuan))->result();
        $data['kelas'] = $this->MateriSiswa_model->getView('kelas',array('KodeKelas'=>$kodeKelas))->result();
        $data['mapel']=$this->MateriSiswa_model->getView('mapel',array('KodeMapel'=>$kodeMapel))->result();
        $data['materi']=$this->MateriSiswa_model->getMateriKelas($kodePertemuan,$kodeKelas,$kodeMapel)->result();
        $this->load->view('siswa/headerSiswa');
        $this->load->view('siswa/listmateri',$data);
    }

    public function detailMateri($idmateri)
    {
        $data['materi'] = $this->Siswa_model->getTambah('materi', array('id_materi'=>$idmateri))->result();
        
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/detailmateri',$data);
    }

    public function downloadMateri($nama)
    {
        $pth = file_get_contents(base_url()."assets/materi/".$nama);
        force_download($nama, $pth);
    }

}
?>