<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Pertemuan_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}

	public function getPertemuan()
	{
		return $this->db->get('minggu_pertemuan')->result();
	}

	// public function getPertemuan()
	// {
	// 	return $this->db->get('pertemuan')->result();
	// }

	public function getIndex($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

	public function getPertemuanJoinKelas($id){
        return $this->db->query('SELECT
		pr.id_pertemuan,
        pr.KodeMapel,
        pr.KodeGuru,
        pr.pertemuan,
        pr.isi,
        pr.file,
        pr.tgl_pertemuan,
        pt.KodeKelas
        FROM
        pertemuan AS pr
        INNER JOIN pertemuan_tugas AS pt ON pt.id_pertemuan = pr.id_pertemuan
        WHERE
        pr.id_pertemuan = "' . $id . '" AND
        pr.id_pertemuan = "' . $id . '"');
    }

	public function updateData($data,$where,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


	public function insertPertemuan()
	{
		$data = array(
			'KodePertemuan' => $this->input->post('KodePertemuan'), 
            'NamaPertemuan' => $this->input->post('NamaPertemuan'),
			'tgl_pertemuan' => $this->input->post('tgl_pertemuan'),
		);
		$this->db->insert('minggu_pertemuan', $data);

	}

	public function editPertemuan($id)
	{
		$data = array(
			'KodePertemuan' => $this->input->post('KodePertemuan'), 
            'NamaPertemuan' => $this->input->post('NamaPertemuan'),
			'tgl_pertemuan' => $this->input->post('tgl_pertemuan'),
			);
		
		$this->db->where('KodePertemuan', $id);
        $this->db->update('minggu_pertemuan', $data);
	}

    public function getPertemuanByUser($id)
    {
        $this->db->where('id_pertemuan', $id);
        return $this->db->get('pertemuan')->result();
    }

    // public function getPertemuanById($id)
	// {
	// 	$this->db->where('pertemuan.id_pertemuan', $id);
	// 	return $this->db->get('pertemuan')->row();
	// }

	    public function getPertemuanById($id)
	{
		$this->db->where('minggu_pertemuan.KodePertemuan', $id);
		return $this->db->get('minggu_pertemuan')->row();
	}

	public function hapusPertemuan($id)
	{
		$this->db->where('KodePertemuan', $id);
		$this->db->delete('minggu_pertemuan');
	}

	// public function hapusPertemuan($id)
	// {
	// 	$this->db->where('id_pertemuan', $id);
	// 	$this->db->delete('pertemuan');
	// }

}
?>