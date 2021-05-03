<?php

class Jurusan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Jurusan_model');	

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
		$data['jurusanList'] = $this->Jurusan_model->getJurusan();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jurusan_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'required');
    	$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

    	if ($this->form_validation->run()==FALSE) {
    		$data['jurusanList'] = $this->Jurusan_model->getJurusan();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/jurusan_tambah');
    	}else {
    		$this->Jurusan_model->insertJurusan();
    		redirect('index.php/admin/jurusan', 'refresh');
    	}

	}


	public function edit($id)
	{
		$this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'required');
    	$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

    	$data['jurusan']=$this->Jurusan_model->getJurusanById($id);

    	if ($this->form_validation->run()==FALSE) {
    		$data['jurusanList'] = $this->Jurusan_model->getJurusan();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/jurusan_edit', $data);

    	}else {
    		$this->Jurusan_model->editJurusan($id);
    		
    		redirect('index.php/admin/jurusan', 'refresh');
    	}
	}

	public function hapus($id)
	{
		$this->Jurusan_model->hapusJurusan($id);
		redirect('index.php/admin/jurusan', 'refresh');
	}

}

?>