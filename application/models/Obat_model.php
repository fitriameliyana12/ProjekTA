<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Obat_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getObat()
	{
		$this->db->join('supplier', 'obat.id_supplier=supplier.id_supplier');
		$this->db->join('satuan_obat', 'obat.kode_obat=satuan_obat.kode_obat', 'Left Outer');
		return $this->db->get('obat')->result();
	}

	public function getObatbyKode($kode)
	{
		$this->db->join('satuan_obat', 'obat.kode_obat=satuan_obat.kode_obat', 'Left Outer');
		$this->db->where('obat.kode_obat', $kode);
		return $this->db->get('obat')->row();
	}

	public function insertObat()
	{
		$data = array(
			'nama_obat' => $this->input->post('nama_obat'), 
			'id_supplier' => $this->input->post('id_supplier'),
			'stok_obat' => $this->input->post('stok_obat'),
			'gambar_obat' => $this->upload->data('file_name'),
			'kategori_obat' => $this->input->post('kategori_obat'),
			'tgl_expired' => $this->input->post('tgl_expired'),
			);

		$this->db->insert('obat', $data);

	}

	public function getObatMenipis()
	{
		$this->db->where('stok_obat <', 50);
		return $this->db->get('obat');
	}

	public function insertSatuan($id)
	{
		$data = array(
			'kode_obat' => $id, 
			'harga_satuan' => $this->input->post('harga_satuan'),
			'harga_strip' => $this->input->post('harga_strip'),
			'harga_pack' => $this->input->post('harga_pack'),
			'harga_dus' => $this->input->post('harga_dos'),
			'jumlah_strip' => $this->input->post('jumlah_strip'),
			'jumlah_pack' => $this->input->post('jumlah_pack'),
			'jumlah_dus' => $this->input->post('jumlah_dos'),
			);

		$this->db->insert('satuan_obat', $data);
	}

	public function editObat($id)
	{

		if ($_FILES AND $_FILES['gambar']['name']) {
		$data = array(
			'nama_obat' => $this->input->post('nama_obat'), 
			'id_supplier' => $this->input->post('id_supplier'),
			'stok_obat' => $this->input->post('stok_obat'),
			'gambar_obat' => $this->upload->data('file_name'),
			'kategori_obat' => $this->input->post('kategori_obat'),
			'tgl_expired' => $this->input->post('tgl_expired'),
			);
			
		} else {
			$data = array(
			'nama_obat' => $this->input->post('nama_obat'), 
			'id_supplier' => $this->input->post('id_supplier'),
			'stok_obat' => $this->input->post('stok_obat'),
			'kategori_obat' => $this->input->post('kategori_obat'),
			'tgl_expired' => $this->input->post('tgl_expired'),
			);
		}


		$this->db->where('kode_obat', $id);
		$this->db->update('obat', $data);

	}

	public function editSatuan($id)
	{
		$data = array(
			'harga_satuan' => $this->input->post('harga_satuan'),
			'harga_strip' => $this->input->post('harga_strip'),
			'harga_pack' => $this->input->post('harga_pack'),
			'harga_dus' => $this->input->post('harga_dos'),
			);

		$this->db->where('kode_obat', $id);
		$this->db->update('satuan_obat', $data);
	}

	public function getObatById($id)
	{
		$this->db->join('supplier', 'obat.id_supplier=supplier.id_supplier');
		$this->db->join('satuan_obat', 'obat.kode_obat=satuan_obat.kode_obat', 'Left Outer');
		$this->db->where('obat.kode_obat', $id);
		return $this->db->get('obat')->result();
	}

	public function getLastInserted()
	{
		$this->db->order_by('kode_obat', 'DESC');
		return $this->db->get('obat', 1)->result();
	}

	public function hapusObat($id)
	{
		$this->db->where('kode_obat', $id);
		$this->db->delete('satuan_obat');
		$this->db->where('kode_obat', $id);
		$this->db->delete('obat');

	}

	public function getSupplierById($id)
	{
		$this->db->where('id_supplier', $id);
		return $this->db->get('supplier')->result();
	}

	public function editSupplier($id)
	{
		$data = array(
			'nama_supplier' => $this->input->post('nama_supplier'), 
			'alamat_supplier' => $this->input->post('alamat_supplier'),
			'telepon' => $this->input->post('telepon')
			);

		$this->db->where('id_supplier', $id);
		$this->db->update('supplier', $data);
	}

	public function hapusSupplier($id)
	{
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier');	
	}

}


?>