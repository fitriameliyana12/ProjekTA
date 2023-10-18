<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class TugasSiswa_model extends CI_Model
{
    public function __construct()

    {
        parent::__construct();
    }

    public function getTugasKelas($kodePertemuan,$kodeKelas,$kodeMapel)
    {
        return $this->db->query('SELECT
        tg.id_tugas,
        tg.KodePertemuan,
        tg.KodeMapel,
        tg.KodeGuru,
        tg.judul,
        tk.id_tugas_kelas,
        tk.KodeKelas,
        gr.NamaGuru,
        tg.tgl_posting,
        tg.deadline
        FROM
        tugas AS tg
        INNER JOIN tugas_kelas AS tk ON tk.id_tugas = tg.id_tugas
        INNER JOIN guru AS gr ON gr.KodeGuru = tg.KodeGuru
        WHERE
        tg.KodePertemuan = "' .$kodePertemuan . '" AND
        tg.KodeMapel = "' .$kodeMapel . '" AND
        tk.KodeKelas = "' .$kodeKelas . '"');
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
