<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Supplier_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getSupplier()
	{
		return $this->db->get('supplier')->result();
	}

	public function insertSupplier()
	{
		$data = array(
			'nama_supplier' => $this->input->post('nama_supplier'), 
			'alamat_supplier' => $this->input->post('alamat_supplier'),
			'telepon' => $this->input->post('telepon')
			);

		$this->db->insert('supplier', $data);

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