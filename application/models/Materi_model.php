<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Siswa_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getMateri()
	{
		$this->db->select('*');
		$this->db->from('materi');
		$this->db->join('mapel', 'materi.KodeKelas=mapel.KodeKelas', 'LEFT');
		$this->db->join('user', 'siswa.id_user = user.id_user', 'LEFT');
		$query = $this->db->get();
		return $query;
		// return $this->db->get('siswa')->result();
	}

	public function insertSiswa()
	{
		$data = array(
			'no_induk' => $this->input->post('no_induk'),
			'NISN' => $this->input->post('NISN'), 
			'NamaSiswa' => $this->input->post('NamaSiswa'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'KodeKelas' => $this->input->post('KodeKelas'),
			'id_user' => $this->input->post('id_user'),
			);

		$this->db->insert('siswa', $data);
	}

	public function editSiswa($id)
	{
		$data = array(
			'no_induk' => $this->input->post('no_induk'),
			'NISN' => $this->input->post('NISN'), 
			'NamaSiswa' => $this->input->post('NamaSiswa'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'KodeKelas' => $this->input->post('KodeKelas'),
			'id_user' => $this->input->post('id_user'),
			);

		$this->db->where('no_induk', $id);
		$this->db->update('siswa', $data);
	}

	public function getSiswaById($id)
	{
		$this->db->join('kelas', 'siswa.KodeKelas=kelas.KodeKelas', 'LEFT');
		$this->db->join('user', 'siswa.id_user = user.id_user', 'LEFT');
		$this->db->where('siswa.no_induk', $id);
		return $this->db->get('siswa')->result();
	}

	public function hapusSiswa($id)
	{
		$this->db->where('no_induk', $id);
		$this->db->delete('siswa');	
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
		$this->db->where('KodeKelas', $id);
		return $this->db->get('kelas')->result();
	}

	public function hapusKelas($id)
	{
		$this->db->where('KodeKelas', $id);
		$this->db->delete('kelas');
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

	public function getUserById($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user')->result();
	}

	public function hapusUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');	
	}

	
}


?>