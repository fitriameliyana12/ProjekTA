<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin_modelPengumuman extends CI_Model{
        
        public function __construct()

        {

            parent::__construct();

        }

    public function getPengumuman()
	{
	    return $this->db->get('pengumuman')->result();
	}

	public function insertPengumuman()
	{
		$data = array(
			'judulPengumuman' => $this->input->post('judulPengumuman'), 
			'TglPengumuman' => $this->input->post('TglPengumuman'),
			'isi' => $this->input->post('isi'),
			'tampilSiswa' => $this->input->post('tampilSiswa'),
            'TampilGuru' => $this->input->post('TampilGuru'),
            'KodeGuru' =>$this->input->post('KodeGuru')
			);

		$this->db->insert('pengumuman', $data);

	}
	public function getPengumumanById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('pengumuman')->result();
	}

	public function editPengumuman($id)
	{
		$data = array(
			'judulPengumuman' => $this->input->post('judulPengumuman'), 
			'TglPengumuman' => $this->input->post('TglPengumuman'),
			'isi' => $this->input->post('isi'),
			'tampilSiswa' => $this->input->post('tampilSiswa'),
            'TampilGuru' => $this->input->post('TampilGuru'),
            'KodeGuru' =>$this->input->post('KodeGuru')
			);

		$this->db->where('id', $id);
		$this->db->update('pengumuman', $data);
	}

	public function hapusPengumuman($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pengumuman');	
	}

        // public function getPengumuman()
        // {
        //     return $this->db->get('pengumuman');
        // }

        // public function getPengumumanSiswa()
        // {
        //     $this->db->where('tampilSiswa', '1');
        //     return $this->db->get('pengumuman');
        // }

        // public function getPengumumanGuru()
        // {
        //     $this->db->where('TampilGuru', '1');
        //     return $this->db->get('pengumuman');
        // }

        // public function getDetailPengumuman($id)
        // {
        //     $this->db->where('id', $id);
        //     return $this->db->get('pengumuman');        
        // }

        // public function TambahPengumuman($data)
        // {
        //     $this->db->insert('pengumuman', $data);    
        // }

        // public function updatePengumuman($data,$id)
        // {
        //     $this->db->where('id', $id);
        //     $this->db->update('pengumuman', $data);
        // }

        // public function hapusPengumuman($id)
        // {
        //     $this->db->where('id', $id);
        //     $this->db->delete('pengumuman');
        // }
    }
?>