<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Jurusan_model extends CI_Model

{

	public function __construct()
	{
		parent::__construct();
	}


	public function getJurusan()
	{
		return $this->db->get('jurusan')->result();
	}

	public function insertJurusan()
	{
		$data = array(
			'id_jurusan' => $this->input->post('id_jurusan'), 
			'jurusan' => $this->input->post('jurusan'),
			);

		$this->db->insert('jurusan', $data);

	}
	public function getJurusanById($id)
	{
		$this->db->where('id_jurusan', $id);
		return $this->db->get('jurusan')->result();
	}

	public function editJurusan($id)
	{
		$data = array(
			'id_jurusan' => $this->input->post('id_jurusan'), 
			'jurusan' => $this->input->post('jurusan'),
			);

		$this->db->where('id_jurusan', $id);
		$this->db->update('jurusan', $data);
	}

	public function hapusJurusan($id)
	{
		$this->db->where('id_jurusan', $id);
		$this->db->delete('jurusan');	
	}
}


?>