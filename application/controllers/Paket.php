<?php 
	class paket extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_paket');
		}
		function page(){
			$page = $this->uri->segment(3);
			$data['page'] = $page;
			$data['folder'] = "paket/";
			if($page == 'paket'){
				$data['tmp_paket'] = $this->model_paket->tmp_paket()->result();
				$this->load->view('index',$data);
			}else if($page =='f_paket'){
				$f_paket =$this->uri->segment(4);
				if(empty($f_paket)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick'] = 'simpan_paket()';
				}else{
					$data['status'] = 'edit';
					$data['judul'] = 'Edit Data';
					$data['value'] = 'Edit';
					$data['onclick'] = 'edit_paket()';
					$data['hsl'] = $this->model_paket->qw("paket","WHERE id_paket = '$f_paket'");
				}
				$this->load->view('content/paket/f_paket',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_paket(){
			$id_paket = $this->model_paket->id_paket();
			$ar = array(
				'id_paket' =>$id_paket,
				'nama_paket' =>$this->input->post('nama_paket'),
				'harga'=>$this->input->post('harga')
			);
			$this->model_paket->simpan_paket('paket',$ar);
		}
		 function edit_paket(){
			$id = $this->input->post('id_paket');
			$ar = array(
				'nama_paket' =>$this->input->post('nama_paket'),
				'harga'=>$this->input->post('harga')
			);
			$this->model_paket->edit_paket('paket',$id,$ar);
		}
		function hapus_paket(){
			$this->model_paket->hapus_paket('paket',$_GET['id_paket']);
		}
	}
 ?>