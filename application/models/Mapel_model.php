<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Mapel_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}

	public function getMapel()
	{
		// $this->db->Select('*');
		// $this->db->from('mapel');
		// $this->db->join('jurusan', 'mapel.id_jurusan=jurusan.id_jurusan', 'LEFT');
		// $this->db->join('kelas', 'mapel.KodeKelas = kelas.KodeKelas', 'LEFT');
		// $query = $this->db->get();
		// return $query;
		return $this->db->get('mapel')->result();
	}

	public function getIndex($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

	public function insertMapel()
	{
		$data = array(
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'NamaMapel' => $this->input->post('NamaMapel'),
			// 'id_jurusan' => $this->input->post('id_jurusan'),
			// 'KodeKelas' => $this->input->post('KodeKelas'),
			);

		$this->db->insert('mapel', $data);

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
}
?>