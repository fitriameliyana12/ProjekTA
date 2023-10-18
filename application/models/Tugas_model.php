<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Tugas_model extends CI_Model
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

    public function getlistpertemuan()
    {
        return $this->db->query("SELECT
		mk.id,
        mk.KodePertemuan,
        mp.NamaPertemuan,
        mk.KodeKelas,
        mk.KodeGuru,
		mk.KodeMapel,
		gu.id_user FROM 
		minggu_pertemuan_kelas AS mk
		INNER JOIN minggu_pertemuan AS mp ON mp.KodePertemuan = mk.KodePertemuan
		INNER JOIN guru AS gu ON gu.KodeGuru = mk.KodeGuru
		");
    }


    public function getTugasPertemuan($kelas, $mapel, $id)
    {
        return $this->db->query('SELECT
		pr.id_pertemuan,
        pr.KodeMapel,
        pr.KodeGuru,
        pr.pertemuan,
        pr.file,
        pr.tgl_pertemuan,
        pt.id_pertemuan_tugas,
        pt.KodeKelas,
        gr.NamaGuru
        FROM
        pertemuan AS pr
        INNER JOIN pertemuan_tugas AS pt ON pt.id_pertemuan = pr.id_pertemuan
        INNER JOIN guru AS gr ON gr.KodeGuru = pr.KodeGuru
        WHERE
        pr.KodeMapel = "' . $mapel . '" AND
        pr.KodeGuru = "' . $id . '" AND
        pt.KodeKelas = "' . $kelas . '"');
    }

    public function getTugasKelas($pertemuan, $kelas, $mapel, $id)
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
        tg.KodePertemuan = "' . $pertemuan . '" AND
        tg.KodeMapel = "' . $mapel . '" AND
        tg.KodeGuru = "' . $id . '" AND
        tk.KodeKelas = "' . $kelas . '"');
    }

    public function getTugasJoinKelas($id){
        return $this->db->query('SELECT
		tg.id_tugas,
        tg.KodeMapel,
        tg.KodeGuru,
        tg.KodePertemuan,
        tg.judul,
        tg.isi,
        tg.file,
        tg.tgl_posting,
        tg.deadline,
        tk.KodeKelas
        FROM
        tugas AS tg
        INNER JOIN tugas_kelas AS tk ON tk.id_tugas = tg.id_tugas
        WHERE
        tg.id_tugas = "' . $id . '" AND
        tk.id_tugas = "' . $id . '"');
    }

    public function getTambah($table,$where)
    {
        return $this->db->get_where($table,$where);
    }


    public function hasilUploadTugas($KodePertemuan,$KodeKelas, $id_tugas)
    {
        return $this->db->query('SELECT
        tp.file,
        tp.nilai,
        tp.id_tugas_pengumpulan,
        si.NamaSiswa,
        tp.no_induk,
        tp.tanggal
        FROM tugas_pengumpulan AS tp
        INNER JOIN siswa AS si ON si.no_induk = tp.no_induk
        WHERE
        tp.KodePertemuan = "' . $KodeKelas . '" AND
        tp.KodeKelas = "' . $id_tugas . '" AND
        tp.id_tugas = "' . $KodePertemuan.'"');
        
    }

    public function hasilUploadTugasCetak($id_tugas)
    {
        return $this->db->query('SELECT
        tp.nilai,
        tp.id_tugas_pengumpulan,
        si.NamaSiswa,
        tp.id_tugas,
        tp.no_induk,
        tp.tanggal
        FROM tugas_pengumpulan AS tp
        INNER JOIN siswa AS si ON si.no_induk = tp.no_induk
        WHERE
        tp.id_tugas = '.$id_tugas);
        
    }

    public function penilaian($data, $where)
    {
        $this->db->where('id_tugas_pengumpulan', $where);
        $this->db->update('tugas_pengumpulan', $data);
    }

    public function hapusTugas($id)
    {
        $this->db->where('id_tugas', $id);
        $this->db->delete('tugas_kelas');

        $this->db->where('id_tugas', $id);
        $this->db->delete('tugas');
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
