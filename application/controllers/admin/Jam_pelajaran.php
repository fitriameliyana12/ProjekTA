<?php

class Jam_pelajaran extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Jam_pelajaran_model');
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
		$data['jamList'] = $this->Jam_pelajaran_model->getJam();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jam_list', $data);
	}

	public function tambah()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
    	$this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'jam_selesai', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

    	if ($this->form_validation->run()==FALSE) {
    		$data['jamList'] = $this->Jam_pelajaran_model->getJam();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/jam_tambah');
    	}else {
    		$this->Jam_pelajaran_model->insertJam();
    		redirect('index.php/admin/Jam_pelajaran', 'refresh');
    	}

	}


	public function edit($id)
	{
		$this->form_validation->set_rules('id', 'id', 'required');
    	$this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'jam_selesai', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

    	$data['jam']=$this->Jam_pelajaran_model->getJamById($id);

    	if ($this->form_validation->run()==FALSE) {
    		$data['jamList'] = $this->Jam_pelajaran_model->getJam();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/jam_edit', $data);

    	}else {
    		$this->Jam_pelajaran_model->editJam($id);
    		
    		redirect('index.php/admin/Jam_pelajaran', 'refresh');
    	}
	}

	public function hapus($id)
	{
		$this->Jam_pelajaran_model->hapusJam($id);
		redirect('index.php/admin/Jam_pelajaran', 'refresh');
	}

}

?>