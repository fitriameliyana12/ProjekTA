<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class KontrakSiswa_model extends CI_Model
{
    public function __construct()

    {
        parent::__construct();
    }

    public function getKontrakKelas($kodeKelas,$kodeMapel)
    {
        return $this->db->query('SELECT
        tkr.id_kontrak,
        tkr.KodeMapel,
        tkr.KodeGuru,
        tkr.judul,
        tkk.id_kontrak_kelas,
        tkk.KodeKelas,
        gr.NamaGuru,
        tkr.tgl_posting
        FROM
        kontrak AS tkr
        INNER JOIN kontrak_kelas AS tkk ON tkk.id_kontrak = tkr.id_kontrak
        INNER JOIN guru AS gr ON gr.KodeGuru = tkr.KodeGuru
        WHERE
        tkr.KodeMapel = "' .$kodeMapel . '" AND
        tkk.KodeKelas = "' .$kodeKelas . '"');
    }

    public function insert($data,$table)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function getTambah($table,$where)
    {
        return $this->db->get_where($table,$where);
    }
}
