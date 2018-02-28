<?php 
	class Kasir extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_kasir');
		}
		function page(){
			$page = $this->uri->segment(3);
			$data['page'] = $page;
			$data['folder'] = 'kasir/';
			if($page == 'kasir'){
				$data['tmp_kasir'] = $this->model_kasir->tmp_kasir()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_kasir'){
				$f_kasir = $this->uri->segment(4);
				if(empty($f_kasir)){
					$data['status'] = 'simpan';
					$data['judul'] = 'Input Data';
					$data['value'] = 'Simpan';
					$data['open'] = 'kasir/simpan_kasir';
				}else{
					$data['status'] = 'edit';
					$data['judul'] = 'Edit Data';
					$data['value'] = 'Edit';
					$data['open'] = 'kasir/edit_kasir';
					$data['hsl'] = $this->model_kasir->qw("login","WHERE id_login = '$f_kasir'");
				}
				$this->load->view('content/kasir/f_kasir',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_kasir(){
			$id = $this->model_kasir->id_kasir();
			$ar = array(
				'id_login' =>$id,
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
				'level'=>$this->input->post('level')
			);
			$this->model_kasir->simpan_kasir('login',$ar);
			redirect('kasir/page/kasir');
		}
		function edit_kasir(){
			$id = $this->input->post('id_login');
			$ar = array(
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
				'level'=>$this->input->post('level')
			);
			$this->model_kasir->edit_kasir('login',$id,$ar);
			redirect('kasir/page/kasir');
		}
		function hapus_kasir(){
			$this->model_kasir->hapus_kasir('login',$_GET['id_login']);
		}
	}
 ?>