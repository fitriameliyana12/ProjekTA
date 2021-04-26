<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Admin_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getAdmin()
	{
		return $this->db->get('user')->result();
	}

	public function insertAdmin()
	{
		$data = array(
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'password2' => $this->input->post('password'),
            'level' => $this->input->post('level'),
			);

		$this->db->insert('user', $data);

	}
	public function getAdminById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user')->result();
	}

	public function editAdmin($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'password2' => $this->input->post('password'),
            'level' => $this->input->post('level'),
			);

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function hapusAdmin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');	
	}

	public function editPass($id)
	{
		$data = array('password' => md5($this->input->post('pwbaru')) );

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}


}


?>