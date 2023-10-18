<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class PertemuanKelas_model extends CI_Model
{
	public function __construct()

	{
		parent::__construct();
	}

	public function getPertemuanKelas()
	{
		$this->db->Select('*');
		$this->db->from('minggu_pertemuan_kelas');
        $this->db->join('minggu_pertemuan', 'minggu_pertemuan_kelas.KodePertemuan=minggu_pertemuan.KodePertemuan');
		$this->db->join('mapel', 'minggu_pertemuan_kelas.KodeMapel=mapel.KodeMapel');
		$this->db->join('kelas', 'minggu_pertemuan_kelas.KodeKelas = kelas.KodeKelas');
        $this->db->join('guru', 'minggu_pertemuan_kelas.KodeGuru = guru.KodeGuru', 'LEFT');
		$query = $this->db->get();
		return $query;
		// return $this->db->get('mapel_kelas')->result();
	}

	public function getIndex()
	{
		return $this->db->query("SELECT
		mk.id,
        mk.KodePertemuan,
        mp.NamaPertemuan,
		mp.tgl_pertemuan,
		mk.KodeMapel,
		mk.KodeKelas,
		mk.KodeGuru,
		gu.id_user FROM 
		minggu_pertemuan_kelas AS mk
		INNER JOIN minggu_pertemuan AS mp ON mp.KodePertemuan = mk.KodePertemuan
		INNER JOIN guru AS gu ON gu.KodeGuru = mk.KodeGuru
		");
	}


	public function getPertemuan()
        {
            return $this->db->query("SELECT
            mk.id,
            mk.KodePertemuan,
            mp.NamaPertemuan,
			mp.tgl_pertemuan,
            mk.KodeKelas,
            mk.KodeMapel
            FROM
            minggu_pertemuan_kelas AS mk
            JOIN minggu_pertemuan AS mp ON mp.KodePertemuan = mk.KodePertemuan");
        }

	public function insertPertemuanKelas()
	{
		$data = array(
			'id' =>$this->input->post('id_mapel_kelas'),
            'KodePertemuan' =>$this->input->post('KodePertemuan'),
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'KodeKelas' => $this->input->post('KodeKelas'),
            'KodeGuru' => $this->input->post('KodeGuru'),
			);

		$this->db->insert('minggu_pertemuan_kelas', $data);

	}

	public function editPertemuanKelas($id)
	{
		$data = array(
            'id' =>$this->input->post('id'),
            'KodePertemuan' => $this->input->post('KodePertemuan'),
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'KodeKelas' => $this->input->post('KodeKelas'),
            'KodeGuru' => $this->input->post('KodeGuru'),
			);

		$this->db->where('id', $id);
		$this->db->update('minggu_pertemuan_kelas', $data);
	}


	public function getPertemuanKelasById($id)
	{
		$this->db->join('mapel', 'minggu_pertemuan_kelas.KodeMapel=mapel.KodeMapel', 'LEFT');
		$this->db->join('kelas', 'minggu_pertemuan_kelas.KodeKelas = kelas.KodeKelas', 'LEFT');
        $this->db->join('guru', 'minggu_pertemuan_kelas.KodeGuru = guru.KodeGuru', 'LEFT');
		$this->db->where('minggu_pertemuan_kelas.id', $id);
		return $this->db->get('minggu_pertemuan_kelas')->result();
	}

	public function hapusPertemuanKelas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('minggu_pertemuan_kelas');
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

    public function editMapel($id)
	{
		$data = array(
			'KodeMapel' => $this->input->post('KodeMapel'), 
			'NamaMapel' => $this->input->post('NamaMapel'),
			// 'id_jurusan' => $this->input->post('id_jurusan'),
			// 'KodeKelas' => $this->input->post('KodeKelas'),
			);

		$this->db->where('KodeMapel', $id);
		$this->db->update('mapel', $data);
	}

	public function getMapelById($id)
	{
		// $this->db->join('jurusan', 'mapel.id_jurusan = jurusan.id_jurusan', 'LEFT');
		// $this->db->join('kelas', 'mapel.KodeKelas = kelas.KodeKelas', 'LEFT');
		$this->db->where('mapel.KodeMapel', $id);
		return $this->db->get('mapel')->result();
	}

	public function hapusMapel($id)
	{
		$this->db->where('KodeMapel', $id);
		$this->db->delete('mapel');

	}

    public function editKelas($id)
	{
		$data = array(
			'KodeKelas' => $this->input->post('KodeKelas'), 
            'NamaKelas' => $this->input->post('NamaKelas'),
			);
		
		$this->db->where('KodeKelas', $id);
        $this->db->update('kelas', $data);
	}
    
    public function getKelasById($id)
	{
		$this->db->where('kelas.KodeKelas', $id);
		return $this->db->get('kelas')->result();
	}

	public function hapusKelas($id)
	{
		$this->db->where('KodeKelas', $id);
		$this->db->delete('kelas');
	}

    public function getGuruById($id)
	{
		$this->db->join('user', 'guru.id_user = user.id_user', 'LEFT');
		$this->db->where('guru.KodeGuru', $id);
		return $this->db->get('guru')->result();
	}

	

	public function editGuru($id)
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			);
		$this->db->where('KodeGuru', $id);
		$this->db->update('guru', $data);
	}

	public function hapusGuru($id)
	{
		$this->db->where('KodeGuru', $id);
		$this->db->delete('guru');

	}

	public function getWhere($table,$where)
    {
        return $this->db->get_where($table,$where);
    }
}
?>