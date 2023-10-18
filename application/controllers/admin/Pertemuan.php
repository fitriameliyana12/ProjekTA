<?php

class Pertemuan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Pertemuan_model');
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
		$data['pertemuanList'] = $this->Pertemuan_model->getPertemuan();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/pertemuan_list', $data);
	}

	public function tambah()
	{
		// $this->form_validation->set_rules('KodePertemuan', 'KodePertemuan', 'required');
        $this->form_validation->set_rules('NamaPertemuan', 'Nama Pertemuan', 'required');
        $this->form_validation->set_rules('tgl_pertemuan', 'Tanggal Pertemuan', 'required');

    	if ($this->form_validation->run()==FALSE) {

    		$data['pertemuanList'] = $this->Pertemuan_model->getPertemuan();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/pertemuan_tambah', $data);
        }else {
            $this->Pertemuan_model->insertPertemuan();
            redirect('index.php/admin/pertemuan', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('KodePertemuan', 'KodePertemuan', 'required');
        $this->form_validation->set_rules('NamaPertemuan', 'Nama Pertemuan', 'required');
        $this->form_validation->set_rules('tgl_pertemuan', 'Tanggal Pertemuan', 'required');


        if ($this->form_validation->run()==FALSE) {

            $data['pertemuan'] = $this->Pertemuan_model->getPertemuanById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/pertemuan_edit', $data);
        }else{
                $this->Pertemuan_model->editPertemuan($id);
                redirect('index.php/admin/pertemuan', 'refresh');
            }  
        }

	public function hapus($id)
	{
		$this->Pertemuan_model->hapusPertemuan($id);

		redirect('index.php/admin/pertemuan','refresh');
	}

    public function getPertemuan()
    {
        $kode = $this->input->post('id');

        echo json_encode($kode);

    }

    public function getPertemuanSemua()
    {
        $data = $this->Pertemuan_model->getPertemuan();

        echo json_encode($data);
    }

}

?>