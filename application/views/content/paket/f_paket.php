<?php 
	if($status == 'edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_paket'] = "";
		$val['nama_paket'] = "";
		$val['harga'] = "";
	}
 ?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul ?></h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Nama Paket</label>
				<input type="text" id="id_paket" hidden="" value="<?php echo $val['id_paket'] ?>" name="">
				<input type="text" id="nama_paket" class="form-control" value="<?php echo $val['nama_paket'] ?>" name="">
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text" id="harga" class="form-control" value="<?php echo $val['harga'] ?>" name="">
			</div>
			<div class="form-group">
				<button class="btn btn-info btn-sm form-control" onclick="<?php echo $onclick ?>"><?php echo $value ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_paket(){
		$.ajax({
			url:"<?php echo site_url('paket/simpan_paket') ?>",
			type:"POST",
			data:{
				nama_paket:$("#nama_paket").val(),
				harga:$("#harga").val()
			},
			success:function (hasil) {
				document.location="http://localhost/laundry/index.php/paket/page/paket";
			}
		})
	}
	function edit_paket(){
		$.ajax({
			url:"<?php echo site_url('paket/edit_paket') ?>",
			type:"POST",
			data:{
				id_paket:$("#id_paket").val(),
				nama_paket:$("#nama_paket").val(),
				harga:$("#harga").val()	
			},
			success:function (hasil) {
				document.location="http://localhost/laundry/index.php/paket/page/paket";
			}
		})
	}

</script>