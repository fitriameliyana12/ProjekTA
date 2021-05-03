<?php
class MapelKelas extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MapelKelas_model');
        $this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
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
		$data['mapelKelasList'] = $this->MapelKelas_model->getMapelKelas()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/mapelKelas_list', $data);
	}
	public function tambah()
	{
        // $this->form_validation->set_rules('id_mapel_kelas', 'id_Mapel_kelas', 'required');
		$this->form_validation->set_rules('KodeMapel', 'KodeMapel', 'required');
    	$this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');   
    	if ($this->form_validation->run()==FALSE) {

            $data['guruList'] = $this->Guru_model->getGuru();
            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['mapelList'] = $this->Mapel_model->getMapel();
            $data['mapelKelasList'] = $this->MapelKelas_model->getMapelKelas();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/mapelKelas_tambah', $data);
        }else {
            $this->MapelKelas_model->insertMapelKelas();
            redirect('index.php/admin/mapelKelas', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('id_mapel_kelas', 'id_Mapel_kelas', 'required');
		$this->form_validation->set_rules('KodeMapel', 'KodeMapel', 'required');
    	$this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');

        if ($this->form_validation->run()==FALSE) {

            $data['guruList'] = $this->Guru_model->getGuru();
            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['mapelList'] = $this->Mapel_model->getMapel();
            $data['mapelKelas'] = $this->MapelKelas_model->getMapelKelasById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/mapelKelas_edit', $data);
        }else{
                    $this->MapelKelas_model->editMapelKelas($id);
                    redirect('index.php/admin/mapelKelas', 'refresh');
            }  
        }

	public function hapus($id)
	{
		$this->MapelKelas_model->hapusMapelKelas($id);

		redirect('index.php/admin/mapelKelas','refresh');
	}

    public function getMapelKelas()
    {
        $kode = $this->input->post('id_mapel_kelas');

        echo json_encode($kode);

    }

    public function getMapelKelasSemua()
    {
        $data = $this->MapelKelas_model->getMapelKelas();

        echo json_encode($data);
    }

}

?>