<?php 
	class model_transaksi extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function cari_tanggal($prop){
			return  $this->db->query("SELECT * FROM transaksi INNER JOIN konsumen ON transaksi.id_konsumen = konsumen.id_konsumen INNER JOIN paket ON transaksi.id_paket = paket.id_paket INNER JOIN login ON transaksi.id_login = login.id_login $prop");;
		}
		function tmp_paket(){
			return $this->db->get('paket');
		}
		function tmp_trans(){
			$qw =  $this->db->query("SELECT * FROM transaksi INNER JOIN konsumen ON transaksi.id_konsumen = konsumen.id_konsumen INNER JOIN paket ON transaksi.id_paket = paket.id_paket INNER JOIN login ON transaksi.id_login = login.id_login");
			return $qw;
		}
		function id_transaksi(){
			$qr = $this->db->query("SELECT max(id_transaksi) as maxKode FROM transaksi");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "TRS";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_trans($table,$value){
			return $this->db->insert($table,$value);
		}
		function hapus_trans($table,$where){
			$this->db->where('id_transaksi',$where);
			return $this->db->delete($table);
		}
	}

 ?>