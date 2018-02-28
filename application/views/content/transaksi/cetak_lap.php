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
	<h1 style="text-align: center;"><span><?php echo $this->uri->segment(3);?></span><span> S/D </span><span><?php echo $this->uri->segment(4);?></span></h1>
	<h1 style="text-align: center;"><i class="fa fa-university" aria-hidden="true"></i> LAUNDRY COOT</h1>
	<div class="table-responsive">
		<table class="table table-bordered">	
			<thead>
			<tr>
				<th>No</th>
				<th>Id Transaksi</th>
				<th>Tanggal Transaksi</th>
				<th>Nama Konsumen</th>
				<th>Nama Paket</th>
				<th>Harga</th>
				<th>Jumlah Per-kilo</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>
				<?php 
				$jml = 0;
				$no = 0;
				foreach ($tmp_trans as $data) {$no++;
			 ?>
				<tr>
					<td><?php echo $no; ?></td>
			 	<td><?php echo $data->id_transaksi; ?></td>
			 	<td><?php echo $data->tgl_transaksi ?></td>
			 	<td><?php echo $data->nama_konsumen ?></td>
			 	<td><?php echo $data->nama_paket ?></td>
			 	<td><?php echo $data->harga ?></td>
			 	<td><?php echo $data->jml_kilo ?></td>
			 	<td><?php echo $data->total ?></td>
				</tr>
				<?php $jml = $jml+$data->total; } ?>
				<tr>
					<td colspan="6"></td>
					<td><strong>Total</strong></td>
					<td><?php echo $jml ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-3 btn-r">
	<p><strong> TTD</strong></p>
</div>
</body>
</html>