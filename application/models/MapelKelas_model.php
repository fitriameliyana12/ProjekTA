<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class MapelKelas_model extends CI_Model
{
	public function __construct()

	{
		parent::__construct();
	}

	public function getMapelKelas()
	{
		$this->db->Select('*');
		$this->db->from('mapel_kelas');
		$this->db->join('mapel', 'mapel_kelas.KodeMapel=mapel.KodeMapel');
		$this->db->join('kelas', 'mapel_kelas.KodeKelas = kelas.KodeKelas');
        $this->db->join('guru', 'mapel_kelas.KodeGuru = guru.KodeGuru', 'LEFT');
		$query = $this->db->get();
		return $query;
		// return $this->db->get('mapel_kelas')->result();
	}

	public function getIndex()
	{
		return $this->db->query("SELECT
		mk.id_mapel_kelas,
		mk.KodeMapel,
		mp.NamaMapel,
		mk.KodeKelas,
		mk.KodeGuru,
		gu.id_user FROM 
		mapel_kelas AS mk
		INNER JOIN mapel AS mp ON mp.KodeMapel = mk.KodeMapel
		INNER JOIN guru AS gu ON gu.KodeGuru = mk.KodeGuru
		");
	}

	public function insertMapelKelas()
	{
		$data = array(
			'id_mapel_kelas' =>$this->input->post('id_mapel_kelas'),
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'KodeKelas' => $this->input->post('KodeKelas'),
            'KodeGuru' => $this->input->post('KodeGuru'),
			);

		$this->db->insert('mapel_kelas', $data);

	}

	public function editMapelKelas($id)
	{
		$data = array(
            'id_mapel_kelas' =>$this->input->post('id_mapel_kelas'),
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'KodeKelas' => $this->input->post('KodeKelas'),
            'KodeGuru' => $this->input->post('KodeGuru'),
			);

		$this->db->where('id_mapel_kelas', $id);
		$this->db->update('mapel_kelas', $data);
	}

	public function getMapelKelasById($id)
	{
		$this->db->join('mapel', 'mapel_kelas.KodeMapel=mapel.KodeMapel', 'LEFT');
		$this->db->join('kelas', 'mapel_kelas.KodeKelas = kelas.KodeKelas', 'LEFT');
        $this->db->join('guru', 'mapel_kelas.KodeGuru = guru.KodeGuru', 'LEFT');
		$this->db->where('mapel_kelas.id_mapel_kelas', $id);
		return $this->db->get('mapel_kelas')->result();
	}

	public function hapusMapelKelas($id)
	{
		$this->db->where('id_mapel_kelas', $id);
		$this->db->delete('mapel_kelas');

	}

    public function editMapel($id)
	{
		$data = array(
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'NamaMapel' => $this->input->post('NamaMapel'),
			// 'id_jurusan' => $this->input->post('id_jurusan'),
			// 'KodeKelas' => $this->input->post('KodeKelas'),
			);

		$this->db->where('KodeMapel', $id);
		$this->db->update('mapel', $data);
	}

	public function getMapelById($id)
	{
		// $this->db->join('jurusan', 'mapel.id_jurusan = jurusan.id_jurusan', 'LEFT');
		// $this->db->join('kelas', 'mapel.KodeKelas = kelas.KodeKelas', 'LEFT');
		$this->db->where('mapel.KodeMapel', $id);
		return $this->db->get('mapel')->result();
	}

	public function hapusMapel($id)
	{
		$this->db->where('KodeMapel', $id);
		$this->db->delete('mapel');

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
}
?>