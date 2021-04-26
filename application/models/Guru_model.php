<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Guru_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getGuru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('user', 'guru.id_user = user.id_user', 'LEFT OUTER');
		$query = $this->db->get()->result();
		return $query;
		// return $this->db->get()->result();
		
	}
	public function insertGuru()
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			);

		$this->db->insert('guru', $data);

	}

	public function getGuruById($id)
	{
		$this->db->join('user', 'guru.id_user = user.id_user', 'LEFT');
		$this->db->where('guru.KodeGuru', $id);
		return $this->db->get('guru')->result();
	}

	public function editGuru($id)
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			);
		$this->db->where('KodeGuru', $id);
		$this->db->update('guru', $data);
	}

	public function hapusGuru($id)
	{
		$this->db->where('KodeGuru', $id);
		$this->db->delete('guru');

	}

	// public function editPass($id)
	// {
	// 	$data = array('password' => md5($this->input->post('pwbaru')) );

	// 	$this->db->where('KodeGuru', $id);
	// 	$this->db->update('guru', $data);
	// }

	public function getUserById($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user')->result();
	}

	public function editUser($id)
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),	
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
			);

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	public function hapusUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');	
	}

}
?>