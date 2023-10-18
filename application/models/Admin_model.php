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
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->join('user', 'admin.id_user = user.id_user', 'LEFT OUTER');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getProfileAdmin($id)
    {
        $this->db->where('id_admin', $id);
        return $this->db->get('admin');
    }
	public function getAdminByUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('admin')->result();
    }

	public function updateImage($data,$id)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
    }

	public function insertAdmin()
	{
		$data = array(
			'id_admin' => $this->input->post('id_admin'), 
			'NamaAdmin' => $this->input->post('NamaAdmin'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
            'id_user' => $this->input->post('id_user'),
		);

		$this->db->insert('admin', $data);

	}
	public function getAdminById($id)
	{
		$this->db->join('user', 'admin.id_user = user.id_user', 'LEFT');
		$this->db->where('admin.id_admin', $id);
		return $this->db->get('admin')->result();
	}

	public function getAdminId($id)
	{
		$this->db->where('id_user', $id);
        return $this->db->get('admin')->row();
	}

	public function editAdmin($id)
	{
		$data = array(
			'id_admin' => $this->input->post('id_admin'), 
			'NamaAdmin' => $this->input->post('NamaAdmin'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
            'id_user' => $this->input->post('id_user'),
			);

		$this->db->where('id_admin', $id);
		$this->db->update('admin', $data);
	}

	public function hapusAdmin($id)
	{
		$this->db->where('id_admin', $id);
		$this->db->delete('admin');	
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
			'status' => $this->input->post('status'),
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