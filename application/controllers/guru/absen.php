<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Absen_model');

        // //anti bypass
        if ($this->session->userdata('level') == "1") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "3") {
            redirect('/siswa/overviewsiswa');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
        
	}

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->getKelas();
        $data['guru'] = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['absenKelas'] = $this->MapelKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/absenkelas', $data);
        
    }

    public function listMateri($kodeKelas,$kodeMapel)
    {
        $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['Kodekelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['Kodemapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['materi'] = $this->Materi_model->getMateriKelas($kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listMateri', $data);
    }

    public function tambahMateri($kodeKelas, $kodeMapel)
    {
        $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['Kodekelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['Kodemapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['kelas'] = $this-> Materi_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
        $data['mapel'] = $this->Materi_model->getTambah('mapel', array('KodeMapel' => $kodeMapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahMateri', $data);
    }

    public function prosesUploadMateri()
    {
        $judul = $this->input->post('judul');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_posting');
        $content = $this->input->post('isi');
        $todate = date('Y-m-d H:i:s', strtotime($deadline));

        $config['upload_path']          = './assets/materi/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('materi');
        if (!$upload) {
            $data['Kodekelas'] = $kodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $kodemapel;
            $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('id_User' => $kodeKelas))->result();
            $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('id_User' => $kodeMapel))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tambahMateri', $data);
        } else {
            $upload = $this->upload->data();
            $data = array(
                'KodeMapel' => $kodeMapel,
                'KodeGuru' => $this->session->userdata('id_User'),
                'tgl_posting' => $tanggal,
                'judul' => $judul,
                'deadline' => $todate,
                'info' => $content,
                'file' => $upload['file_name'],
                // 'aktif' => 1,
                // 'tampil_siswa' => 1
            );
            $id = $this->Materi_model->insert($data, 'materi');
            $data = array('id_materi' => $id, 'KodeKelas' => $kodeKelas);
            $this->Materi_model->insert($data, 'materi_kelas');
            redirect('guru/listMateri/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function editMateri()
    {
        $data['materi'] = $this->Materi_model->getTambah('materi', array('id' => $id_materi));
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/editMateri', $data);
    }

    public function detailMateri($id_materi)
    {
        $data['materi'] = $this->Materi_model->getTambah('materi',array('id'=>$id_materi))->result();
        $this->load->view('siswa/headerGuru', $data);
        $this->load->view('siswa/detailmateri',$data);
    }

    public function hapusMateri($id,$kodeKelas,$kodeMapel)
    {
        $this->Materi_model->hapusMateri($id);
        redirect("guru/listMateri/" . $kodeKelas . "/" . $kodeMapel);
    }

    public function downloadMateri($nama)
    {
        $pth = file_get_contents(base_url()."assets/materi/".$nama);
        force_download($nama, $pth);
    }

}
?>