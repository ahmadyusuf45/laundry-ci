<h1><?php echo $judul ?></h1>
<div class="row">
<div class="col-sm-4">
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="tgl_transaksi" name="">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label>Id Transaksi</label>
		<input type="text" class="form-control" value="<?php echo $id_transaksi ?>" id="id_transaksi" name="">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label>Id Kasir</label>
		<input type="text" class="form-control" id="id_login" value="<?php echo $this->session->userdata('id'); ?>" name="">
	</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
	<div class="form-group">
		<label>Id Konsumen</label>
		<input type="text" class="form-control" id="id_konsumen" onchange="cari_konsumen()" name="">
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Nama Konsumen</label>
		<input type="text" class="form-control" id="nama_konsumen" name="">
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Alamat</label>
		<textarea id="alamat" class="form-control"></textarea>
	</div>
</div>
</div>
<div class="row">
<div class="col-md-3">
	<div class="form-group">
		<label>Nama Paket</label>
		<select onchange="cari_paket()" class="form-control" id="id_paket">
			<option>---PILIH PAKET---</option>
			<?php 
				foreach ($tmp_paket as $item_paket) {
			 ?>
			 <option value="<?php echo $item_paket->id_paket ?>"><?php echo $item_paket->nama_paket ?></option>
			 <?php } ?>
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Harga Paket</label>
		<input type="text" id="harga" class="form-control" name="">
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Jumlah Per-Kilo</label>
		<input type="text" id="jml_kilo" class="form-control" onkeyup="total()" name="">
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Total</label>
		<input type="text" id="total" class="form-control" name="">
	</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<button class="btn btn-info btn-sm form-control" onclick="simpan_trans()">Simpan</button>
	</div>
</div>
</div>
<script type="text/javascript">
	function cari_konsumen(){
		$.ajax({
			url:"<?php echo site_url('transaksi/cari_konsumen'); ?>",
			type:"POST",
			dataType:"json",
			data:{
				id_konsumen:$("#id_konsumen").val()
			},
			success:function (hasil) {
				$("#nama_konsumen").val(hasil.nama_konsumen);
				$("#alamat").val(hasil.alamat);
			}
		})
	}
	function cari_paket(){
		$.ajax({
			url:"<?php echo site_url('transaksi/cari_paket'); ?>",
			type:"POST",
			dataType:"json",
			data:{
				id_paket:$("#id_paket").val()
			},
			success:function (hasil) {
				$("#harga").val(hasil.harga);
			}
		})
	}
	function total(){
		jml_kilo = $("#jml_kilo").val();
		harga = $("#harga").val();
		a = jml_kilo*harga;
		$("#total").val(a);
	}
	function cetak_struk(){
		y = $("#id_transaksi").val();
		window.open('<?php echo site_url('transaksi/cetak_struk/') ?>'+y,'_blank','width=400px,height=400px');
	}
	function simpan_trans() {
		$.ajax({
			url:"<?php echo site_url('transaksi/simpan_trans') ?>",
			type:"POST",
			data:{
				id_transaksi:$("#id_transaksi").val(),
				tgl_transaksi:$("#tgl_transaksi").val(),
				id_login:$("#id_login").val(),
				id_konsumen:$("#id_konsumen").val(),
				id_paket:$("#id_paket").val(),
				jml_kilo:$("#jml_kilo").val(),
				total:$("#total").val()
			},
			success:function (hasil) {
				cetak_struk();
				document.location="http://localhost/laundry/index.php/transaksi/page/transaksi";
			}
		})
	}
</script>