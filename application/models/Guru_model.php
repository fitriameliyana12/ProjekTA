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
	}

	public function getProfileGuru($id)
    {
        $this->db->where('KodeGuru', $id);
        return $this->db->get('guru');
    }

	public function getGuruByUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('guru')->result();
    }
	
	public function updateImage($data,$id)
    {
        $this->db->where('KodeGuru', $id);
        $this->db->update('guru', $data);
    }

	public function getUjian($id)
    {
		return $this->db->query('SELECT
		uj.id_ujian,
		uj.judul,
		uj.tgl_buat,
		uj.tgl_mulai,
		uj.tgl_selesai,
		uj.waktu,
		mp.NamaMapel,
		kl.NamaKelas
		FROM ujian AS uj
		INNER JOIN mapel_kelas AS mk ON uj.id_mapel_kelas = mk.id_mapel_kelas
		INNER JOIN mapel AS mp ON mk.KodeMapel = mp.KodeMapel
		INNER JOIN kelas AS kl ON mk.KodeKelas = kl.KodeKelas
		WHERE uj.KodeGuru = "'.$id.'"');
    }

	public function getKelasPengajar($id)
    {
		return $this->db->query('SELECT 
			mk.id_mapel_kelas,
			mp.NamaMapel,
			kl.NamaKelas
			FROM mapel_kelas AS mk
			INNER JOIN mapel AS mp ON mk.KodeMapel = mp.KodeMapel
			INNER JOIN kelas AS kl ON mk.KodeKelas = kl.KodeKelas
			WHERE mk.KodeGuru = "'.$id.'"
		');
    }

    public function getUjianDetail($id)
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
			WHERE uj.id_ujian = "'.$id.'"
		');
    }

	public function getSoalUjian($id)
    {
        return $this->db->query('SELECT * FROM ujian_soal JOIN soal USING(id_soal) WHERE ujian_soal.id_ujian= '.$id);
    }

	public function update($data,$where,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	public function nilaiEssay($data, $where)
    {
        $this->db->where('id_jawaban', $where);
        $this->db->update('jawaban', $data);
    }


	public function delete($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

	public function hapusSoalUjian($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('ujian_soal');

        $this->db->where('id_soal', $id);
        $this->db->delete('soal');
    }

	public function insert($data,$table)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

	public function view($table)
    {
        return  $this->db->get($table);
    }

	public function getView($table,$where)
    {
        return  $this->db->get_where($table,$where);
    }

	public function insertGuru()
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			'status_m' => $this->input->post('status_m'),
			);

		$this->db->insert('guru', $data);

	}

	public function getGuruById($id)
	{
		$this->db->join('user', 'guru.id_user = user.id_user', 'LEFT');
		$this->db->where('guru.KodeGuru', $id);
		return $this->db->get('guru')->result();
	}

	public function getGuruId($id)
	{
		$this->db->where('id_user', $id);
        return $this->db->get('guru')->row();
	}

	public function editGuru($id)
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			'status_m' => $this->input->post('status_m'),
			);
		$this->db->where('KodeGuru', $id);
		$this->db->update('guru', $data);
	}

	public function hapusGuru($id)
	{
		$this->db->where('KodeGuru', $id);
		$this->db->delete('guru');

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