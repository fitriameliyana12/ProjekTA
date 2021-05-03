<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');

		// //anti bypass
        if ($this->session->userdata('level') == "2") {
            redirect('/guru/overviewGuru');
        } elseif ($this->session->userdata('level') == "3") {
            redirect('/siswa/overviewsiswa');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
    }
    public function index()
	{
		$data['userList'] = $this->User_model->getUser();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/user_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	$this->form_validation->set_rules('level', 'Level', 'required');

    	if ($this->form_validation->run()==FALSE) {
    		$data['userList'] = $this->User_model->getUser();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/user_tambah');
    	}else {
    		$this->User_model->insertUser();
    		redirect('index.php/admin/user', 'refresh');
    	}

	}


	public function edit($id)
	{
		$this->form_validation->set_rules('id_user', 'ID User', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	$this->form_validation->set_rules('level', 'Level', 'required');

    	$data['user']=$this->User_model->getUserById($id);

    	if ($this->form_validation->run()==FALSE) {
    		$data['userList'] = $this->User_model->getUser();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/user_edit', $data);

    	}else {
    		$this->User_model->editUser($id);
    		
    		redirect('index.php/admin/user', 'refresh');
    	}
	}

	public function hapus($id)
	{
		$this->User_model->hapusUser($id);
		redirect('index.php/admin/user', 'refresh');
	}

	public function ubah_pass()
	{
		$this->form_validation->set_rules('pwlama', 'Password Lama', 'required|callback_cekPwLama');
    	$this->form_validation->set_rules('pwbaru', 'Password Baru', 'required');
    	$this->form_validation->set_rules('pwkonfirm', 'Konfirmasi Password', 'required|matches[pwbaru]');
    	if ($this->form_validation->run()==FALSE) {
    		$data['obatmenipis'] = $this->obat_model->getObatMenipis();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/edit_password');

    	}else {
    		$id = $this->session->userdata('id_User');
    		$this->Admin_model->editPass($id);
    		
    		redirect('index.php/admin/admin', 'refresh');
    	}
	}


	public function cekPwLama()
	{
		$id = $this->session->userdata('id_User');

		$dataAdmin = $this->Admin_model->getAdminById($id);
		// var_dump($dataAdmin[0]->password);
		if ($dataAdmin[0]->password == md5($this->input->post('pwlama'))) {
			return true;
		} else {
			return false;
		}

	}
}

?>