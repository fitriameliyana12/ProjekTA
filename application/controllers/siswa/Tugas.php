<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('download');
        $this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
		$this->load->model('TugasSiswa_model');
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
        $data['mapel']=$this->MapelKelas_model->getIndex()->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/tugaskelas', $data);
        
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
        $this->load->view('siswa/listPertemuan', $data);
    }

    public function listTugas($kodePertemuan, $kodeKelas, $kodeMapel)
    {
        $siswa = $this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['KodePertemuan'] = $kodePertemuan;
        $data['pertemuan'] = $this->Pertemuan_model->getIndex('minggu_pertemuan',array('KodePertemuan' =>$kodePertemuan))->result();
        $data['kelas'] = $this->Kelas_model->getIndex('kelas',array('KodeKelas'=>$kodeKelas))->result();
        $data['mapel']=$this->Mapel_model->getIndex('mapel',array('KodeMapel'=>$kodeMapel))->result();
        $data['tugas']=$this->TugasSiswa_model->getTugasKelas($kodePertemuan,$kodeKelas,$kodeMapel)->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/listTugas',$data);
    }

    public function detailTugas($idtugas,$kodePertemuan,$kodeKelas,$kodeMapel)
    {
        $idUser = $this->session->userdata('id_User');
        $no_induk =  $this->Siswa_model->getSiswaByUser($idUser);
        $data['tugas'] = $this->TugasSiswa_model->getTambah('tugas',array('id_tugas'=>$idtugas))->result();
        $data['nilai'] = $this->TugasSiswa_model->getTambah('tugas_pengumpulan',array('id_tugas'=>$idtugas,'no_induk'=>$no_induk[0]->no_induk))->result();
        // $data['deadline'] = $this->Siswa_model->getDeadline()
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['KodePertemuan'] = $kodePertemuan;
        $data['id_tugas'] = $idtugas;
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/detailtugas',$data);
    }

    public function uploadTugas()
    {
        $idUser = $this->session->userdata('id_User');
        $no_induk =  $this->Siswa_model->getSiswaByUser($idUser);
        $kodeKelas = $this->input->post('KodeKelas');
        $idtugas = $this->input->post('id_tugas');
        $kodeMapel = $this->input->post('KodeMapel');
        $kodePertemuan = $this->input->post('KodePertemuan');
        $config['upload_path']          = './assets/tugas/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('tugas');
        if (!$upload){
            $data['error'] = $this->upload->display_errors();
            $data['tugas'] = $this->TugasSiswa_model->getTambah('tugas',array('id_tugas'=>$idtugas))->result();
            $data['KodeKelas'] = $kodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            $data['KodePertemuan'] = $kodePertemuan;
            $data['id_tugas'] = $idtugas;
            $this->load->view('siswa/headerSiswa');
            $this->load->view('siswa/detailtugas',$data);
        }else{
            $upload = $this->upload->data();
            $pengumpulan = array(
                'KodeKelas' => $kodeKelas , 
                'KodePertemuan' => $kodePertemuan,
                'no_induk' => $no_induk[0]->no_induk , 
                'id_tugas' => $idtugas ,
                'file' => $upload['file_name'],
                'nilai' => 0,
            );
            $this->session->set_flashdata('success', 'Tugas Berhasil di upload tinggal menunggu hasil nilai');
            $this->TugasSiswa_model->insert($pengumpulan,'tugas_pengumpulan');
            redirect('siswa/tugas/detailTugas/'.$idtugas. '/' .$kodePertemuan. '/'.$kodeMapel.'/'.$kodeKelas);
        }

    }

    public function downloadTugas($nama)
    {
        $pth = file_get_contents(base_url()."assets/tugas/".$nama);
        force_download($nama, $pth);
    }

}
?>