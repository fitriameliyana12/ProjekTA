<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Kontrak_model');

        // //anti bypass
    if ($this->session->userdata('level') == "Admin") {
        redirect('/admin/overview');
      } elseif ($this->session->userdata('level') == "Siswa") {
        redirect('/siswa/overviewsiswa');
      } elseif (!$this->session->userdata('level')) {
        redirect('/login');
      }
    }

    public function index()
    {

        $data['kelas'] = $this->Kelas_model->getKelas();
        $data['guru'] = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
        $data['kontrakKelas'] = $this->MapelKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/kontrakkelas', $data);
    }

    public function list($kodeKelas, $kodeMapel)
    {
        $guru = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['kontrak'] = $this->Kontrak_model->getKontrakKelas($kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listKontrak', $data);
    }

    public function tambah($kodeKelas, $kodeMapel)
    {
        // $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['kelas'] = $this->Kontrak_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
        $data['mapel'] = $this->Kontrak_model->getTambah('mapel',array('KodeMapel' => $kodeMapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahKontrak', $data);
    }

    public function prosesUploadKontrak()
    {
        date_default_timezone_set('Asia/Jakarta');
        $judul = $this->input->post('judul');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_posting');
        $content = $this->input->post('isi');

        $config['upload_path']          = './assets/kontrak/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('kontrak');
        if (!$upload) {
            $data['KodeKelas'] = $kodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $kodeMapel;
            $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('KodeKelas' => $kodeKelas))->result();
            $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('KodeMapel' => $kodeMapel))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tambahKontrak', $data);
        } else {
            $upload = $this->upload->data();
            $idUser = $this->session->userdata('id_User');
            $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
            $data = array(
                'KodeMapel' => $kodeMapel,
                'KodeGuru' => $kodeGr[0]->KodeGuru,
                'judul' => $judul,
                'isi' => $content,
                'file' => $upload['file_name'],
                'tgl_posting' => $tanggal,
            );
            $this->Kontrak_model->insertData('kontrak',$data);
            $id = $this->db->insert_id();
            $data1 = array('id_kontrak' => $id, 'KodeKelas' => $kodeKelas);
            $this->Kontrak_model->insertData('kontrak_kelas',$data1);
            redirect('guru/kontrak/list/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function prosesUpdateKontrak($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $judul = $this->input->post('judul');
        $tanggal = $this->input->post('tgl_posting');
        $content = $this->input->post('isi');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');

        $config['upload_path']          = './assets/kontrak/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        if(!empty($_FILES['kontrak']['name'])){
            $upload = $this->upload->do_upload('kontrak');
            if (!$upload) {
                $data['KodeKelas'] = $kodeKelas;
                $data['KodeMapel'] = $kodeMapel;
                $data['error'] = $this->upload->display_errors();
                $this->load->view('guru/headerGuru');
                $this->load->view('guru/editKontrak', $data);
            } else {
                $upload = $this->upload->data();
                $data = array(
                    'judul' => $judul,
                    'isi' => $content,
                    'file' => $upload['file_name'],
                    'tgl_posting' => $tanggal,
                );
                $this->Kontrak_model->updateData($data, array('id_kontrak'=>$id), 'kontrak');
                redirect('guru/kontrak/list/' . $kodeKelas . '/' . $kodeMapel);
            }
        }else{
            $data = array(
                'judul' => $judul,
                'isi' => $content,
                'tgl_posting' => $tanggal,
            );
            $this->Kontrak_model->updateData($data, array('id_kontrak'=>$id), 'kontrak');
            redirect('guru/kontrak/list/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function editKontrak($id_kontrak)
    {
        $kontrak = $this->Kontrak_model->getKontrakJoinKelas($id_kontrak)->result();
        $data['kontrak'] = $kontrak;
        $data['KodeKelas'] = $kontrak[0]->KodeKelas;
        $data['KodeMapel'] = $kontrak[0]->KodeMapel;
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/editKontrak', $data);
    }

    public function detailKontrak($id_kontrak)
        {
            $data['kontrak'] = $this->Kontrak_model->getTambah('kontrak' ,array('id_kontrak'=>$id_kontrak))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/detailKontrak',$data);
        }

    public function hapusKontrak($id,$kodeKelas,$kodeMapel)
    {
        $this->Kontrak_model->hapusKontrak($id);
        redirect("guru/kontrak/list/" . $kodeKelas . "/" . $kodeMapel);
    }

    public function downloadKontrak($nama)
    {
        $pth = file_get_contents(base_url()."assets/kontrak/".$nama);
        force_download($nama, $pth);
    }
}
