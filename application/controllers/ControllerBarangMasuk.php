<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBarangMasuk extends CI_Controller {

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
		$databeranda['hasil_g']=$this->db->query("select tbl_barang_masuk.id_barang_m,tbl_atk.nama_barang,tbl_barang_masuk.id_atk,tbl_barang_masuk.id_suplier, tbl_barang_masuk.stok_t,tbl_barang_masuk.tanggal_masuk, tbl_suplier.nama_suplier
from tbl_atk inner join tbl_barang_masuk on tbl_barang_masuk.id_atk = tbl_atk.id_atk INNER JOIN tbl_suplier on tbl_barang_masuk.id_suplier = tbl_suplier.id_suplier");
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['tampil_suplier']=$this->db->query("select * from tbl_suplier");
		$databeranda['tampil']=$this->db->query("select * from tbl_barang_masuk");
		$databeranda['content']='barang_masuk/v_barang_masuk';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$param=$this->input->post("id_atk");
			// /print_r($param);die;
			$cari_id = $this->db->query("select * from tbl_atk where id_atk='".$param."'");
			$hasil=$cari_id->num_rows();
			// print_r($hasil);die;
			if ($hasil <= 0) {
				$this->session->set_flashdata("notif","<div class='alert alert-success'>Data Tidak Ada di Persediaan, Silahkan Tambahkan di Data Persediaan dengan jumlah awal stok 0.</div>");
				header('location:'.base_url().'KelolaBarangMasuk');
			}else{
			
			$data['id_suplier']=$this->input->post("id_suplier");
			$data['id_atk']=$this->input->post("id_atk");
			$data['stok_t']=$this->input->post("stok");
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_barang_masuk",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaBarangMasuk');
		}
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_barang_m'=>$id);
		$this->RsModel->HapusData('tbl_barang_masuk',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaBarangMasuk');
	}

	public function edit(){
			$where['id_barang_m']=$this->input->post('id');
			$data['id_suplier']=$this->input->post("id_suplier");
			$data['id_atk']=$this->input->post("id_atk");
			$data['stok_t']=$this->input->post("stok");
			
			//print_r($where);die;
			$this->RsModel->EditData("tbl_barang_masuk",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaBarangMasuk');

	}

}
