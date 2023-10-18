<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Guru_model');

       // //anti bypass
    if ($this->session->userdata('level') == "Admin") {
        redirect('/admin/overview');
      } elseif ($this->session->userdata('level') == "Siswa") {
        redirect('/siswa/overviewsiswa');
      } elseif (!$this->session->userdata('level')) {
        redirect('/login');
      }
    }

    public function profile()
    {
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $data['profile'] = $this->Guru_model->getProfileGuru($kodeGr[0]->KodeGuru)->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/profile',$data);
    }
    
    public function updateGambar()
    {
        $idUser = $this->session->userdata('id_User');
        $kodeGr =  $this->Guru_model->getGuruByUser($idUser);
        $config['upload_path']          = './assets/images/user/';
        $config['allowed_types']        = 'jpg|jpeg|png';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('file-input');
        if (!$upload){
            $data['profile'] = $this->Guru_model->getProfileGuru($kodeGr[0]->KodeGuru)->result();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            
            $this->load->view('guru/headerGuru', $data);
            $this->load->view('guru/profile',$data);
        }else{
            $upload = $this->upload->data();
            $data = array(
                'foto' => $upload['file_name']
            );
            $array = array(
                'foto' => $upload['file_name']
            );
            $this->session->set_userdata( $array );
            $this->Guru_model->updateImage($data,$kodeGr[0]->KodeGuru);
            redirect('guru/profile/profile');
        }
    }

}
?>