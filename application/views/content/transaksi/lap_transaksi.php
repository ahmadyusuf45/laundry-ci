<h1>Laporan Transaksi</h1>
<div class="form-inline">
	<?php echo form_open('transaksi/page/lap_transaksi') ?>
	<div class="form-group">
		<input type="date" class="form-control input-sm" id="tgl_awal" value="<?php echo $this->input->post('awal'); ?>"  name="awal">
	</div>
	<div class="form-group">
		<input type="date" id="tgl_akhir" class="form-control input-sm" value="<?php echo $this->input->post('akhir'); ?>"  name="akhir">
	</div>
	<input name="cari" type="submit" value="Cari" class="btn btn-danger btn-sm">
	<input type="button" value="Cetak" class="btn btn-primary btn-sm" onclick="cetak_lap()">
	<?php echo form_close() ?>
</div><br>
<div class="table-responsive">
	<table class="table  table-striped table-sm" >
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
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function cetak_lap(){
		tgl_awal = $("#tgl_awal").val();
		tgl_akhir = $("#tgl_akhir").val();
		window.open("<?php echo site_url('transaksi/cetak_lap'); ?>"+"/"+tgl_awal+"/"+tgl_akhir);
	}
</script>