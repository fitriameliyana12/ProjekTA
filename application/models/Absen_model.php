<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Absen_model extends CI_Model
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

    public function absenSiswa($id)
    {
        return $this->db->query('SELECT
        si.NamaSiswa,
        ab.id_absen,
        ab.no_induk,
        ab.keterangan,
        ab.id_absen_siswa,
        si.NISN,
        asn.KodeKelas,
        asn.tanggal,
        asn.jam_mulai,
        asn.jam_selesai
        FROM
        absen_siswa AS ab
        INNER JOIN siswa AS si ON ab.no_induk = si.no_induk
        INNER JOIN absen AS asn ON ab.id_absen = asn.id_absen
        WHERE
        ab.id_absen = '.$id);
    }

    public function absenSiswaKelas($id)
    {
        return $this->db->query('SELECT
        ab.id_absen,
        ab.KodeKelas,
        ke.NamaKelas,
        ab.KodeGuru,
        gu.NamaGuru,
        ab.KodeMapel,
        mp.NamaMapel,
        ab.tanggal,
        ab.jam_mulai,
        ab.jam_selesai
        FROM
        absen AS ab
        INNER JOIN kelas AS ke ON ab.KodeKelas = ke.KodeKelas
        INNER JOIN guru AS gu ON ab.KodeGuru = gu.KodeGuru
        INNER JOIN mapel AS mp ON ab.KodeMapel = mp.KodeMapel
        WHERE
        ab.id_absen = '.$id);
    }


    public function absenSiswaPrint($id, $idAbsenSiswa)
    {
        return $this->db->query('SELECT
        si.NamaSiswa,
        ab.id_absen,
        ab.no_induk,
        ab.`keterangan`,
        ab.id_absen_siswa,
        si.NISN
        FROM
        absen_siswa AS ab
        INNER JOIN siswa AS si ON ab.no_induk = si.no_induk
        WHERE
        ab.id_absen = "' . $id . '" AND
        ab.id_absen_siswa = "' . $idAbsenSiswa . '"');
    }

    public function getAbsenSiswa($kodeKelas, $kodeMapel, $no_induk){
        return $this->db->query('SELECT 
        ab.*, 
        gr.NamaGuru,
        ass.keterangan
        FROM absen AS ab
        INNER JOIN guru AS gr ON ab.KodeGuru = gr.KodeGuru
        INNER JOIN absen_siswa AS ass ON ab.id_absen = ass.id_absen
        WHERE
        ab.KodeKelas = "'.$kodeKelas.'"
        AND
        ab.KodeMapel = "'.$kodeMapel.'"
        AND
        ass.no_induk = "'.$no_induk.'"');
    }
    
    public function absensi($kodeKelas,$kodeMapel,$id)
        {
            return $this->db->query('SELECT
            ab.keterangan,
            asn.tanggal,
            asn.jam_mulai,
            asn.jam_selesai,
            gr.NamaGuru
            FROM
            absen_siswa AS ab
            INNER JOIN absen AS asn ON ab.id_absen = asn.id_absen
            INNER JOIN guru AS gr ON asn.KodeGuru = gr.KodeGuru
            WHERE
            asn.KodeKelas = "'. $kodeKelas . '" AND
            asn.KodeMapel = "' . $kodeMapel . '" AND
            ab.no_induk = "' .$id . '"');
            
        }
    
    public function insert($data,$table)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function getTambah($table,$where)
    {
        return  $this->db->get_where($table,$where);
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
