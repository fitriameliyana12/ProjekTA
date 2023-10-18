<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
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
		$this->form_validation->set_rules('status', 'status', 'required');

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
		$this->form_validation->set_rules('status', 'status', 'required');

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

	
}

?>