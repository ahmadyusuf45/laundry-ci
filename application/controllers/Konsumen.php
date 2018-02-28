<?php 
	class konsumen extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_konsumen');
			if($this->session->userdata('status')!='login'){
				redirect('master');
			}
		}
		function page(){
			$page = $this->uri->segment(3);
			if(empty($page)){
				$page = 'home';
			}
			$data['page']=$page;
			$data['folder']='konsumen/';
			if($page == 'konsumen'){
				$data['tmp_konsumen'] = $this->model_konsumen->tmp_konsumen()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_konsumen'){
				$f_konsumen = $this->uri->segment(4);
				if (empty($f_konsumen)) {
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['onclick'] = 'simpan_konsumen()';	
				}else{
					$data['status'] = 'edit';
					$data['judul'] = 'Edit Data';
					$data['value'] = 'Edit';
					$data['onclick'] = 'edit_konsumen()';
					$data['hsl'] = $this->model_konsumen->qw("konsumen","WHERE id_konsumen = '$f_konsumen'");
				}
				$this->load->view('content/konsumen/f_konsumen',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_konsumen(){
			$kode = $this->model_konsumen->id_konsumen();
			$ar = array(
				'id_konsumen' =>$kode,
				'nama_konsumen'=>$this->input->post('nama_konsumen'),
				'alamat'=>$this->input->post('alamat'),
				'nomor_hp'=>$this->input->post('nomor_hp')
			);
			$this->model_konsumen->simpan_konsumen('konsumen',$ar);
		}
		function edit_konsumen(){
			$id = $this->input->post('id_konsumen');
			$ar = array(
				'nama_konsumen'=>$this->input->post('nama_konsumen'),
				'alamat'=>$this->input->post('alamat'),
				'nomor_hp'=>$this->input->post('nomor_hp')	
			);
			$this->model_konsumen->edit_konsumen('konsumen',$id,$ar);
		}
		 function hapus_konsumen(){
			$this->model_konsumen->hapus_konsumen('konsumen',$_GET['id_konsumen']);
		}
	}
 ?>