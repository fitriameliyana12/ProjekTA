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

	public function getMateriKelas($kodePertemuan,$kodeKelas, $kodeMapel, $kodeGuru)
    {
        return $this->db->query('SELECT
		mt.id_materi,
        mt.KodePertemuan,
        mt.KodeMapel,
        mt.KodeGuru,
        mt.judul,
        mk.id_materi_kelas,
        mk.KodeKelas,
        gr.NamaGuru,
        mt.tgl_posting
        FROM materi AS mt
        INNER JOIN materi_kelas AS mk ON mk.id_materi = mt.id_materi
        INNER JOIN guru AS gr ON gr.KodeGuru = mt.KodeGuru
        WHERE
        mt.KodePertemuan = "' . $kodePertemuan . '" AND
        mt.KodeMapel = "' . $kodeMapel . '" AND
        mt.KodeGuru = "' . $kodeGuru . '" AND
        mk.KodeKelas = "' . $kodeKelas . '"');
    }

    public function getMateriJoinKelas($id){
        return $this->db->query('SELECT
		mt.id_materi,
        mt.KodePertemuan,
        mt.KodeMapel,
        mt.KodeGuru,
        mt.judul,
        mt.isi,
        mt.file,
        mt.tgl_posting,
        mk.KodeKelas
        FROM
        materi AS mt
        INNER JOIN materi_kelas AS mk ON mk.id_materi = mt.id_materi
        WHERE
        mt.id_materi = "' . $id . '" AND
        mk.id_materi = "' . $id . '"');
    }

	public function getTambah($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

	public function hapusMateri($id)
    {
        $this->db->where('id_materi', $id);
        $this->db->delete('materi_kelas');

        $this->db->where('id_materi', $id);
        $this->db->delete('materi');
    }

	public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }
	
    // public function updateData($table, $data)
    // {
    //     $this->db->update($table, $data);
    // }

    public function updateData($data,$where,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}


?>