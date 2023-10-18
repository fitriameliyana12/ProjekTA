<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Jam_pelajaran_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}

	public function getJam()
	{
		return $this->db->get('jam_pelajaran')->result();
	}

	public function getIndex($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

	public function insertJam()
	{
		$data = array(
			'jam_mulai' => $this->input->post('jam_mulai'), 
            'jam_selesai' => $this->input->post('jam_selesai'),
            'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->insert('jam_pelajaran', $data);

	}

	public function editJam($id)
	{
		$data = array(
			'jam_mulai' => $this->input->post('jam_mulai'), 
            'jam_selesai' => $this->input->post('jam_selesai'),
            'keterangan' => $this->input->post('keterangan'),
			);
		
		$this->db->where('id', $id);
        $this->db->update('jam_pelajaran', $data);
	}
    
    public function getJamById($id)
	{
		$this->db->where('jam_pelajaran.id', $id);
		return $this->db->get('jam_pelajaran')->row();
	}

	public function hapusJam($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('jam_pelajaran');
	}
}
?>