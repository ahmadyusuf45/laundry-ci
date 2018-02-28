<h1>Paket <button class="btn btn-primary btn-sm btn-r" onclick="modal('<?php echo site_url('paket/page/f_paket') ?>','open')">Input Data +</button></h1>
<div class="table-responsive">
	<table class="table  table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Paket</th>
				<th>Harga</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 0;
			foreach ($tmp_paket as $data) {$no++;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td><?php echo $data->nama_paket ?></td>
			 	<td><?php echo $data->harga ?></td>
			 	<td>
			 		<button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('paket/page/f_paket') ?>/<?php echo $data->id_paket ?>','open')">Edit</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_paket('<?php echo $data->id_paket; ?>')">Hapus</button>
			 	</td>
			 </tr>
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function hapus_paket(id){
		$.ajax({
			url:"<?php echo site_url('paket/hapus_paket') ?>",
			type:"GET",
			data:{
				id_paket:id
			},
			success:function(data) {
				document.location='http://localhost/laundry/index.php/paket/page/paket';
			}
		})
	}
</script>