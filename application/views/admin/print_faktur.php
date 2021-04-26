<!DOCTYPE html>
<html>
<head>
	<title>Faktur</title>
	<link href="<?php echo base_url('bs/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>
<div align="center">
<h3>FAKTUR KOMERSIL</h3>
<h4>APOTEK ARJASA 2</h4><br>
Jl. Kartanegara No. 50<br>
Karangploso - Malang<br>
65152
</div>
<br>
<br>
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<br>
No Nota : <?php echo $dataPenjualan->no_order; ?>  
<br>
Tanggal : <?php echo $dataPenjualan->tgl_penjualan; ?>
<br>
Kasir : <?php echo $dataPenjualan->nama ?>
<br>
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<br>
<br>
<table border="0.5px;" width="100%">
	<tr>
		<th>No</th>
		<th width="300px">Produk</th>
		<th width="200px">Harga</th>
		<th width="200px">Jumlah Beli</th>
		<th width="150px">Total</th>
	</tr>
		<?php $no=1; $total = 0; foreach ($dataDetail as $key) { ?>
			<?php $total += $key->total - ($key->total * ($dataPenjualan->diskon/100)); ?>
		<tr height="50px;">
			<td><?php echo $no ?></td>
			<td><?php echo $key->nama_obat ?></td>
			<td align="right">Rp. <?php echo $key->harga ?></td>
			<td align="right"><?php echo $key->jml_beli." ".$key->jenis ?></td>
			<td align="right">Rp. <?php echo $key->total ?></td>

		</tr>
		<?php } ?>
		<tr>
			<td colspan="4" align="center"><b>TOTAL</b></td>
			<td align="right">Rp. <?php echo $total ?></td>
		</tr>
</table>
<br>
</body>
</html>