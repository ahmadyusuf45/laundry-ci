<h1>Kasir <button class="btn btn-primary btn-sm btn-r" onclick="modal('<?php echo site_url('kasir/page/f_kasir') ?>','open')">Input Data +</button></h1>
<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Level</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 0;
			foreach ($tmp_kasir as $data) {$no++;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td><?php echo $data->username ?></td>
			 	<td><?php echo $data->level ?></td>
			 	<td>
			 		 <button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('kasir/page/f_kasir') ?>/<?php echo $data->id_login ?>','open')">Edit</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_kasir('<?php echo $data->id_login; ?>')">Hapus</button>
			 	</td>
			 </tr>
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function hapus_kasir(id){
		$.ajax({
			url:"<?php echo site_url('kasir/hapus_kasir') ?>",
			type:"GET",
			data:{
				id_login:id
			},
			success:function(data) {
				document.location='http://localhost/laundry/index.php/kasir/page/kasir';
			}
		})
	}
</script>