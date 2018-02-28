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
<div class="header">
	<h1>Dashboard <?php echo $this->session->userdata('level'); ?></h1>
	<h3 onclick="document.location='<?php echo site_url('master/logout') ?>'"> Logout</h3>
</div>
<div class="m-left">
	<a href="">home</a>
	<?php if($this->session->userdata('level')=="admin"){ ?>
	<a href="<?php echo site_url('transaksi/page/lap_transaksi') ?>">Laproan</a>
	<?php }else{ ?>
	<a href="<?php echo site_url('kasir/page/kasir') ?>">kasir</a>
	<a href="<?php echo site_url('konsumen/page/konsumen') ?>">konsumen</a>
	<a href="<?php echo site_url('paket/page/paket') ?>">paket</a>
	<a href="<?php echo site_url('transaksi/page/transaksi') ?>">transaksi</a>
	<?php } ?>	
</div>
<div class="content">
	<?php 
		include "content/".$folder.$page.".php";
	 ?>
</div>
<div class="modal-skin">
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
		$('#table').DataTable();
	});
	function modal(url,method){
		if(method == 'open'){
			$(".modal-skin").load(url);
			$(".modal-skin").fadeIn(100);
		}else{
			$(".modal-skin").fadeOut(100);
		}
	}
	function f_page(url){
		$(".content").load(url);
	}
</script>