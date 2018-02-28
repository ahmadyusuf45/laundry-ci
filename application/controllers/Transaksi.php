<?php 
	class transaksi extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_transaksi');
		}
		function cetak_lap(){
			$awal = $this->uri->segment(3);
			$akhir = $this->uri->segment(4);
			$data['tmp_trans']=$this->model_transaksi->cari_tanggal("WHERE transaksi.tgl_transaksi BETWEEN '$awal' AND '$akhir'")->result();
			$this->load->view('content/transaksi/cetak_lap',$data);
		}
		function cari_konsumen(){
			$id_konsumen = $this->input->post('id_konsumen');
			$tm = $this->db->query("SELECT * FROM konsumen WHERE id_konsumen = '$id_konsumen'");
			$hsl = $tm->row();
			$ar = array('nama_konsumen'=>$hsl->nama_konsumen,'alamat'=>$hsl->alamat);
			echo json_encode($ar);
		}
		function cari_paket(){
			$id_paket = $this->input->post('id_paket');
			$tm = $this->db->query("SELECT * FROM paket WHERE id_paket = '$id_paket'");
			$hsl = $tm->row();
			$ar = array('harga'=>$hsl->harga);
			echo json_encode($ar);
		}
		function cetak_struk($kode){
			$qy = $this->db->query("SELECT * FROM transaksi INNER JOIN konsumen ON transaksi.id_konsumen = konsumen.id_konsumen INNER JOIN paket ON transaksi.id_paket = paket.id_paket INNER JOIN login ON transaksi.id_login = login.id_login WHERE transaksi.id_transaksi = '$kode'");
			$data['tmp_transaksi'] = $qy;
			$this->load->view('content/transaksi/cetak_struk',$data);
		}
		function page(){
			$page = $this->uri->segment(3);
			$data['page'] = $page;
			$data['folder'] = "transaksi/";
			if($page == 'transaksi'){
				$data['tmp_trans'] = $this->model_transaksi->tmp_trans()->result();
				$this->load->view('index',$data);
			}else if($page == 'f_transaksi'){
				$data['id_transaksi'] = $this->model_transaksi->id_transaksi();
				$data['judul'] = 'Input Transaksi';
				$data['tmp_paket'] = $this->model_transaksi->tmp_paket()->result();
				$this->load->view('content/transaksi/f_transaksi',$data);
			}else if($page == 'lap_transaksi'){
				$awal = $this->input->post('awal');
				$akhir = $this->input->post('akhir');
				if(!empty($awal)){
					$data['tmp_trans'] = $this->model_transaksi->cari_tanggal("WHERE transaksi.tgl_transaksi BETWEEN '$awal' AND '$akhir' ")->result();
				}else{
					$data['tmp_trans'] = $this->model_transaksi->tmp_trans()->result();
				}
				$this->load->view('index',$data);
			}else{
				$this->load->view('index',$data);
			}
		}
		function simpan_trans(){
			$ar = array(
				'id_transaksi'=>$this->input->post('id_transaksi'),
				'tgl_transaksi'=>$this->input->post('tgl_transaksi'),
				'id_login'=>$this->input->post('id_login'),
				'id_konsumen'=>$this->input->post('id_konsumen'),
				'id_paket'=>$this->input->post('id_paket'),
				'jml_kilo'=>$this->input->post('jml_kilo'),
				'total'=>$this->input->post('total')
			);
			$this->model_transaksi->simpan_trans('transaksi',$ar);
		}
		function hapus_trans(){
			$this->model_transaksi->hapus_trans('transaksi',$_GET['id_transaksi']);
		}
	}
 ?>