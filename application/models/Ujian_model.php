<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Ujian_model extends CI_Model
{
    public function __construct()

    {
        parent::__construct();
    }

    public function getUjian($id)
    {
        return $this->db->query('SELECT DISTINCT el_ujian.id,judul,tgl_dibuat,tgl_expired,waktu,el_ujian.mapel_kelas_id,el_mapel.nama as 
        mapel,el_kelas.nama as kelas,kelas_id,el_mapel_ajar.pengajar_id FROM el_ujian 
        JOIN el_mapel_kelas on el_mapel_kelas.id=el_ujian.mapel_kelas_id 
        JOIN el_mapel_ajar on el_mapel_ajar.mapel_kelas_id =el_mapel_kelas.id 
        JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id 
        JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id WHERE el_ujian.pengajar_id='.$id);
    }
    public function getUjianDetail($id)
    {
        return $this->db->query('SELECT el_ujian.id,judul,tgl_dibuat,tgl_expired,waktu,mapel_kelas_id,el_mapel.nama as mapel,el_kelas.nama as kelas,kelas_id FROM el_ujian 
            JOIN el_mapel_kelas on el_mapel_kelas.id=el_ujian.mapel_kelas_id 
            JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id 
            JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id
            WHERE el_ujian.id='.$id);
    }
    public function getSoalUjian($id)
    {
        return $this->db->query('SELECT * FROM el_ujian_soal JOIN el_soal USING(id_soal) WHERE el_ujian_soal.aktif=1 and el_ujian_soal.id_ujian='.$id);
    }
    
}
