<?php 
	class model_paket extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function tmp_paket(){
			return $this->db->get('paket');
		}
		function id_paket(){
			$qr = $this->db->query("SELECT max(id_paket) as maxKode FROM paket");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "PKT";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_paket($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_paket($table,$where,$value){
			$this->db->where('id_paket',$where);
			return $this->db->update($table,$value);
		}
		function hapus_paket($table,$where){
			$this->db->where('id_paket',$where);
			return $this->db->delete($table);
		}
	}

 ?>