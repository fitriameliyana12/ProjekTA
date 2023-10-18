<?php

class Admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_model');	
		$this->load->model('User_model');

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
		$data['adminList'] = $this->Admin_model->getAdmin();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/admin_list', $data);
	}

	public function tambah()
	{
		// $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
    	$this->form_validation->set_rules('NamaAdmin', 'NamaAdmin', 'required');
    	$this->form_validation->set_rules('NIP', 'NIP', 'required');
    	$this->form_validation->set_rules('JenisKelamin', 'JenisKelamin', 'required');
		$this->form_validation->set_rules('id_user', 'id_user', 'required');
    	
    	if ($this->form_validation->run()==FALSE) {

			$data['userList'] = $this->User_model->getUser();
    		$data['adminList'] = $this->Admin_model->getAdmin();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/admin_tambah', $data);
    	}else {
    		$this->Admin_model->insertAdmin();
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success</strong> Data Admin Berhasil Ditambahkan. </div>');
    		redirect('index.php/admin/admin', 'refresh');
    	}

	}


	public function edit($id)
	{
		$this->form_validation->set_rules('id_admin', 'id_admin', 'required');
    	$this->form_validation->set_rules('NamaAdmin', 'NamaAdmin', 'required');
    	$this->form_validation->set_rules('NIP', 'NIP', 'required');
    	$this->form_validation->set_rules('JenisKelamin', 'JenisKelamin', 'required');
		$this->form_validation->set_rules('id_user', 'id_user', 'required');

    	if ($this->form_validation->run()==FALSE) {
			
			$data['userList'] = $this->User_model->getUser();
    		$data['admin'] = $this->Admin_model->getAdminById($id);
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/admin_edit', $data);

    	}else {
    		$this->Admin_model->editAdmin($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success</strong> Data Admin Berhasil Diedit. </div>');
    		redirect('index.php/admin/admin', 'refresh');
    	}
	}

	public function hapus($id)
	{
		$this->Admin_model->hapusAdmin($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success</strong> Data Admin Berhasil Dihapus. </div>');
		redirect('index.php/admin/admin', 'refresh');
	}

	public function getAdmin()
    {
        $kode = $this->input->post('id');

        echo json_encode($data);

    }

    public function getAdminSemua()
    {
        $data = $this->Admin_model->getAdmin();

        echo json_encode($data);
    }
	
}

?>