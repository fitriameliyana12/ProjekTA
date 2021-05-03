<?php

class Jadwal extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Jadwal_model');
        $this->load->model('Mapel_model');
        $this->load->model('Guru_model'); 
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
		$data['jadwalList'] = $this->Jadwal_model->getJadwal()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/jadwal_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('id_jadwal', 'ID Jadwal', 'required');
    	$this->form_validation->set_rules('KodeMapel', 'KodeMapel', 'required');
    	$this->form_validation->set_rules('hari', 'hari', 'required');
    	$this->form_validation->set_rules('jam', 'jam', 'required');
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');
        $this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
       
    	if ($this->form_validation->run()==FALSE) {

            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['guruList'] = $this->Guru_model->getGuru();
            $data['mapelList'] = $this->Mapel_model->getMapel();
    		$data['jadwalList'] = $this->Jadwal_model->getJadwal();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/jadwal_tambah', $data);
    	}
        else{
            $this->Jadwal_model->insertJadwal();
    		redirect('index.php/admin/jadwal', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('id_jadwal', 'ID Jadwal', 'required');
    	$this->form_validation->set_rules('KodeMapel', 'KodeMapel', 'required');
    	$this->form_validation->set_rules('hari', 'hari', 'required');
    	$this->form_validation->set_rules('jam', 'jam', 'required');
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');
        $this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        
        if ($this->form_validation->run()==FALSE) {

            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['guruList'] = $this->Guru_model->getGuru();
            $data['mapelList'] = $this->Mapel_model->getMapel();
            $data['jadwal'] = $this->Jadwal_model->getJadwalById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/jadwal_edit', $data);
        }

            else {
                $this->Jadwal_model->editJadwal($id);
                redirect('index.php/admin/jadwal', 'refresh');
            }   
        }

	public function hapus($id)
	{
		$this->Jadwal_model->hapusJadwal($id);

		redirect('index.php/admin/jadwal','refresh');
	}

    public function getJadwal()
    {
        $kode = $this->input->post('id');

        echo json_encode($data);

    }

    public function getJadwalSemua()
    {
        $data = $this->Jadwal_model->getJadwal();

        echo json_encode($data);
    }
}

?>