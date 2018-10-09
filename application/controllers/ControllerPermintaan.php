<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPermintaan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$databeranda['hasil_g']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk");
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['tampil_suplier']=$this->db->query("select * from tbl_suplier");
		$databeranda['tampil']=$this->db->query("select * from tbl_barang_keluar");
		$databeranda['content']='permintaan/v_permintaan';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$id=$this->input->post("id_atk");
			$trg = $this->input->post("jumlah");
			$query=$this->db->query("select * from tbl_persedian where id_atk = '".$id."'");
			$hasil = $query->result_array();
			//print_r($hasil[0]['stok_b']);die;
			if ($hasil[0]['stok_b'] <= $trg ) {
				$this->session->set_flashdata("notif","<div class='alert alert-success'>Stok Hanya ".$hasil[0]['stok_b']." Tidak Mencukupi.</div>");
				header('location:'.base_url().'KelolaBarangKeluar');
			}else{
			
			$data['id_atk']=$this->input->post("id_atk");
			$data['nama_peminta']=$this->input->post("nama");
			$data['bagian']=$this->input->post("bagian");
			$data['jumlah']=$this->input->post("jumlah");
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_barang_keluar",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaBarangKeluar');
		}
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_barang_keluar'=>$id);
		$this->RsModel->HapusData('tbl_barang_keluar',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaBarangKeluar');
	}

	public function edit(){
			$where['id_barang_keluar']=$this->input->post('id');
			$data['id_atk']=$this->input->post("id_atk");
			$data['nama_peminta']=$this->input->post("nama");
			$data['bagian']=$this->input->post("bagian");
			$data['jumlah']=$this->input->post("jumlah");
			
			//print_r($where);die;
			$this->RsModel->EditData("tbl_barang_keluar",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaBarangKeluar');

	}
	public function user(){
		$databeranda['hasil_g']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk");
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['tampil_suplier']=$this->db->query("select * from tbl_suplier");
		$databeranda['tampil']=$this->db->query("select * from tbl_barang_keluar");
		$databeranda['content']='permintaan/v_permintaan_user';
		$this->load->view('admin/home',$databeranda);
	}

}
