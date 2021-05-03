<?php

class Kelas extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Kelas_model');

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
		$data['kelasList'] = $this->Kelas_model->getKelas();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/kelas_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        $this->form_validation->set_rules('NamaKelas', 'Nama Kelas', 'required');

    	if ($this->form_validation->run()==FALSE) {

    		$data['kelasList'] = $this->Kelas_model->getKelas();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/kelas_tambah', $data);
        }else {
            $this->Kelas_model->insertKelas();
            redirect('index.php/admin/kelas', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        $this->form_validation->set_rules('NamaKelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run()==FALSE) {

            $data['kelas'] = $this->Kelas_model->getKelasById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/kelas_edit', $data);
        }else{
                $this->Kelas_model->editKelas($id);
                redirect('index.php/admin/kelas', 'refresh');
            }  
        }

	public function hapus($id)
	{
		$this->Kelas_model->hapusKelas($id);

		redirect('index.php/admin/kelas','refresh');
	}

    public function getKelas()
    {
        $kode = $this->input->post('id');

        echo json_encode($kode);

    }

    public function getKelasSemua()
    {
        $data = $this->Kelas_model->getKelas();

        echo json_encode($data);
    }

}

?>