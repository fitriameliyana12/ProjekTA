<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Kontrak_model extends CI_Model
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

    public function getKontrakKelas($kelas, $mapel, $id)
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
        tkr.KodeMapel = "' . $mapel . '" AND
        tkr.KodeGuru = "' . $id . '" AND
        tkk.KodeKelas = "' . $kelas . '"');
    }

    public function getKontrakJoinKelas($id){
        return $this->db->query('SELECT
        tkr.id_kontrak,
        tkr.KodeMapel,
        tkr.KodeGuru,
        tkr.judul,
        tkr.isi,
        tkr.file,
        tkr.tgl_posting,
        tkk.KodeKelas
        FROM
        kontrak AS tkr
        INNER JOIN kontrak_kelas AS tkk ON tkk.id_kontrak = tkr.id_kontrak
        WHERE
        tkr.id_kontrak = "' . $id . '" AND
        tkk.id_kontrak = "' . $id . '"');
    }

    public function getTambah($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    // public function hasilUploadKontrak($kodeKelas, $id_kontrak)
    // {
    //     return $this->db->query('SELECT
    //     tp.file,
    //     tp.nilai,
    //     tp.id_tugas_pengumpulan,
    //     si.NamaSiswa,
    //     tp.no_induk,
    //     tp.tanggal
    //     FROM tugas_pengumpulan AS tp
    //     INNER JOIN siswa AS si ON si.no_induk = tp.no_induk
    //     WHERE
    //     tp.KodeKelas = "' . $kodeKelas . '" AND
    //     tp.id_tugas = "' . $id_tugas.'"');
    // }

    // public function penilaian($data, $where)
    // {
    //     $this->db->where('id_tugas_pengumpulan', $where);
    //     $this->db->update('tugas_pengumpulan', $data);
    // }

    public function hapusKontrak($id)
    {
        $this->db->where('id_kontrak', $id);
        $this->db->delete('kontrak_kelas');

        $this->db->where('id_kontrak', $id);
        $this->db->delete('kontrak');
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function updateData($data,$where,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
