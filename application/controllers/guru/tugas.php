<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tugas extends CI_Controller
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
        $this->load->model('Tugas_model');
        $this->load->model('TugasSiswa_model');
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
        $data['tugasKelas'] = $this->MapelKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tugaskelas', $data);
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
        $this->load->view('guru/list_pertemuan', $data);
        }
    

    public function listPertemuan($kodeKelas, $kodeMapel){
        $guru = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['tugas'] = $this->Tugas_model->getTugasPertemuan($kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listPertemuanTugas', $data);
    }

    public function list($kodePertemuan, $kodeKelas, $kodeMapel)
    {
        $guru = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['pertemuan'] = $this->Pertemuan_model->getPertemuanById($kodePertemuan);
        $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
        $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
        $data['KodePertemuan'] = $kodePertemuan;
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['tugas'] = $this->Tugas_model->getTugasKelas($kodePertemuan, $kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/listTugas', $data);
    }

    // public function list($IdPertemuan, $kodeKelas, $kodeMapel) pertemuannya nulis sendiri
    // {
    //     $guru = $this->Guru_model->getGuruId($this->session->userdata('id_User'));
    //     date_default_timezone_set('Asia/Jakarta');
    //     $data['pertemuan'] = $this->Pertemuan_model->getPertemuanById($IdPertemuan);
    //     $data['kelas'] = $this->Kelas_model->getKelasById($kodeKelas);
    //     $data['mapel'] = $this->Mapel_model->getMapelById($kodeMapel);
    //     $data['id_pertemuan'] = $IdPertemuan;
    //     $data['KodeKelas'] = $kodeKelas;
    //     $data['KodeMapel'] = $kodeMapel;
    //     $data['tugas'] = $this->Tugas_model->getTugasKelas($IdPertemuan, $kodeKelas, $kodeMapel, $guru->KodeGuru)->result();
    //     $this->load->view('guru/headerGuru', $data);
    //     $this->load->view('guru/listTugas', $data);
    // }

    public function tambahPertemuan($kodeKelas, $kodeMapel)
    {
        // $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['kelas'] = $this->Tugas_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
        $data['mapel'] = $this->Tugas_model->getTambah('mapel',array('KodeMapel' => $kodeMapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahPertemuan', $data);
    }


    public function tambah($kodePertemuan, $kodeKelas, $kodeMapel)
    {
        // $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $data['KodePertemuan'] = $kodePertemuan;
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['Pertemuan'] = $this->Tugas_model->getTambah('minggu_pertemuan',array('KodePertemuan' => $kodePertemuan))->result();
        $data['kelas'] = $this->Tugas_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
        $data['mapel'] = $this->Tugas_model->getTambah('mapel',array('KodeMapel' => $kodeMapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/tambahTugas', $data);
    }

    // public function tambah($IdPertemuan, $kodeKelas, $kodeMapel)
    // {
    //     // $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
    //     date_default_timezone_set('Asia/Jakarta');
    //     $data['id_pertemuan'] = $IdPertemuan;
    //     $data['KodeKelas'] = $kodeKelas;
    //     $data['KodeMapel'] = $kodeMapel;
    //     $data['Pertemuan'] = $this->Tugas_model->getTambah('pertemuan',array('id_pertemuan' => $IdPertemuan))->result();
    //     $data['kelas'] = $this->Tugas_model->getTambah('kelas',array('KodeKelas' => $kodeKelas))->result();
    //     $data['mapel'] = $this->Tugas_model->getTambah('mapel',array('KodeMapel' => $kodeMapel))->result();
    //     $this->load->view('guru/headerGuru', $data);
    //     $this->load->view('guru/tambahTugas', $data);
    // }

    public function prosesUploadPertemuan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $pertemuan = $this->input->post('pertemuan');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tgl_pertemuan');
        $content = $this->input->post('isi');
        // $todate = date('Y-m-d H:i:s', strtotime($deadline));

        $config['upload_path']          = './assets/pertemuan/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('pertemuan');
        if (!$upload) {
            $data['KodeKelas'] = $kodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $kodeMapel;
            $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('KodeKelas' => $kodeKelas))->result();
            $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('KodeMapel' => $kodeMapel))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tambahPertemuan', $data);
        } else {
            $upload = $this->upload->data();
            $idUser = $this->session->userdata('id_User');
            $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
            $data = array(
                'KodeMapel' => $kodeMapel,
                'KodeGuru' => $kodeGr[0]->KodeGuru,
                'pertemuan' => $pertemuan,
                'isi' => $content,
                'file' => $upload['file_name'],
                'tgl_pertemuan' => $tanggal,
            );
            $this->Tugas_model->insertData('pertemuan',$data);
            $id = $this->db->insert_id();
            $data1 = array('id_pertemuan' => $id, 'KodeKelas' => $kodeKelas);
            $this->Tugas_model->insertData('pertemuan_tugas',$data1);
            redirect('guru/tugas/listPertemuan/' . $kodeKelas . '/' . $kodeMapel);
        }
    }


    public function prosesUploadTugas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $judul = $this->input->post('judul');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');
        $kodePertemuan = $this->input->post('KodePertemuan');
        $tanggal = $this->input->post('tgl_posting');
        $deadline = $this->input->post('deadline');
        $content = $this->input->post('isi');
        $todate = date('Y-m-d H:i:s', strtotime($deadline));

        $config['upload_path']          = './assets/tugas/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('tugas');
        if (!$upload) {
            $data['KodeKelas'] = $kodeKelas;
            $data['error'] = $this->upload->display_errors();
            $data['KodeMapel'] = $kodeMapel;
            $data['KodePertemuan'] = $kodePertemuan;
            $data['kelas'] = $this->Kelas_model->getIndex('kelas', array('KodeKelas' => $kodeKelas))->result();
            $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('KodeMapel' => $kodeMapel))->result();
            $data['KodePertemuan'] =$this->Pertemuan_model->getIndex('minggu_pertemuan', array('KodePertemuan' => $kodePertemuan))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/tambahTugas', $data);
        } else {
            $upload = $this->upload->data();
            $idUser = $this->session->userdata('id_User');
            $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
            // $id_pertemuan = $this->Pertemuan_model->getPertemuanByUser();
            $data = array(
                'KodeMapel' => $kodeMapel,
                'KodeGuru' => $kodeGr[0]->KodeGuru,
                'KodePertemuan' => $kodePertemuan,
                'judul' => $judul,
                'isi' => $content,
                'file' => $upload['file_name'],
                'tgl_posting' => $tanggal,
                'deadline' => $todate,
            );
            $this->Tugas_model->insertData('tugas',$data);
            $id = $this->db->insert_id();
            $data1 = array('id_tugas' => $id, 'KodeKelas' => $kodeKelas);
            $this->Tugas_model->insertData('tugas_kelas',$data1);
            redirect('guru/tugas/list/' . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function prosesUpdateTugas($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $judul = $this->input->post('judul');
        $tanggal = $this->input->post('tgl_posting');
        $deadline = $this->input->post('deadline');
        $content = $this->input->post('isi');
        $todate = date('Y-m-d H:i:s', strtotime($deadline));
        $kodePertemuan = $this->input->post('KodePertemuan');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');

        $config['upload_path']          = './assets/tugas/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        if(!empty($_FILES['tugas']['name'])){
            $upload = $this->upload->do_upload('tugas');
            if (!$upload) {
                $data['KodeKelas'] = $kodeKelas;
                $data['KodeMapel'] = $kodeMapel;
                $data['KodePertemuan'] = $kodePertemuan;
                $data['error'] = $this->upload->display_errors();
                $this->load->view('guru/headerGuru');
                $this->load->view('guru/editTugas', $data);
            } else {
                $upload = $this->upload->data();
                $data = array(
                    'judul' => $judul,
                    'isi' => $content,
                    'file' => $upload['file_name'],
                    'tgl_posting' => $tanggal,
                    'deadline' => $todate,
                );
                $this->Tugas_model->updateData($data, array('id_tugas'=>$id), 'tugas');
                redirect('guru/tugas/list/' . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
            }
        }else{
            $data = array(
                'judul' => $judul,
                'isi' => $content,
                'tgl_posting' => $tanggal,
                'deadline' => $todate,
            );
            $this->Tugas_model->updateData($data, array('id_tugas'=>$id), 'tugas');
            redirect('guru/tugas/list/' . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function prosesUpdatePertemuan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $pertemuan = $this->input->post('pertemuan');
        $tanggal = $this->input->post('tgl_pertemuan');
        $content = $this->input->post('isi');
        $kodeKelas = $this->input->post('KodeKelas');
        $kodeMapel = $this->input->post('KodeMapel');

        $config['upload_path']          = './assets/pertemuan/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        if(!empty($_FILES['pertemuan']['name'])){
            $upload = $this->upload->do_upload('pertemuan');
            if (!$upload) {
                $data['KodeKelas'] = $kodeKelas;
                $data['KodeMapel'] = $kodeMapel;
                $data['error'] = $this->upload->display_errors();
                $this->load->view('guru/headerGuru');
                $this->load->view('guru/editPertemuan', $data);
            } else {
                $upload = $this->upload->data();
                $data = array(
                    'pertemuan' => $pertemuan,
                    'isi' => $content,
                    'file' => $upload['file_name'],
                    'tgl_pertemuan' => $tanggal,
                );
                $this->Pertemuan_model->updateData($data, array('id_pertemuan'=>$id), 'pertemuan');
                redirect('guru/tugas/listPertemuan/' . $kodeKelas . '/' . $kodeMapel);
            }
        }else{
            $data = array(
                'pertemuan' => $pertemuan,
                'isi' => $content,
                'tgl_pertemuan' => $tanggal,
            );
            $this->Pertemuan_model->updateData($data, array('id_pertemuan'=>$id), 'pertemuan');
            redirect('guru/tugas/listPertemuan/' . $kodeKelas . '/' . $kodeMapel);
        }
    }

    public function editTugas($id_tugas)
    {
        $tugas = $this->Tugas_model->getTugasJoinKelas($id_tugas)->result();
        $data['tugas'] = $tugas;
        $data['KodePertemuan'] = $tugas[0]->KodePertemuan;
        $data['KodeKelas'] = $tugas[0]->KodeKelas;
        $data['KodeMapel'] = $tugas[0]->KodeMapel;
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/editTugas', $data);
    }

    // public function editPertemuan($id_pertemuan)
    // {
    //     $pertemuan = $this->Pertemuan_model->getPertemuanJoinKelas($id_pertemuan)->result();
    //     $data['pertemuan'] = $pertemuan;
    //     $data['KodeKelas'] = $pertemuan[0]->KodeKelas;
    //     $data['KodeMapel'] = $pertemuan[0]->KodeMapel;
    //     $this->load->view('guru/headerGuru', $data);
    //     $this->load->view('guru/editPertemuan', $data);
    // }

    public function detailPertemuan($id_pertemuan)
    {
        $data['pertemuan'] = $this->Pertemuan_model->getIndex('pertemuan' ,array('id_pertemuan'=>$id_pertemuan))->result();
        $this->load->view('guru/headerGuru');
        $this->load->view('guru/detailPertemuan',$data);
    }

    public function detailTugas($id_tugas)
        {
            $data['tugas'] = $this->Tugas_model->getTambah('tugas' ,array('id_tugas'=>$id_tugas))->result();
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/detailtugas',$data);
        }


    public function hapusTugas($id, $kodePertemuan, $kodeKelas,$kodeMapel)
    {
        $this->Tugas_model->hapusTugas($id);
        redirect("guru/tugas/list/" . $kodePertemuan . '/' . $kodeKelas . '/' . $kodeMapel);
    }

    public function penilaian($KodePertemuan,$KodeKelas,$id_tugas,$kodeMapel)
        {
            $data['KodePertemuan'] = $KodePertemuan;
            $data['KodeKelas'] = $KodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            $data['id_tugas'] = $id_tugas;

            // var_dump($data);die;

            $data['upload'] = $this->Tugas_model->hasilUploadTugas( $KodePertemuan,$KodeKelas, $id_tugas)->result();
            
            $this->load->view('guru/headerGuru');
            $this->load->view('guru/listNilai',$data);
            // var_dump($data);
        }

    public function updateNilai($id,$id_tugas,$kodePertemuan,$kodeKelas,$kodeMapel)
        {
            $data['KodeKelas'] = $kodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            $data['KodePertemuan'] = $kodePertemuan;
            $data['id_tugas'] = $id_tugas;

            $nilai = $this->input->post('nilai');
            $data = array('nilai' => $nilai );
            $this->Tugas_model->penilaian($data,$id);
            
            redirect('guru/tugas/penilaian/'.$kodePertemuan.'/'.$kodeKelas.'/'.$id_tugas.'/'.$kodeMapel);
        }

    public function downloadTugas($nama)
    {
        $pth = file_get_contents(base_url()."assets/tugas/".$nama);
        force_download($nama, $pth);
    }

    public function downloadPertemuan($nama)
    {
        $pth = file_get_contents(base_url()."assets/tugas/".$nama);
        force_download($nama, $pth);
    }

    public function print($id)
  {
    $data['upload'] = $this->Tugas_model->hasilUploadTugasCetak($id)->result();
    $this->load->view('guru/printTugas', $data);
  }

  public function excel($id_tugas)
  {
    $data['upload'] = $this->Tugas_model->hasilUploadTugas($id_tugas)->result();
    // $data['kelas'] = $this->Absen_model->absenSiswaKelas($id_absen)->result();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');

    $sheet->setTitle("Daftar Nilai Tugas Siswa");

    $sheet->setCellValue('A1', 'DAFTAR NILAI TUGAS SISWA');
    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'NAMA SISWA');
    $sheet->setCellValue('C1', 'TANGGAL');
    $sheet->setCellValue('D1', 'NILAI');
    // $sheet->setCellValue('E1', 'KEHADIRAN');

    $baris = 2;
    $no = 1;

    foreach ($data['absen'] as $key) {
      $sheet->setCellValue('A' . $baris, $no++);
      $sheet->setCellValue('B' . $baris, $key->NamaSiswa);
      $sheet->setCellValue('C' . $baris, $key->tgl);
      $sheet->setCellValue('D' . $baris, $key->nilai);
    //   $sheet->setCellValue('E' . $baris, $key->keterangan);

      $baris++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan daftar nilai tugas-siswa';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }

  public function pdf($id_tugas)
  {

    $this->load->library('pdf');

    $data['upload'] = $this->Tugas_model->hasilUploadTugas($id_tugas)->result();
    $this->load->view('guru/pdfTugas', $data);
    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->pdf->set_paper($paper_size, $orientation);

    $this->pdf->load_html($html);
    $this->pdf->render();
    $this->pdf->stream("Data Nilai Tugas Siswa.pdf", array('Attachment' => 0));
  }
}
