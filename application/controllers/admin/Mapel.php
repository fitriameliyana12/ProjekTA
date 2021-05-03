<?php

class Mapel extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Mapel_model');

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
		$data['mapelList'] = $this->Mapel_model->getMapel();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/mapel_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('KodeMapel', 'Kode Mapel', 'required');
    	$this->form_validation->set_rules('NamaMapel', 'Mata Pelajaran', 'required');
        // $this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'required');
        // $this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');

    	if ($this->form_validation->run()==FALSE) {

            // $data['kelasList'] = $this->Kelas_model->getKelas();
            // $data['jurusanList'] = $this->Jurusan_model->getJurusan();
    		$data['mapelList'] = $this->Mapel_model->getMapel();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/mapel_tambah', $data);
        }else {
            $this->Mapel_model->insertMapel();
            redirect('index.php/admin/mapel', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('KodeMapel', 'Kode Mapel', 'required');
        $this->form_validation->set_rules('NamaMapel', 'Mata Pelajaran', 'required');
        // $this->form_validation->set_rules('id_jurusan', 'ID Jurusan', 'required');
        // $this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');

        if ($this->form_validation->run()==FALSE) {

            // $data['kelasList'] = $this->Kelas_model->getKelas();
            // $data['jurusanList'] = $this->Jurusan_model->getJurusan();
            $data['mapel'] = $this->Mapel_model->getMapelById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/mapel_edit', $data);
        }else{
                    $this->Mapel_model->editMapel($id);
                    redirect('index.php/admin/mapel', 'refresh');
            }  
        }

	public function hapus($id)
	{
		$this->Mapel_model->hapusMapel($id);

		redirect('index.php/admin/mapel','refresh');
	}

    public function getMapel()
    {
        $kode = $this->input->post('KodeMapel');

        echo json_encode($kode);

    }

    public function getMapelSemua()
    {
        $data = $this->Mapel_model->getMapel();

        echo json_encode($data);
    }

}

?>