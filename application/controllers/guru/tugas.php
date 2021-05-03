<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Tugas_model');

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
        $data['tugasKelas'] = $this->mapelKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tugaskelas', $data);
    }

    public function tambah($kodeKelas, $kodeMapel)
    {
        $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['Kodekelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['Kodemapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['kelas'] = $this-> Tugas_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
        $data['mapel'] = $this->Tugas_model->getTambah('mapel', array('KodeMapel' => $kodeMapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahTugas', $data);
    }

    public function prosesUploadTugas()
    {
        $judul = $this->input->post('judul');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_posting');
        $deadline = $this->input->post('deadline');
        $content = $this->input->post('isi');
        $todate = date('Y-m-d H:i:s', strtotime($deadline));

        $config['upload_path']          = './assets/tugas/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('tugas');
        if (!$upload) {
            $data['Kodekelas'] = $kodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $kodemapel;
            $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('id_User' => $kodeKelas))->result();
            $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('id_User' => $kodeMapel))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tambahTugas', $data);
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
            $id = $this->Tugas_model->insert($data, 'tugas');
            $data = array('id_tugas' => $id, 'KodeKelas' => $kodeKelas);
            $this->Tugas_model->insert($data, 'tugas_kelas');
            redirect('guru/listTugas/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function list($kodeKelas, $kodeMapel)
    {
        $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        // var_dump($guru->KodeGuru);
        $data['Kodekelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['Kodemapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['tugas'] = $this->Tugas_model->getTugasKelas($kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listTugas', $data);
    }

    public function editTugas()
    {
        $data['tugas'] = $this->Tugas_model->getTambah('tugas', array('id' => $id_tugas));
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/editTugas', $data);
    }

    public function detailTugas($id_tugas)
        {
            $data['tugas'] = $this->Tugas_model->getTambah('tugas',array('id'=>$id_tugas))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/detailtugas',$data);
        }


    public function hapusTugas($id,$kodeKelas,$kodeMapel)
    {
        $this->Tugas_model->hapusTugas($id);
        redirect("guru/listTugas/" . $kodeKelas . "/" . $kodeMapel);
    }

    public function penilaian($id_tugas,$kodeKelas,$kodeMapel)
        {
            $data['KodeKelas'] = $kodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            $data['id_tugas'] = $id_tugas;
            $data['upload'] = $this->Tugas_model->hasilUploadTugas($kodeKelas,$id_tugas)->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tugas/listnilai',$data);

        }

    public function updateNilai($id,$id_tugas,$kodeKelas,$kodeMapel)
        {
            $data['KodeKelas'] = $kodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            $data['id_tugas'] = $id_tugas;

            $nilai = $this->input->post('nilai');
            $data = array('nilai' => $nilai );
            $this->Tugas_model->penilaian($data,$id);
            redirect('guru/penilaian/'.$id_tugas.'/'.$kodeKelas.'/'.$kodeMapel);
        }

    public function downloadTugas($nama)
    {
        $pth = file_get_contents(base_url()."assets/tugas/".$nama);
        force_download($nama, $pth);
    }
}
