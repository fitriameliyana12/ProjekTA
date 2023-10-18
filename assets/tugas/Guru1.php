<?php

class Guru extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Guru_model');
        $this->load->model('User_model'); 
        $this->load->model('Admin_model');	

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
		$data['guruList'] = $this->Guru_model->getGuru();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/guru_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');
    	$this->form_validation->set_rules('NamaGuru', 'NamaGuru', 'required');
    	$this->form_validation->set_rules('NIP', 'NIP', 'required');
    	$this->form_validation->set_rules('JenisKelamin', 'JenisKelamin', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
       
    	if ($this->form_validation->run()==FALSE) {

            $data['userList'] = $this->User_model->getUser();
    		$data['guruList'] = $this->Guru_model->getGuru();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/guru_tambah', $data);
    	}
        else{
            $this->Guru_model->insertGuru();
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success</strong> Data Berhasil Ditambahkan. </div>'); 
    		redirect('index.php/admin/guru', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');
        $this->form_validation->set_rules('NamaGuru', 'NamaGuru', 'required');
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('JenisKelamin', 'JenisKelamin', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        
        if ($this->form_validation->run()==FALSE) {

            $data['userList'] = $this->User_model->getUser();
            $data['guru'] = $this->Guru_model->getGuruById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/guru_edit', $data);
        }

            else {
                $this->Guru_model->editGuru($id);
                 $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Success</strong> Data Berhasil Diedit. </div>');
                redirect('index.php/admin/guru', 'refresh');
            }   
        }

	public function hapus($id)
	{
		$this->Guru_model->hapusGuru($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Success!</strong> Data Berhasil Dihapus. </div>'); 
		redirect('index.php/admin/guru','refresh');
	}

    public function getGuru()
    {
        $kode = $this->input->post('id');

        echo json_encode($data);

    }

    public function getGuruSemua()
    {
        $data = $this->Guru_model->getGuru();

        echo json_encode($data);
    }
}

?>