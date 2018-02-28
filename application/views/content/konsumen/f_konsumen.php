<?php 
	if($status =='edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_konsumen']="";
		$val['nama_konsumen'] = "";
		$val['alamat'] = "";
		$val['nomor_hp'] = "";
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
				<label>Nama Konsumen</label>
				<input type="text" hidden="" id="id_konsumen" value="<?php echo $val['id_konsumen'] ?>" name="">
				<input type="text" class="form-control" id="nama_konsumen" value="<?php echo $val['nama_konsumen'] ?>" name="">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" id="alamat"><?php echo $val['alamat'] ?></textarea>
			</div>
			<div class="form-group">
				<label>Nomo Hp</label>
				<input type="text" class="form-control" value="<?php echo $val['nomor_hp'] ?>" id="nomor_hp" name="">
			</div>
			<div class="form-group">
				<button onclick="<?php echo $onclick ?>" class="btn btn-info btn-sm form-control" ><?php echo $value ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_konsumen() {
		$.ajax({
			url:"<?php echo site_url('konsumen/simpan_konsumen') ?>",
			type:"POST",
			data:{
				nama_konsumen:$("#nama_konsumen").val(),
				alamat:$("#alamat").val(),
				nomor_hp:$("#nomor_hp").val()
			},
			success:function (hasil) {
				document.location="http://localhost/laundry/index.php/konsumen/page/konsumen";
			}
		})
	}
	function edit_konsumen() {
		$.ajax({
			url:"<?php echo site_url('konsumen/edit_konsumen') ?>",
			type:"POST",
			data:{
				id_konsumen:$("#id_konsumen").val(),
				nama_konsumen:$("#nama_konsumen").val(),
				alamat:$("#alamat").val(),
				nomor_hp:$("#nomor_hp").val()	
			},
			success:function (hasil) {
				document.location="http://localhost/laundry/index.php/konsumen/page/konsumen";
			}	
		})
	}
</script>