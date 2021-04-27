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

    public function getTugasKelas($kelas, $mapel, $id)
    {
        return $this->db->query('SELECT
		tg.id_tugas,
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
        tg.KodeMapel = "' . $mapel . '" AND
        tg.KodeGuru = "' . $id . '" AND
        tk.KodeKelas = "' . $kelas . '"');
    }


    public function hasilUpload($kelas, $id)
    {
        return $this->db->query('SELECT
        tp.file,
        tp.nilai,
        tp.id_tugas_pengumpulan,
        si.nama,
        tp.no_induk
        FROM
        tugas_pengumpulan AS tp
        INNER JOIN siswa AS si ON si.no_induk = tp.no_induk
        WHERE
        tp.KodeKelas = ' . $kelas . ' AND
        tp.id_tugas = ' . $id);
    }

    public function updateNilai($data, $where)
    {
        $this->db->where('id_tugas_pengumpulan', $where);
        $this->db->update('tugas_pengumpulan', $data);
    }

    public function hapusTugas($id)
    {
        $this->db->where('id_tugas', $id);
        $this->db->delete('tugas');

        $this->db->where('id_tugas_kelas', $id);
        $this->db->delete('tugas_kelas');
    }
}
