<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pengumumanSiswa extends CI_Controller {

    public function index()
    {
        $data['pengumumanSiswa'] = $this->Siswa_modelPengumuman->getPengumumanSiswa()->result();
        
        $this->load->view('siswa/headerSiswa');
        // $this->load->view('part/sidebarsiswa',$data);
        // $this->load->view('siswa/dashboard');
        // $this->load->view('part/footer');
    }
    public function TampilPengumuman($id)
    {
        $data['pengumumanSiswa'] = $this->Siswa_modelPengumuman->getDetailPengumuman($id)->result();
        $data['author'] = $this->Siswa_modelPengumuman->getPengajar($data['pengumuman'][0]->pengajar_id)->result();
        // print_r($data);
        $this->load->view('siswa/headerSiswa');
        // $this->load->view('part/sidebarsiswa');
        // $this->load->view('siswa/pengumuman/DetailPengumuman',$data);
        // $this->load->view('part/footer');
    }

}
?>