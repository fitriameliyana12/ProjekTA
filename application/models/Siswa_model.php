<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Siswa_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getSiswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.KodeKelas=kelas.KodeKelas', 'LEFT');
		$this->db->join('user', 'siswa.id_user = user.id_user', 'LEFT');
		$query = $this->db->get();
		return $query;
		// return $this->db->get('siswa')->result();
	}

	public function getProfileSiswa($id)
    {
        $this->db->where('no_induk', $id);
        return $this->db->get('siswa');
    }
	
	public function updateImage($data,$id)
    {
        $this->db->where('no_induk', $id);
        $this->db->update('siswa', $data);
    }

	public function getSiswaByUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('siswa')->result();
    }

	public function getUjianSiswa($id)
	{
		return $this->db->query('SELECT
			uj.id_ujian,
			uj.judul,
			uj.tgl_buat,
			uj.tgl_mulai,
			uj.tgl_selesai,
			uj.waktu,
			uj.id_mapel_kelas,
			mp.NamaMapel,
			kl.NamaKelas,
			kl.KodeKelas
			FROM ujian as uj
			INNER JOIN mapel_kelas AS mk ON uj.id_mapel_kelas = mk.id_mapel_kelas
			INNER JOIN mapel AS mp ON mk.KodeMapel = mp.KodeMapel
			INNER JOIN kelas AS kl ON mk.KodeKelas = kl.KodeKelas
			WHERE kl.KodeKelas = "'.$id.'"
		');
	}

	public function getmasukUjianSiswa($id)
	{
	return $this->db->query('SELECT DISTINCT ujian.id_ujian,judul,tgl_buat,tgl_mulai,tgl_selesai,waktu,ujian.id_mapel_kelas,mapel.NamaMapel,
		kelas.NamaKelas,kelas_siswa.KodeKelas,kelas_siswa.no_induk
		FROM ujian 
		JOIN mapel_kelas on mapel_kelas.id_mapel_kelas = ujian.id_mapel_kelas 
		JOIN mapel on mapel.KodeMapel = mapel_kelas.KodeMapel
		JOIN kelas on kelas.KodeKelas = mapel_kelas.KodeKelas
		JOIN kelas_siswa on kelas_siswa.KodeKelas = kelas.KodeKelas
		WHERE ujian.id_ujian='.$id);
	}

	public function insert($data,$table)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id(); 
    }

	public function getSoalUjian($id)
    {
        return $this->db->query('SELECT * FROM ujian_soal JOIN soal USING(id_soal) 
		WHERE ujian_soal.id_ujian='.$id);
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
			'status_m' => $this->input->post('status_m'),
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
			'status_m' => $this->input->post('status_m'),
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

	public function getSiswaId($id)
	{
		$this->db->where('id_user', $id);
        return $this->db->get('siswa')->row();

	}

	public function getGuruId($id)
	{
		$this->db->where('id_user', $id);
        return $this->db->get('guru')->row();

	}

	public function getDeadline(){

		$this->db->where('id_tugas',$id);
		return $this->db->get('tugas')->row();
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
			'status' => $this->input->post('status'),
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

	public function getTambah($table,$where)
    {
        return $this->db->get_where($table,$where);
    }
	
}


?>