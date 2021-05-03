<?php

class KelasSiswa extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('KelasSiswa_model');
        $this->load->model('Kelas_model'); 
        $this->load->model('Siswa_model'); 

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
		$data['kelasSiswaList'] = $this->KelasSiswa_model->getKelasSiswa()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/kelasSiswa_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('id_kelas_siswa', 'ID Kelas Siswa', 'required');
    	$this->form_validation->set_rules('KodeKelas', 'Kode Kelas', 'required');
    	$this->form_validation->set_rules('no_induk', 'No Induk', 'required');
       
    	if ($this->form_validation->run()==FALSE) {

            $data['siswaList'] = $this->Siswa_model->getSiswa();
            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['kelasSiswaList'] = $this->KelasSiswa_model->getKelasSiswa();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/kelasSiswa_tambah', $data);
    	}
        else{
            $this->KelasSiswa_model->insertKelasSiswa();
    		redirect('index.php/admin/kelasSiswa', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('id_kelas_siswa', 'ID Kelas Siswa', 'required');
    	$this->form_validation->set_rules('KodeKelas', 'Kode Kelas', 'required');
    	$this->form_validation->set_rules('no_induk', 'No Induk', 'required');
        
        if ($this->form_validation->run()==FALSE) {

            $data['siswaList'] = $this->Siswa_model->getSiswa();
            $data['kelasList'] = $this->Kelas_model->getKelas();
            $data['kelasSiswa'] = $this->KelasSiswa_model->getKelasSiswaById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/kelasSiswa_edit', $data);
        }

            else {
                $this->KelasSiswa_model->editKelasSiswa($id);
                redirect('index.php/admin/kelasSiswa', 'refresh');
            }   
        }

	public function hapus($id)
	{
		$this->KelasSiswa_model->hapusKelasSiswa($id);

		redirect('index.php/admin/kelasSiswa','refresh');
	}

    public function getKelasSiswa()
    {
        $kode = $this->input->post('id');

        echo json_encode($data);

    }

    public function getKelasSiswaSemua()
    {
        $data = $this->KelasSiswa_model->getKelasSiswa();

        echo json_encode($data);
    }
}

?>