<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Jadwal_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getJadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('mapel', 'jadwal.KodeMapel = mapel.KodeMapel', 'LEFT');
        $this->db->join('guru', 'jadwal.KodeGuru = guru.KodeGuru', 'LEFT');
        $this->db->join('kelas', 'jadwal.KodeKelas = kelas.KodeKelas', 'LEFT');
		$query = $this->db->get();
		return $query;
		// return $this->db->get('jadwal')->result();
		
	}

	public function insertJadwal()
	{
		$data = array(
            'id_jadwal' => $this->input->post('id_jadwal'),
            'KodeMapel' => $this->input->post('KodeMapel'),
            'hari' => $this->input->post('hari'), 
            'jam' => $this->input->post('jam'), 
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'KodeKelas' => $this->input->post('KodeKelas'),
			);

		$this->db->insert('jadwal', $data);

	}

	public function getJadwalById($id)
	{
		$this->db->join('mapel', 'jadwal.KodeMapel = mapel.KodeMapel', 'LEFT');
        $this->db->join('guru', 'jadwal.KodeGuru = guru.KodeGuru', 'LEFT');
        $this->db->join('kelas', 'jadwal.KodeKelas = kelas.KodeKelas', 'LEFT');
		$this->db->where('jadwal.id_jadwal', $id);
		return $this->db->get('jadwal')->result();
	}


	public function editJadwal($id)
	{
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
            'KodeMapel' => $this->input->post('KodeMapel'),
            'hari' => $this->input->post('hari'), 
            'jam' => $this->input->post('jam'), 
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'KodeKelas' => $this->input->post('KodeKelas'),
			);
		$this->db->where('id_jadwal', $id);
		$this->db->update('jadwal', $data);
	}

	public function hapusJadwal($id)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jadwal');

	}

	public function editMapel($id)
	{
		$data = array(
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'NamaMapel' => $this->input->post('NamaMapel'),
			'id_jurusan' => $this->input->post('id_jurusan'),
			'KodeKelas' => $this->input->post('KodeKelas'),
			);

		$this->db->where('KodeMapel', $id);
		$this->db->update('mapel', $data);
	}

	public function getMapelById($id)
	{
		$this->db->join('jurusan', 'mapel.id_jurusan = jurusan.id_jurusan', 'LEFT');
		$this->db->join('kelas', 'mapel.KodeKelas = kelas.KodeKelas', 'LEFT');
		$this->db->where('mapel.KodeMapel', $id);
		return $this->db->get('mapel')->result();
	}

	public function hapusMapel($id)
	{
		$this->db->where('KodeMapel', $id);
		$this->db->delete('mapel');

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

    public function editKelas($id)
	{
		$data = array(
			'KodeKelas' => $this->input->post('KodeKelas'), 
            'NamaKelas' => $this->input->post('NamaKelas'),
			'tingkat' => $this->input->post('tingkat'),
			'id_jurusan' => $this->input->post('id_jurusan'),
			);
		
		$this->db->where('KodeKelas', $id);
        $this->db->update('kelas', $data);
	}
    
    public function getKelasById($id)
	{
		$this->db->join('jurusan', 'kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->where('kelas.KodeKelas', $id);
		return $this->db->get('kelas')->result();
	}

	public function hapusKelas($id)
	{
		$this->db->where('KodeKelas', $id);
		$this->db->delete('kelas');
	}
}
?>