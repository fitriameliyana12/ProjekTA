<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Kelas_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}

	public function getKelas()
	{
		return $this->db->get('kelas')->result();
	}

	public function getIndex($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

	public function insertKelas()
	{
		$data = array(
			'KodeKelas' => $this->input->post('KodeKelas'), 
            'NamaKelas' => $this->input->post('NamaKelas'),
		);
		$this->db->insert('kelas', $data);

	}

	public function editKelas($id)
	{
		$data = array(
			'KodeKelas' => $this->input->post('KodeKelas'), 
            'NamaKelas' => $this->input->post('NamaKelas'),
			);
		
		$this->db->where('KodeKelas', $id);
        $this->db->update('kelas', $data);
	}
    
    public function getKelasById($id)
	{
		$this->db->where('kelas.KodeKelas', $id);
		return $this->db->get('kelas')->row();
	}

	public function hapusKelas($id)
	{
		$this->db->where('KodeKelas', $id);
		$this->db->delete('kelas');
	}
}
?>