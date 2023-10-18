<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Siswa_model');
        
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
        $siswa = $this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Siswa_model->getUjianSiswa($siswa->KodeKelas)->result();
        $data['jawaban']=$this->Siswa_model->getTambah('jawaban',array('no_induk'=>$siswa->no_induk))->result();
        // print_r($data['ujian']);
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/ujian',$data);
    }

    public function masukUjian($id,$waktu)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['nama'] = $this->session->userdata('nama');
        $data['id_ujian']=$id;
        $data['waktu']=date('Y-m-d H:i',strtotime('+'.$waktu.' minutes',strtotime(date('Y-m-d H:i'))));
        $data['ujian']= $this->Siswa_model->getmasukUjianSiswa($id)->result();
        $data['soal_ujian']= $this->Siswa_model->getSoalUjian($id)->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/masukUjian',$data);
    }

    public function koreksiUjian($id_ujian)
    {
        $siswa = $this->Siswa_model->getSiswaId($this->session->userdata('id_User'));
        date_default_timezone_set('Asia/Jakarta');
        $soal_ujian= $this->Siswa_model->getSoalUjian($id_ujian)->result();
        $jumlah_soal= count($soal_ujian);
        $soal_pilgan=0;
        $soal_essay=0;
        $jawaban=array();
        $nilai=0;
        for ($i=0; $i <$jumlah_soal ; $i++) {
            $jawaban[]=$soal_ujian[$i]->id_soal.':'.$this->input->post($soal_ujian[$i]->id_soal);
            if ($soal_ujian[$i]->tipe == 1) {
                $soal_pilgan++;
                if ($soal_ujian[$i]->jawaban_pilgan == $this->input->post($soal_ujian[$i]->id_soal)) {
                    $nilai++;
                }
                }
                
            }
        $tes_jawaban=implode(',', $jawaban);
        $nilai_total=0;
        if ($soal_pilgan==0) {
            $nilai_total = "jawaban masih dikoreksi";
        }elseif ($soal_pilgan > 0) {
            $nilai_total=(($nilai*100)/$soal_pilgan);
        }
        // print_r($tes_jawaban);
        $dataJawaban=array(
            'id_ujian'=>$id_ujian,
            'no_induk'=>$siswa->no_induk,
            'jawaban'=>$tes_jawaban,
            'nilai_pilgan'=>$nilai,
            'nilai_total'=>$nilai_total,
            'jumlah_soal'=>$jumlah_soal,
            'tanggal'=>date('Y-m-d H:i')
        );
        $this->Siswa_model->insert($dataJawaban,'jawaban');
        redirect('siswa/ujian');
    }

}
?>