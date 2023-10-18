<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_model');

        // //anti bypass
        if ($this->session->userdata('level') == "Guru") {
            redirect('/guru/overviewGuru');
        } elseif ($this->session->userdata('level') == "Siswa") {
            redirect('/siswa/overviewsiswa');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
	}

    public function profile()
    {
        $idUser = $this->session->userdata('id_User');
        $idAdmin =  $this->Admin_model->getAdminByUser($idUser);
        $data['profile'] = $this->Admin_model->getProfileAdmin($idAdmin[0]->id_admin)->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile',$data);
    }
    
    public function updateGambar()
    {
        $idUser = $this->session->userdata('id_User');
        $idAdmin =  $this->Admin_model->getAdminByUser($idUser);
        $config['upload_path']          = './assets/images/user/';
        $config['allowed_types']        = 'jpg|jpeg|png';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('file-input');
        if (!$upload){
            $data['profile'] = $this->Admin_model->getProfileAdmin($idAdmin[0]->id_admin)->result();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            
            $this->load->view('admin/header', $data);
            $this->load->view('admin/profile',$data);
        }else{
            $upload = $this->upload->data();
            $data = array(
                'foto' => $upload['file_name']
            );
            $array = array(
                'foto' => $upload['file_name']
            );
            $this->session->set_userdata( $array );
            $this->Admin_model->updateImage($data,$idAdmin[0]->id_admin);
            redirect('admin/profile/profile');
        }
    }

}
?>