<?php

class Siswa extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
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
		$data['siswaList'] = $this->Siswa_model->getSiswa()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/siswa_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('no_induk', 'No Induk', 'required');
		$this->form_validation->set_rules('NISN', 'NISN', 'required');
    	$this->form_validation->set_rules('NamaSiswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('JenisKelamin', 'Jenis Kelamin', 'required');
    	$this->form_validation->set_rules('KodeKelas', 'Kode Kelas', 'required');
		$this->form_validation->set_rules('id_user', 'ID User', 'required');
    	
    	if ($this->form_validation->run()==FALSE) {

			$data['userList'] = $this->User_model->getUser();
			$data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['siswaList'] = $this->Siswa_model->getSiswa();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/siswa_tambah');
    	}else {
    		$this->Siswa_model->insertSiswa();
    		redirect('index.php/admin/siswa', 'refresh');
    	}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('no_induk', 'No Induk', 'required');
    	$this->form_validation->set_rules('NISN', 'NISN', 'required');
    	$this->form_validation->set_rules('NamaSiswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('JenisKelamin', 'Jenis Kelamin', 'required');
    	$this->form_validation->set_rules('KodeKelas', 'Kode Kelas', 'required');
		$this->form_validation->set_rules('id_user', 'ID User', 'required');

    	if ($this->form_validation->run()==FALSE) {

			$data['userList']=$this->User_model->getUser();
			$data['kelasList']=$this->Kelas_model->getKelas();
			$data['siswa']=$this->Siswa_model->getSiswaById($id);

    		$this->load->view('admin/header',$data);
			$this->load->view('admin/siswa_edit', $data);

    	}else {
    		$this->Siswa_model->editSiswa($id);
    		
    		redirect('index.php/admin/siswa', 'refresh');
    	}
	}

	public function hapus($id)
	{
		$this->Siswa_model->hapusSiswa($id);
		redirect('index.php/admin/siswa', 'refresh');
	}

	public function getSiswa()
    {
        $kode = $this->input->post('id');

        echo json_encode($data);

    }

    public function getSiswaSemua()
    {
        $data = $this->Siswa_model->getSiswa();

        echo json_encode($data);
    }
}

?>