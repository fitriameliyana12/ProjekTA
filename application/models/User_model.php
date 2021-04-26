<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class User_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getUser()
	{
		return $this->db->get('user')->result();
	}

	public function insertUser()
	{
		$data = array(
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
			);

		$this->db->insert('user', $data);

	}
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

	public function editPass($id)
	{
		$data = array('password' => md5($this->input->post('pwbaru')) );

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}


}
?>