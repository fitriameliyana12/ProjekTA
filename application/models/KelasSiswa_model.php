<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class KelasSiswa_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getKelasSiswa()
	{
		$this->db->select('*');
		$this->db->from('kelas_siswa');
		$this->db->join('kelas', 'kelas_siswa.KodeKelas = kelas.KodeKelas');
        $this->db->join('siswa', 'kelas_siswa.no_induk = siswa.no_induk', 'LEFT');
		$query = $this->db->get();
		return $query;
		// return $this->db->get('guru')->result();
		
	}
	public function insertKelasSiswa()
	{
		$data = array(
			'KodeKelas' => $this->input->post('KodeKelas'), 
			'No_induk' => $this->input->post('No_induk'),
			);

		$this->db->insert('kelas_siswa', $data);

	}

	public function getKelasSiswaById($id)
	{
        $this->db->join('kelas', 'kelas_siswa.KodeKelas = kelas.KodeKelas');
        $this->db->join('siswa', 'kelas_siswa.no_induk = siswa.no_induk', 'LEFT');
		$this->db->where('kelas_siswa.id_kelas_siswa', $id);
		return $this->db->get('kelasSiswa')->result();
	}

	

	public function editKelasSiswa($id)
	{
		$data = array(
			'KodeKelas' => $this->input->post('KodeKelas'), 
			'No_induk' => $this->input->post('No_induk'),
			);
		$this->db->where('id_kelas_siswa', $id);
		$this->db->update('kelas_siswa', $data);
	}

	public function hapusKelasSiswa($id)
	{
		$this->db->where('id_kelas_siswa', $id);
		$this->db->delete('kelas_siswa');

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
		return $this->db->get('kelas')->result();
	}

	public function hapusKelas($id)
	{
		$this->db->where('KodeKelas', $id);
		$this->db->delete('kelas');
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

}
?>