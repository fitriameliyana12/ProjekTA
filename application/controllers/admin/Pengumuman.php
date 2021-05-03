<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->model('Adminpengumuman_model');
        // $this->load->model('Guru_model');

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
        $data['pengumumanList'] = $this->Adminpengumuman_model->getPengumuman();
        $this->load->view('admin/header');
        $this->load->view('admin/pengumuman_list');
        // $this->load->view('admin/pengumuman/index',$data);
        // $this->load->view('admin/footer');
    }

	public function tambah()
	{
		$this->form_validation->set_rules('JudulPengumuman', 'Judul Pengumuman', 'required');
    	$this->form_validation->set_rules('TglPengumuman', 'Tanggal Pengumuman', 'required');
    	$this->form_validation->set_rules('isi', 'isi', 'required');
    	$this->form_validation->set_rules('tampilSiswa', 'Tampil Siswa', 'required');
        $this->form_validation->set_rules('TampilGuru', 'Tampil Guru', 'required');
        // $this->form_validation->set_rules('KodeGuru', 'Kode Guru', 'required');

    	if ($this->form_validation->run()==FALSE) {

    		$data['pengumumanList'] = $this->Adminpengumuman_model->getPengumuman();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/Pengumuman/tambah', $data);
    	}
        else{
            $this->Adminpengumuman_model->insertPengumuman();
    		redirect('index.php/admin/pengumuman_tambah', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('JudulPengumuman', 'Judul Pengumuman', 'required');
    	$this->form_validation->set_rules('TglPengumuman', 'Tanggal Pengumuman', 'required');
    	$this->form_validation->set_rules('isi', 'isi', 'required');
    	$this->form_validation->set_rules('tampilSiswa', 'Tampil Siswa', 'required');
        $this->form_validation->set_rules('TampilGuru', 'Tampil Guru', 'required');
        // $this->form_validation->set_rules('KodeGuru', 'Kode Guru', 'required');
        
        if ($this->form_validation->run()==FALSE) {

            $data['pengumuman'] = $this->Adminpengumuman_model->getPengumumanById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/edit', $data);
        }

            else {
                $this->Adminpengumuman_model->editPengumuman($id);
                redirect('index.php/admin/pengumuman_edit', 'refresh');
            }   
        }

	public function hapus($id)
	{
		$this->Adminpengumuman_model->hapusPengumuman($id);

		redirect('index.php/admin/pengumuman','refresh');
	}

    public function getPengumuman()
    {
        $kode = $this->input->post('id');

        // $data = $this->Guru_model->getPengumumanbyKode($kode);

        echo json_encode($data);

    }

    public function getPengumumanSemua()
    {
        $data = $this->Pengumuman_model->getPengumuman();

        echo json_encode($data);
    }

    // public function TambahPengumuman()
    // {
    //     $this->load->view('admin/header');
    //     // $this->load->view('part/sidebaradmin');
    //     $this->load->view('admin/pengumuman/TambahPengumuman');
    //     // $this->load->view('part/footer');
    // }
    
    // public function prosesTambahPengumuman()
    // {
    //     $this->form_validation->set_rules('judulPengumuman', 'judul', 'required');
    //     $this->form_validation->set_rules('tglPengumuman', 'tanggal', 'required');
    //     $this->form_validation->set_rules('isi', 'isi', 'required');
    //     $this->form_validation->set_rules('tampilSiswa', 'tampil siswa', 'required');
    //     $this->form_validation->set_rules('tampilGuru', 'tampil guru', 'required');
    //     $this->form_validation->set_rules('KodeGuru', 'Kode guru', 'required');
        
    //     if ($this->form_validation->run() == TRUE) {
    //         $data = array(
    //             'judulPengumuman' => $this->input->post('judulPengumuman'),
    //             'tglPengumuman' => $this->input->post('tglPengumuman'),
    //             'isi' => $this->input->post('isi'),
    //             'tampilSiswa' => $this->input->post('tampilSiswa'),
    //             'tampilGuru' => $this->input->post('tampilGuru'),
    //             'KodeGuru' => $this->session->userdata('KodeGuru')                
    //         );
    //         $this->Pengumuman_model->TambahPengumuman($data);
    //         redirect('admin/Pengumuman');
            
    //     } else {
    //         $this->session->set_flashdata('alert', $this->Admin_Model->get_alert('warning', 'lengkapilah form di bawah.'));
            
    //         redirect('admin/TambahPengumuman');
    //     }
        
    // }

    // public function EditPengumuman($id)
    // {
    //     $data['pengumuman'] = $this->Admin_model->getDetailPengumuman($id)->result();
    //     // print_r($data);
    //     $this->load->view('part/header');
    //     $this->load->view('part/sidebaradmin');
    //     $this->load->view('admin/pengumuman/EditPengumuman', $data);
    //     $this->load->view('part/footer');
    // }
    
    // public function prosesEditPengumuman()
    // {
    //     $this->form_validation->set_rules('judulPengumuman', 'judul', 'required');
    //     $this->form_validation->set_rules('tglPengumuman', 'tanggal', 'required');
    //     $this->form_validation->set_rules('isi', 'isi', 'required');
    //     $this->form_validation->set_rules('tampilSiswa', 'tampil siswa', 'required');
    //     $this->form_validation->set_rules('tampilGuru', 'tampil guru', 'required');
    //     $this->form_validation->set_rules('KodeGuru', 'Kode guru', 'required');
        
    //     if ($this->form_validation->run() == TRUE) {
    //         $id = $this->input->post('idPengumuman');
    //         $data = array(
    //             'judulPengumuman' => $this->input->post('judulPengumuman'),
    //             'tglPengumuman' => $this->input->post('tglPengumuman'),
    //             'isi' => $this->input->post('isi'),
    //             'tampilSiswa' => $this->input->post('tampilSiswa'),
    //             'tampilGuru' => $this->input->post('tampilGuru'),
    //             'KodeGuru' => $this->session->userdata('KodeGuru')                
    //         );
    //         $this->Admin_model->updatePengumuman($data,$id);
    //         // print_r($data);
    //         redirect('admin/Pengumuman');
            
    //     } else {
    //         $this->session->set_flashdata('alert', $this->User_Model->get_alert('warning', 'lengkapilah form di bawah.'));
    //         redirect('admin/EditPengumuman/'.$this->input->post('id'));
    //     }
        
    // }

    public function TampilPengumuman($id)
    {
        $data['pengumuman'] = $this->Pengumuman_model->getDetailPengumuman($id)->result();
        $data['guru'] = $this->Pengumuman_model->getGuru($data['pengumuman'][0]->KodeGuru)->result();
        // print_r($data);
        $this->load->view('part/header');
        // $this->load->view('part/sidebaradmin');
        $this->load->view('admin/pengumuman/DetailPengumuman',$data);
        // $this->load->view('part/footer');
    }

    // public function hapusPengumuman($id)
    // {
    //     $this->Admin_model->hapusPengumuman($id);
    //     redirect('admin/pengumuman');
    // }

}
?>