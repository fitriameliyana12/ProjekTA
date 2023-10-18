<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Ujian_model');

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
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Guru_model->getUjian($kodeGr[0]->KodeGuru)->result();
        $data['mapel'] = $this->Guru_model->getKelasPengajar($kodeGr[0]->KodeGuru)->result();
        $this->load->view('guru/headerGuru',$data);
        $this->load->view('guru/ujian',$data);
        // print_r($data['ujian']);
    }

    public function buatUjian()
    {
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $values=array(
            'judul'=>$this->input->post('nama'),
            'tgl_buat'=>date('Y-m-d H:i'),
            'tgl_mulai'=>$this->input->post('tgl_mulai').' '.$this->input->post('jam_mulai'),
            'tgl_selesai'=>$this->input->post('tgl').' '.$this->input->post('jam'),
            'waktu'=>$this->input->post('waktu'),
            'id_mapel_kelas'=>$this->input->post('mapelKelas'),
            'KodeGuru'=>$kodeGr[0]->KodeGuru
        );
        $this->Guru_model->insert($values,'ujian');
        redirect('guru/ujian');
    }

    public function detailUjian($id)
    {
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $data['id_ujian']=$id;
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Guru_model->getUjianDetail($id)->result();
        $data['mapel'] = $this->Guru_model->getKelasPengajar($kodeGr[0]->KodeGuru)->result();
        $data['soal']= $this->Guru_model->getView('soal',array('KodeGuru'=>$kodeGr[0]->KodeGuru))->result();
        $data['soal_ujian']= $this->Guru_model->getSoalUjian($id)->result();
        
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/detailUjian',$data);
    }

    public function hasilUjian($id)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Guru_model->view('ujian')->result();
        $data['siswa']= $this->Guru_model->view('siswa')->result();
        $data['jawaban']= $this->Guru_model->getView('jawaban',array('id_ujian'=>$id))->result();
        $data['id_ujian']=$id;
        
        $this->load->view('guru/headerGuru',$data);
        $this->load->view('guru/hasilUjian',$data);
    }

    public function updateUjian($id)
    {
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $values=array(
            'judul'=>$this->input->post('nama'),
            'tgl_buat'=>date('Y-m-d H:i'),
            'tgl_mulai'=>$this->input->post('tgl_mulai').' '.$this->input->post('jam_mulai'),
            'tgl_selesai'=>$this->input->post('tgl').' '.$this->input->post('jam'),
            'waktu'=>$this->input->post('waktu'),
            'id_mapel_kelas'=>$this->input->post('mapelKelas'),
            'KodeGuru'=>$kodeGr[0]->KodeGuru
        );
        $this->Guru_model->update($values, array('id_ujian'=>$id), 'ujian');
        redirect('Guru/ujian');
    }
    public function soal()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['soal']= $this->Guru_model->getView('soal',array('KodeGuru'=>$this->session->userdata('id_User')))->result();
        $this->load->view('guru/headerGuru',$data);
        $this->load->view('guru/soal',$data);
    }

    public function simpanSoal($tipe,$id_ujian)
    {
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $insert_id='';
        if ($tipe==1) {
            $values=array(
                'pertanyaan'=>$this->input->post('pertanyaan'),
                'pilgan_a'=>'A.'.$this->input->post('pilgan_a'),
                'pilgan_b'=>'B.'.$this->input->post('pilgan_b'),
                'pilgan_c'=>'C.'.$this->input->post('pilgan_c'),
                'pilgan_d'=>'D.'.$this->input->post('pilgan_d'),
                'jawaban_pilgan'=>$this->input->post('jawaban_pilgan'),
                'tipe'=>$tipe,
                'KodeGuru'=>$kodeGr[0]->KodeGuru
            );
        $insert_id=$this->Guru_model->insert($values,'soal');
        }elseif ($tipe==2) {
            $values=array(
                'pertanyaan'=>$this->input->post('pertanyaan'),
                'tipe'=>$tipe,
                'KodeGuru'=>$kodeGr[0]->KodeGuru
            );
        $insert_id=$this->Guru_model->insert($values,'soal');
        }
        $data=array(
                'id_ujian'=>$id_ujian,
                'id_soal'=>$insert_id,
            );
            $this->Guru_model->insert($data,'ujian_soal');
        redirect('guru/ujian/detailUjian/'.$id_ujian);
    }

    public function tambahSoalUjian($id)
    {
        $daftarSoal=$this->input->post('pertanyaan');
        for ($i=0; $i <count($daftarSoal) ; $i++) { 
            $data=array(
                'id_ujian'=>$id,
                'id_soal'=>$daftarSoal[$i],
            );
            $this->Guru_model->insert($data,'ujian_soal');
        }
        redirect('guru/ujian/detailUjian/'.$id);
    }
    // public function nilaiEssay($id,$id_ujian)
    // {
    //     $nilaiEssay=$this->input->post('nilai_essay');
    //     $nilaiPG= $this->input->post('nilai_pilgan');
    //     $jumlahSoal= $this->input->post('jumlah_soal');
    //     $nilai_total=((($nilaiEssay+$nilaiPG)/3)/$jumlahSoal)*100;
    //     $values=array(
    //         'nilai_essay'=>$this->input->post('nilai_essay'),
    //         'nilai_total'=>$nilai_total
    //     );

    //     $this->Guru_model->update($values, array('id_jawaban'=>$id), 'jawaban');
    //     redirect('guru/ujian/hasilUjian/'.$id_ujian);
    // }

    public function nilaiEssay($id,$id_ujian)
    {
            $data['id_ujian'] = $id_ujian;

            $nilaiEssay = $this->input->post('nilai_essay');
            $data = array('nilai_essay' => $nilaiEssay );
            $this->Guru_model->nilaiEssay($data,$id);
            
        redirect('guru/ujian/hasilUjian/'.$id_ujian);
    }
    
    public function hapusSoal($id)
    {
        $this->Guru_model->delete(array('id_soal'=>$id),'soal');
        redirect('guru/ujian/detailUjian/'.$id);
    }
    
    public function hapusSoalUjian($id, $id_ujian)
    {
        $SoalUjian = $this->Guru_model->getSoalUjian($id)->result();
        $id_soal = $SoalUjian[0]->id_soal;
        $this->Guru_model->delete(array('id_ujian_soal'=>$id),'ujian_soal');
        // $this->Guru_model->delete(array('id_ujian'=>$id_ujian),'ujian');
        $this->Guru_model->delete(array('id_soal'=>$id_soal),'soal');
        redirect('guru/ujian/detailUjian/'.$id_ujian);
    }

    public function hapusUjian($id)
    {
        $this->Guru_model->delete(array('id_ujian'=>$id),'ujian');
        redirect('guru/ujian');
    }

}
?>