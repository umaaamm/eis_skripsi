<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPersediaan extends CI_Controller {

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
		$databeranda['hasil_g']=$this->db->query("select tbl_atk.nama_barang,tbl_persedian.id_atk,tbl_persedian.stok_b,tbl_persedian.id_persediaan
from tbl_atk inner join tbl_persedian on tbl_persedian.id_atk = tbl_atk.id_atk");
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['tampil']=$this->db->query("select * from tbl_persedian");
		$databeranda['content']='persediaan/v_persediaan';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$data['id_atk']=$this->input->post("id_atk");
			$data['stok_b']=$this->input->post("stok");
			$this->RsModel->TambahData("tbl_persedian",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaPersediaan');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_persediaan'=>$id);
		$this->RsModel->HapusData('tbl_persedian',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaPersediaan');
	}

	public function edit(){
			$where['id_persediaan']=$this->input->post('id');
			$data['id_atk']=$this->input->post("id_atk");
			$data['stok_b']=$this->input->post("stok");
			
			//print_r($where);die;
			$this->RsModel->EditData("tbl_persedian",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaPersediaan');

	}

}
