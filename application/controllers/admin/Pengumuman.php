<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->model('Adminpengumuman_model');
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
        $data['pengumumanList'] = $this->Adminpengumuman_model->getPengumuman();
        $this->load->view('admin/header');
        $this->load->view('admin/pengumuman_list', $data);
    }

	public function tambah()
	{
    	$this->form_validation->set_rules('judul', 'judul', 'required');
    	$this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

    	if ($this->form_validation->run()==FALSE) {

    		$data['pengumumanList'] = $this->Adminpengumuman_model->getPengumuman();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/pengumuman_tambah', $data);
    	}
        else{
            $this->Adminpengumuman_model->insertPengumuman();
    		redirect('index.php/admin/pengumuman', 'refresh');
        }
    }

    public function edit ($id)
    {
        // $this->form_validation->set_rules('IdPengumuman', 'ID Pengumuman', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        
        if ($this->form_validation->run()==FALSE) {

            $data['pengumuman'] = $this->Adminpengumuman_model->getPengumumanById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/pengumuman_edit', $data);
        }

            else {
                $this->Adminpengumuman_model->editPengumuman($id);
                redirect('index.php/admin/pengumuman', 'refresh');
            }   
        }

	public function hapus($id)
	{
		$this->Adminpengumuman_model->hapusPengumuman($id);

		redirect('index.php/admin/pengumuman','refresh');
	}

    public function getPengumuman()
    {
        $kode = $this->input->post('IdPengumuman');

        // $data = $this->Guru_model->getPengumumanbyKode($kode);

        echo json_encode($data);

    }

   

}
?>