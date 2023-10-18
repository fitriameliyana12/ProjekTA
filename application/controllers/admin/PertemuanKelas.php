<?php
class PertemuanKelas extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('PertemuanKelas_model');
        $this->load->model('Pertemuan_model');
        $this->load->model('Mapel_model');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
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
		$data['pertemuanKelasList'] = $this->PertemuanKelas_model->getPertemuanKelas()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/pertemuanKelas_list', $data);
	}
	public function tambah()
	{
        // $this->form_validation->set_rules('id_mapel_kelas', 'id_Mapel_kelas', 'required');
        $this->form_validation->set_rules('KodePertemuan', 'KodePertemuan' , 'required');
    	$this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');
        $this->form_validation->set_rules('KodeMapel', 'KodeMapel', 'required');

    	if ($this->form_validation->run()==FALSE) {

            $data['guruList'] = $this->Guru_model->getGuru();
            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['mapelList'] = $this->Mapel_model->getMapel();
            $data['mapelKelasList'] = $this->MapelKelas_model->getMapelKelas();
            $data['pertemuanList'] = $this->Pertemuan_model->getPertemuan();
            $data['pertemuanKelasList'] = $this->PertemuanKelas_model->getPertemuanKelas();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/pertemuanKelas_tambah', $data);
        }else {
            $this->PertemuanKelas_model->insertPertemuanKelas();
            redirect('index.php/admin/pertemuanKelas', 'refresh');
        }
    }

    public function edit ($id)
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('KodePertemuan', 'KodePertemuan' , 'required');
    	$this->form_validation->set_rules('KodeKelas', 'KodeKelas', 'required');
        $this->form_validation->set_rules('KodeGuru', 'KodeGuru', 'required');
        $this->form_validation->set_rules('KodeMapel', 'KodeMapel', 'required');

        if ($this->form_validation->run()==FALSE) {

            $data['guruList'] = $this->Guru_model->getGuru();
            $data['kelasList'] = $this->Kelas_model->getKelas();
    		$data['mapelList'] = $this->Mapel_model->getMapel();
            $data['mapelKelas'] = $this->MapelKelas_model->getMapelKelas();
            $data['pertemuanList'] = $this->Pertemuan_model->getPertemuan();
            $data['pertemuanKelas'] = $this->PertemuanKelas_model->getPertemuanKelasById($id);

            $this->load->view('admin/header',$data);
            $this->load->view('admin/pertemuanKelas_edit', $data);
        }else{
                    $this->PertemuanKelas_model->editPertemuanKelas($id);
                    redirect('index.php/admin/pertemuanKelas', 'refresh');
            }  
        }

	public function hapus($id)
	{
		$this->PertemuanKelas_model->hapusPertemuanKelas($id);

		redirect('index.php/admin/pertemuanKelas','refresh');
	}

    public function getPertemuanKelas()
    {
        $kode = $this->input->post('id');

        echo json_encode($kode);

    }

    public function getPertemuanKelasSemua()
    {
        $data = $this->PertemuanKelas_model->getPertemuanKelas();

        echo json_encode($data);
    }

}

?>