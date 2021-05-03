<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Materi_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

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

	public function getMateriKelas($kelas, $mapel, $id)
    {
        return $this->db->query('SELECT
		mt.id_materi,
        mt.KodeMapel,
        mt.KodeGuru,
        mt.judul,
        mk.id_materi_kelas,
        mk.KodeKelas,
        gr.NamaGuru,
        mt.tgl_posting,
        FROM
        materi AS mt
        INNER JOIN materi_kelas AS mk ON mk.id_materi = mt.id_materi
        INNER JOIN guru AS gr ON gr.KodeGuru = mt.KodeGuru
        WHERE
        mt.KodeMapel = "' . $mapel . '" AND
        mt.KodeGuru = "' . $id . '" AND
        mk.KodeKelas = "' . $kelas . '"');
    }

	public function getTambah($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

	public function hapusMateri($id)
    {
        $this->db->where('id_materi', $id);
        $this->db->delete('materi');

        $this->db->where('id_materi_kelas', $id);
        $this->db->delete('materi_kelas');
    }

	
	
}


?>