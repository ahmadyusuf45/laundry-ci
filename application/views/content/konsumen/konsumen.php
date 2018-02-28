<h1>Konsumen <button class="btn btn-primary btn-sm btn-r" data-toggle="modal" data-target="#modal_box" onclick="modal('<?php echo site_url('konsumen/page/f_konsumen') ?>','open')">Input Data +</button></h1>
<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Konsumen</th>
				<th>Alamat</th>
				<th>Nomo Hp</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				foreach ($tmp_konsumen as $data) {$no++;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td><?php echo $data->nama_konsumen ?></td>
			 	<td><?php echo $data->alamat ?></td>
			 	<td><?php echo $data->nomor_hp ?></td>
			 	<td>
			 		 <button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('konsumen/page/f_konsumen') ?>/<?php echo $data->id_konsumen ?>','open')">Edit</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_konsumen('<?php echo $data->id_konsumen; ?>')">Hapus</button>
			 	</td>
			 </tr>
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function hapus_konsumen(id){
		$.ajax({
			url:"<?php echo site_url('konsumen/hapus_konsumen') ?>",
			type:"GET",
			data:{
				id_konsumen:id
			},
			success:function(data) {
				document.location='http://localhost/laundry/index.php/konsumen/page/konsumen';
			}
		})
	}
</script>