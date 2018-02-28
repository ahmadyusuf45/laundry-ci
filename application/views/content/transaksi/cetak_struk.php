<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/bootstrap.min.css') ?> ">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/index.css') ?> ">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/DataTables/media/css/dataTables.bootstrap4.min.css') ?> ">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/font-awesome-4.7.0/css/font-awesome.min.css') ?> ">
	<script type="text/javascript" src="<?php echo base_url('dist/js/jquery-3.2.1.min.js') ?> "></script>
	<script type="text/javascript" src="<?php echo base_url('dist/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('dist/DataTables/media/js/jquery.dataTables.min.js') ?> "></script>
	<script type="text/javascript" src="<?php echo base_url(' dist/DataTables/media/js/dataTables.bootstrap4.min.js') ?>"></script>
</head>
<body>
	<h1><center>LAUNDRY COOT</center></h1>
	<?php $item = $tmp_transaksi->row_array(); ?>
		<br>
		<table class="test">
			<tr>
				<td>Tanggal Transaksi</td>
				<td>:</td>
				<td><?php echo $item['tgl_transaksi'] ?></td>
			</tr>
			<tr>
				<td>Id Transaksi</td>
				<td>:</td>
				<td><?php echo $item['id_transaksi'] ?></td>
			</tr>
			<tr>
				<td>Nama Konsumen</td>
				<td>:</td>
				<td><?php echo $item['nama_konsumen'] ?></td>
			</tr>
			<tr>
				<td>Nama Paket</td>
				<td>:</td>
				<td><?php echo $item['nama_paket'] ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td>Rp <?php echo $item['harga'] ?></td>
			</tr>
			<tr>
				<td>Jumlah Per-Kilo</td>
				<td>:</td>
				<td>KG <?php echo $item['jml_kilo'] ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>:</td>
				<td>Rp <?php echo $item['total'] ?></td>
			</tr>
		</table>
		<br>
		<h2><center>TERIMA KASIH LAUNDRY COOT</center></h2>
</body>
</html>
<style type="text/css">
	.test{
		margin: 0px auto;
		padding: 1px;
	}
</style>