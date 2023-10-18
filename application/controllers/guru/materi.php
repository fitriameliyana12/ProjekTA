<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Materi_model');
        $this->load->model('Pertemuan_model');
        $this->load->model('PertemuanKelas_model');

        
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
        $data['materiKelas'] = $this->MapelKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/materikelas', $data);
    }

    public function pertemuan($kodeKelas, $kodeMapel)
        {
        $guru = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['pertemuanList'] = $this->PertemuanKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/list_pertemuan_materi', $data);
        }

    public function listMateri($kodePertemuan,$kodeKelas,$kodeMapel)
    {
        $data['pertemuan'] = $this->Pertemuan_model->getPertemuanById($kodePertemuan);
        $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $guru = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
        $data['KodePertemuan'] = $kodePertemuan;
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['materi'] = $this->Materi_model->getMateriKelas($kodePertemuan,$kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listMateri', $data);
    }

    public function tambah($kodePertemuan,$kodeKelas, $kodeMapel)
    {
        // $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['KodePertemuan'] = $kodePertemuan;
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['pertemuan'] = $this-> Materi_model->getTambah('minggu_pertemuan',array('KodePertemuan' => $kodePertemuan))->result();
        $data['kelas'] = $this-> Materi_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
        $data['mapel'] = $this->Materi_model->getTambah('mapel', array('KodeMapel' => $kodeMapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahMateri', $data);
    }

    public function prosesUploadMateri()
    {
        $judul = $this->input->post('judul');
        $kodePertemuan = $this->input->post('KodePertemuan');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_posting');
        $content = $this->input->post('isi');

        $config['upload_path']          = './assets/materi/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('materi');
        if (!$upload) {
            $data['Kodekelas'] = $kodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $kodeMapel;
            $data['KodePertemuan'] = $kodePertemuan;
            $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('id_User' => $kodeKelas))->result();
            $data['pertemuan'] = $this->Pertemuan_model->getIndex('minggu_pertemuan', array('id_User' => $kodePertemuan))->result();
            $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('id_User' => $kodeMapel))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tambahMateri', $data);
        } else {
            $upload = $this->upload->data();
            $idUser = $this->session->userdata('id_User');
            $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
            $data = array(
                'KodeMapel' => $kodeMapel,
                'KodePertemuan' => $kodePertemuan,
                'KodeGuru' => $kodeGr[0]->KodeGuru,
                'judul' => $judul,
                'isi' => $content,
                'file' => $upload['file_name'],
                'tgl_posting' => $tanggal,
            );
            $this->Materi_model->insertData('materi', $data);
            $id = $this->db->insert_id();
            $data1 = array('id_materi' => $id, 'KodeKelas' => $kodeKelas);
            $this->Materi_model->insertData('materi_kelas', $data1);
            redirect('guru/materi/listMateri/' . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function prosesUpdateMateri($id)
    {
        $judul = $this->input->post('judul');
        $kodePertemuan = $this->input->post('KodePertemuan');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_posting');
        $content = $this->input->post('isi');

        $config['upload_path']          = './assets/materi/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        if(!empty($_FILES['materi']['name'])){
            $upload = $this->upload->do_upload('materi');
            if (!$upload) {
                $data['KodeKelas'] = $kodeKelas;
                $data['KodeMapel'] = $kodeMapel;
                $data['KodePertemuan'] = $kodePertemuan;
                $data['error'] = $this->upload->display_errors();
                $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('id_User' => $kodeKelas))->result();
                $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('id_User' => $kodeMapel))->result();
                $data['pertemuan'] = $this->Pertemuan_model->getIndex('minggu_pertemuan', array('id_User' => $kodePertemuan))->result();
                $this->load->view('guru/headerGuru');
                $this->load->view('guru/editMateri', $data);
            } else {
                $upload = $this->upload->data();
                $data = array(
                    'judul' => $judul,
                    'isi' => $content,
                    'file' => $upload['file_name'],
                    'tgl_posting' => $tanggal,
                );
                $this->Materi_model->updateData($data, array('id_materi'=>$id), 'materi');
                redirect('guru/materi/listMateri/' . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
            }
        }else{
            $data = array(
                'judul' => $judul,
                'isi' => $content,
                'tgl_posting' => $tanggal,
            );
            $this->Materi_model->updateData($data, array('id_materi'=>$id), 'materi');
            redirect('guru/materi/listMateri/' . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
        }
        
    }

    public function editMateri($id_materi)
    {
        $materi =  $this->Materi_model->getMateriJoinKelas($id_materi)->result();
        $data['materi'] = $materi;
        $data['KodePertemuan'] = $materi[0]->KodePertemuan;
        $data['KodeKelas'] = $materi[0]->KodeKelas;
        $data['KodeMapel'] = $materi[0]->KodeMapel;
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/editMateri', $data);
    }

    public function detailMateri($id_materi)
    {
        $data['materi'] = $this->Materi_model->getTambah('materi',array('id_materi'=>$id_materi))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/detailmateri',$data);
    }

    public function hapusMateri($id, $kodePertemuan,$kodeKelas,$kodeMapel)
    {
        $this->Materi_model->hapusMateri($id);
        redirect("guru/materi/listMateri/" . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
    }

    public function downloadMateri($nama)
    {
        $pth = file_get_contents(base_url()."assets/materi/".$nama);
        force_download($nama, $pth);
    }

}
?>