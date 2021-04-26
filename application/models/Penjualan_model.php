<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Penjualan_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getAdmin()
	{
		return $this->db->get('user')->result();
	}

	public function getPenjualan()
	{
		$this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan=penjualan.no_order');
		$this->db->join('user', 'user.id=penjualan.id_user');
		$this->db->join('obat', 'detail_penjualan.kode_obat=obat.kode_obat');		
		return $this->db->get('penjualan')->result();
	}

	public function getPenjualanHariIni()
	{
		$tanggal = date('Y-m-d');
		
		return $this->db->get_where('v_penjualan', array('tgl_penjualan' => $tanggal))->result();
	}

	public function getPenjualanById($id)
	{
		$this->db->where('no_order', $id);
		$this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan=penjualan.no_order');
		$this->db->join('user', 'user.id=penjualan.id_user');
		$this->db->join('obat', 'detail_penjualan.kode_obat=obat.kode_obat');		
		return $this->db->get('penjualan')->row();
	}

	public function getPenjualanPerTanggal()
	{
		return $this->db->query('SELECT p.no_order, p.tgl_penjualan, COALESCE(SUM(dp.total), 0) AS pendapatan FROM penjualan p LEFT OUTER JOIN detail_penjualan dp ON p.no_order = dp.id_penjualan GROUP BY p.tgl_penjualan')->result();
		
	}

	public function getPenjualanDetail($id)
	{
		$this->db->where('id_penjualan', $id);
		$this->db->join('obat', 'detail_penjualan.kode_obat=obat.kode_obat');		
		return $this->db->get('detail_penjualan')->result();
	}

	public function addPenjualan()
	{
		$tanggal = date('Y-m-d');
		$data = array(
			'id_user' => $this->input->post('id_user'), 
			'tgl_penjualan' => $tanggal
			);

		$this->db->insert('penjualan', $data);

		$this->db->order_by('no_order', 'desc');
		$last = $this->db->get('penjualan', 1)->row();

		$this->db->join('supplier', 'obat.id_supplier=supplier.id_supplier');
		$this->db->join('satuan_obat', 'obat.kode_obat=satuan_obat.kode_obat', 'Left Outer');
		$this->db->where('obat.kode_obat', $this->input->post('id_obat'));
		$obat = $this->db->get('obat')->row();

		$jenis = $this->input->post('jenis');
		$stok = $obat->stok_obat;
		if ($jenis == 'Satuan') {
			$harga = $obat->harga_satuan;
			$stok = $obat->stok_obat - (1 * $this->input->post('jumlah'));
		} else if ($jenis == 'Strip') {
			$harga = $obat->harga_strip;
			$stok = $obat->stok_obat - ($obat->jumlah_strip*$this->input->post('jumlah'));
		} else if ($jenis == 'Pack') {
			$harga = $obat->harga_pack;
			$stok = $obat->stok_obat - ($obat->jumlah_pack*$this->input->post('jumlah'));
		} else if ($jenis == 'Dos') {
			$harga = $obat->harga_dus;
			$stok = $obat->stok_obat - ($obat->jumlah_dus*$this->input->post('jumlah'));
		}

		$total = $harga * $this->input->post('jumlah');

		$data2 = array(
			'id_penjualan' => $last->no_order,
			'kode_obat' =>  $this->input->post('id_obat'),
			'jenis' => $this->input->post('jenis'),
			'jml_beli' => $this->input->post('jumlah'),
			'harga' => $harga,
			'total' => $total
			);

		$this->db->insert('detail_penjualan', $data2);		

		

		$data3 = array(
			'stok_obat' => $stok, 
			);
		$this->db->where('kode_obat', $this->input->post('id_obat'));
		$this->db->update('obat', $data3);

		print_r($obat->jumlah_strip);


	}

	public function addCart()
	{
		$this->db->join('supplier', 'obat.id_supplier=supplier.id_supplier');
		$this->db->join('satuan_obat', 'obat.kode_obat=satuan_obat.kode_obat', 'Left Outer');
		$this->db->where('obat.kode_obat', $this->input->post('id_obat'));
		$obat = $this->db->get('obat')->row();

		$jenis = $this->input->post('jenis');
		$kurang = $obat->stok_obat;
		if ($jenis == 'Satuan') {
			$harga = $obat->harga_satuan;
			$kurang = (1 * $this->input->post('jumlah'));
		} else if ($jenis == 'Strip') {
			$harga = $obat->harga_strip;
			$kurang = ($obat->jumlah_strip*$this->input->post('jumlah'));
		} else if ($jenis == 'Pack') {
			$harga = $obat->harga_pack;
			$kurang = ($obat->jumlah_pack*$this->input->post('jumlah'));
		} else if ($jenis == 'Dos') {
			$harga = $obat->harga_dus;
			$kurang = ($obat->jumlah_dus*$this->input->post('jumlah'));
		}

		$total = $harga * $this->input->post('jumlah');

		$data2 = array(
			'kode_obat' =>  $this->input->post('id_obat'),
			'jenis' => $this->input->post('jenis'),
			'jml_beli' => $this->input->post('jumlah'),
			'kurang' => $kurang,
			'harga' => $harga,
			'total' => $total
			);

		return $data2;
	}


	public function getPerbulan($bulan, $tahun)
	{
		return $this->db->query('SELECT p.no_order, p.tgl_penjualan, COALESCE(SUM(dp.total), 0) AS pendapatan FROM penjualan p LEFT OUTER JOIN detail_penjualan dp ON p.no_order = dp.id_penjualan WHERE MONTH(p.tgl_penjualan) = "'.$bulan.'" AND YEAR(p.tgl_penjualan) = "'.$tahun.'" GROUP BY p.tgl_penjualan')->result();
	}

	public function chart(){
		$result = $this->db->query('SELECT p.no_order, p.tgl_penjualan, COALESCE(SUM(dp.total), 0) AS pendapatan, m.month_name FROM penjualan p LEFT OUTER JOIN detail_penjualan dp ON p.no_order = dp.id_penjualan RIGHT JOIN month m ON m.month_num = MONTH(p.tgl_penjualan) AND YEAR(p.tgl_penjualan) = "2020" GROUP BY m.month_name ORDER BY m.month_num');
		return $result;	
	}
}

// SELECT month.month_name as month, p.no_order, p.tgl_penjualan, d.total FROM month LEFT JOIN
		// 	penjualan p ON month.month_num = MONTH(p.tgl_penjualan) AND YEAR(p.tgl_penjualan)= "2019" 
		// 	INNER JOIN detail_penjualan d ON p.no_order = d.id_penjualan WHERE YEAR(p.tgl_penjualan) = "2019" GROUP BY month.month_name ORDER BY month.month_num
// $this->db->select('tgl_penjualan, total_bayar');
		// $result = $this->db->get('v_penjualan');
		// return $result;
?>
