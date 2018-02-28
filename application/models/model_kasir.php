<?php 
	class model_kasir extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function tmp_kasir(){
			return $this->db->get('login');
		}
		function id_kasir(){
			$qr = $this->db->query("SELECT max(id_login) as maxKode FROM login");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "LG";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_kasir($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_kasir($table,$where,$value){
			$this->db->where('id_login',$where);
			return $this->db->update($table,$value);
		}
		function hapus_kasir($table,$where){
			$this->db->where('id_login',$where);
			return $this->db->delete($table);
		}
	}
 ?>