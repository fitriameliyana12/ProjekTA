<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		// $this->load->model('Materi_model');
        $this->load->model('mapelKelas_model');
		$this->load->model('Kelas_model');
        $this->load->model('Guru_model');
         
	}

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->getKelas();
        $data['guru'] = $this->Guru_model->getGuru();
        $data['tugasKelas'] = $this->mapelKelas_model->getIndex($this->session->userdata('id_user'))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tugaskelas', $data);
        
    }

    public function list()
    {
        $data['Kodekelas'] = $this->Kelas_model->getKelas();
        $data['Kodemapel'] = $this->Mapel_model->getMapel();
        $data['tugas'] = $this->Tugas_model->getTugasKelas($this->session->userdata('id_user'))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listTugasKelas', $data);

    }

    public function tambah()
    {
        $data['id_kelas'] = $this->Kelas_model->getKelas();
        $data['id_mapel'] = $this->Mapel_model->getMapel();
        $data['kelas'] = $this->Kelas_model->getIndex($this->session->userdata('id_user'))->result();
        $data['mapel'] = $this->Mapel_model->getIndex($this->session->userdata('id_user'))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahTugas', $data);
    }

    public function prosesUpload()
    {
        $judul = $this->input->post('judul');
        $KodeKelas = $this->input->post('KodeKelas');
        $KodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_posting');
        $deadline = $this->input->post('deadline');
        $content = $this->input->post('isi');
        $todate = date('Y-m-d H:i:s', strtotime($deadline));

        $config['upload_path']          = './assets/tugas/';
        $config['allowed_types']        = '*';
    
        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('materi');
        if (!$upload){
            $data['Kodekelas'] = $KodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $Kodemapel;
            $data['kelas']=$this->Kelas_model->view_where('kelas',array('id_user' => $KodeKelas))->result();
            $data['mapel']=$this->Mapel_model->view_where('mapel',array('id_user' => $KodeMapel))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/materi/TambahMateri',$data);
        }else{
            $upload = $this->upload->data();
            $data = array(
                'KodeMapel' => $KodeMapel,
                'KodeGuru' =>$this->session->userdata('id_user'),
                'tgl_posting' => $tgl_posting,
                'judul' => $judul,
                'durasi' => $todate,
                'info' => $content,
                'file' => $upload['file_name'],
                'aktif' => 1,
                'tampil_siswa' => 1
            );
            $id = $this->Tugas_model->insert($data,'tugas');
            $data = array('id_tugas' => $id,'KodeKelas' =>$KodeKelas);
            $this->Tugas_model->insert($data,'tugas_kelas');
            redirect('guru/listTugas/'.$KodeKelas.'/'.$KodeMapel);
        }
    }

    public function detail()
    {
        $data['materi'] = $this->Tugas_model->getTugasDetail('tugas', array('id'=>$id_tugas));
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/detailTugas', $data);
    }

    public function hapus()
    {
        $this->Tugas_model->hapusTugas($id);
        redirect("guru/listTugas/".$kelas."/".$KodeMapel);
    }
}