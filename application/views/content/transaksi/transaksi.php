<h1>Transaksi <button class="btn btn-primary btn-sm btn-r" onclick="f_page('<?php echo site_url('transaksi/page/f_transaksi') ?>')">Input Data +</button></h1>
<div class="table-responsive">
	<table class="table  table-striped table-sm" id="table">
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
				<th>Action</th>
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
			 	<td>
			 		<button class="btn btn-danger btn-sm" onclick="hapus_trans('<?php echo $data->id_transaksi; ?>')">Hapus</button>
			 	</td>
			 </tr>
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function hapus_trans(id){
		$.ajax({
			url:"<?php echo site_url('transaksi/hapus_trans') ?>",
			type:"GET",
			data:{
				id_transaksi:id
			},
			success:function(data) {
				document.location='http://localhost/laundry/index.php/transaksi/page/transaksi';
			}
		})
	}
</script>