<?php

class Tugas extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Tugas_model');
        $this->load->model('Guru_model');

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
		$data['tugasList'] = $this->Tugas_model->getTugas();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/tugas_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('IdTugas', 'Id Tugas', 'required');
        $this->form_validation->set_rules('NamaTugas', 'Nama Tugas', 'required');
        $this->form_validation->set_rules('NamaKelas', 'Kelas', 'required');
        $this->form_validation->set_rules('IdMapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('Pertemuan', 'Pertemuan', 'required');
        $this->form_validation->set_rules('file', 'File', 'required');

    	if ($this->form_validation->run()==FALSE) {

            $data['tugasList'] = $this->Tugas_model->getTugas();
    		// $data['kelasList'] = $this->Kelas_model->getKelas();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/tugas_tambah', $data);
        }else {
            $this->Tugas_model->insertTugas();
            redirect('index.php/admin/tugas', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('IdTugas', 'Id Tugas', 'required');
        $this->form_validation->set_rules('NamaTugas', 'Nama Tugas', 'required');
        $this->form_validation->set_rules('NamaKelas', 'Kelas', 'required');
        $this->form_validation->set_rules('IdMapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('Pertemuan', 'Pertemuan', 'required');
        $this->form_validation->set_rules('file', 'File', 'required');
        if ($this->form_validation->run()==FALSE) {

            $data['tugas'] = $this->Tugas_model->getTugas();
            // $data['kelas'] = $this->Kelas_model->getKelasById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/kelas_edit', $data);
        }else{
                $this->Tugas_model->editTugas($id);
                redirect('index.php/admin/tugas', 'refresh');
            }  
        }

	public function hapus($id)
	{
		$this->Tugas_model->hapusTugas($id);

		redirect('index.php/admin/tugas','refresh');
	}

    public function getTugas()
    {
        $kode = $this->input->post('id');

        echo json_encode($kode);

    }

    public function getTugasSemua()
    {
        $data = $this->Tugas_model->getTugas();

        echo json_encode($data);
    }
}

?>