<?php 
	if($status =='edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_login']="";
		$val['username'] = "";
		$val['password'] = "";
		$val['level'] = "";
	}
 ?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul ?></h4>
		</div>
		<div class="modal-body">
			<?php echo form_open($open); ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" hidden="" id="id_login" value="<?php echo $val['id_login'] ?>" name="id_login">
				<input type="text" class="form-control" id="username" value="<?php echo $val['username'] ?>" name="username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" id="password" value="<?php echo $val['password'] ?>" name="password">
			</div>
			<div class="form-group">
				<label>Level</label>
				<input type="text" class="form-control" value="<?php echo $val['level'] ?>" id="level" name="level">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-info btn-sm form-control" value="<?php echo $value ?>" name="">
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_kasir() {
		$.ajax({
			url:"<?php echo site_url('kasir/simpan_kasir') ?>",
			type:"POST",
			data:{
				username:$("#username").val(),
				password:$("#password").val(),
				level:$("#level").val();
			},
			success:function (hasil) {
				document.location="http://localhost/laundry/index.php/kasir/page/kasir";
			}
		})
	}
	function edit_kasir() {
		$.ajax({
			url:"<?php echo site_url('kasir/edit_kasir') ?>",
			type:"POST",
			data:{
				id_kasir:$("#id_kasir").val(),
				username:$("#username").val(),
				password:$("#password").val(),
				level:$("#level").val();
			},
			success:function (hasil) {
				document.location="http://localhost/laundry/index.php/kasir/page/kasir";
			}	
		})
	}
</script>