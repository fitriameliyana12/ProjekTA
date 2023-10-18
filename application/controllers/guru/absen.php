<?php

defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Absen extends CI_Controller
{

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
    $data['absenKelas'] = $this->MapelKelas_model->getIndex()->result();
    $this->load->view('guru/headerGuru', $data);
    $this->load->view('guru/absenkelas', $data);
  }

  public function buatAbsen($kelas, $mapel)
  {
    $data['KodeKelas'] = $kelas;
    $data['KodeMapel'] = $mapel;
    // $data['jam'] = $id;
    // $data['Jam_pelajaran'] = $this->Jam_pelajaran_model->getIndex('jam_pelajaran', array('id'=> $id))-result();
    $data['kelas'] = $this->Kelas_model->getKelasById($kelas);
    $data['mapel'] = $this->Mapel_model->getIndex('mapel', array('KodeMapel' => $mapel))->result();
    $this->load->view('guru/headerGuru', $data);
    $this->load->view('guru/buatAbsenKelas', $data);
  }

  public function aturAbsen()
  {
    $KodeKelas = $this->input->post('KodeKelas');
    $KodeMapel = $this->input->post('KodeMapel');
    $tanggal = $this->input->post('tanggal');
    $jam_mulai = $this->input->post('jam_mulai');
    $jam_selesai = $this->input->post('jam_selesai');
    $idUser = $this->session->userdata('id_User');
    $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
    $data = array(
      'KodeKelas' => $KodeKelas,
      'KodeGuru' => $kodeGr[0]->KodeGuru,
      'KodeMapel' => $KodeMapel,
      'tanggal' => $tanggal,
      'jam_mulai' => $jam_mulai,
      'jam_selesai' => $jam_selesai
    );

    $id = $this->Absen_model->insert($data, 'absen');

    $kelas_siswa = $this->Absen_model->getTambah('siswa', array('KodeKelas' => $KodeKelas))->result();

    foreach ($kelas_siswa as $k) {
      $data = array('id_absen' => $id, 'no_induk' => $k->no_induk);
      $this->Absen_model->insert($data, 'absen_siswa');
    }

    redirect('guru/absen/absensi/' . $id);
  }

  public function absensi($id_absen)
  {
    $data['absen'] = $this->Absen_model->absenSiswa($id_absen)->result();
    $data['kelas'] = $this->Absen_model->absenSiswaKelas($id_absen)->result();
    $data['id_absen'] = $id_absen;

    $this->load->view('guru/headerGuru', $data);
    $this->load->view('guru/absenSiswa');
  }

  public function updateAbsenSiswa($id_absensi, $id_absen, $keterangan)
  {
    $data = array('keterangan' => $keterangan);
    $where = array('id_absen_siswa' => $id_absensi);
    $this->Absen_model->update($data, $where, 'absen_siswa');
    redirect('guru/absen/absensi/' . $id_absen);
  }
  public function historyAbsen($kelas, $mapel)
  {
    $where = array('KodeKelas' => $kelas, 'KodeMapel' => $mapel);
    $data['absen'] = $this->Absen_model->getTambah('absen', $where)->result();

    $this->load->view('guru/headerGuru', $data);
    $this->load->view('guru/historyAbsen');
  }

  public function print($id)
  {
    $data['absen'] = $this->Absen_model->absenSiswa($id)->result();
    $data['kelas'] = $this->Absen_model->absenSiswaKelas($id)->result();
    $this->load->view('guru/printAbsen', $data);
  }

  public function excel($id_absen)
  {
    $data['absen'] = $this->Absen_model->absenSiswa($id_absen)->result();
    // $data['kelas'] = $this->Absen_model->absenSiswaKelas($id_absen)->result();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');

    $sheet->setTitle("Daftar Absensi Siswa");

    $sheet->setCellValue('A1', 'DAFTAR ABSENSI');
    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'NO INDUK');
    $sheet->setCellValue('C1', 'NISN');
    $sheet->setCellValue('D1', 'NAMA SISWA');
    $sheet->setCellValue('E1', 'KEHADIRAN');

    $baris = 2;
    $no = 1;

    foreach ($data['absen'] as $key) {
      $sheet->setCellValue('A' . $baris, $no++);
      $sheet->setCellValue('B' . $baris, $key->no_induk);
      $sheet->setCellValue('C' . $baris, $key->NISN);
      $sheet->setCellValue('D' . $baris, $key->NamaSiswa);
      $sheet->setCellValue('E' . $baris, $key->keterangan);

      $baris++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan absensi-siswa';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }

  public function pdf($id_absen)
  {

    $this->load->library('pdf');

    $data['absen'] = $this->Absen_model->absenSiswa($id_absen)->result();
    $data['kelas'] = $this->Absen_model->absenSiswaKelas($id_absen)->result();
    $this->load->view('guru/pdfAbsen', $data);
    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->pdf->set_paper($paper_size, $orientation);

    $this->pdf->load_html($html);
    $this->pdf->render();
    $this->pdf->stream("Data Absensi Siswa.pdf", array('Attachment' => 0));
  }
}
