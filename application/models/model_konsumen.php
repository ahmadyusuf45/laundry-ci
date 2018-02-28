<?php 
	class model_konsumen extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function qw($table,$prop){
			return $this->db->query("SELECT * FROM $table $prop");
		}
		function tmp_konsumen(){
			return $this->db->get('konsumen');
		}
		function id_konsumen(){
			$qr = $this->db->query("SELECT max(id_konsumen) as maxKode FROM konsumen");
			$hs = $qr->row_array();
			$kb = $hs['maxKode'];
			$nu = (int) substr($kb,3,3);
			$nu++;
			$char = "KNS";
			$newid = $char . sprintf("%03s",$nu);
			return $newid;
		}
		function simpan_konsumen($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_konsumen($table,$where,$value){
			$this->db->where('id_konsumen',$where);
			return $this->db->update($table,$value);
		}
		function hapus_konsumen($table,$where){
			$this->db->where('id_konsumen',$where);
			return $this->db->delete($table);
		}
	}
 ?>