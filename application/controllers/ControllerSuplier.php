<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSuplier extends CI_Controller {

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
		
		$databeranda['tampil']=$this->db->query("select * from tbl_suplier");
		$databeranda['content']='suplier/v_suplier';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$data['nama_suplier']=$this->input->post("nama");
			$data['alamat']=$this->input->post("alamat");
			$data['no_telp']=$this->input->post("no_telp");
			$this->RsModel->TambahData("tbl_suplier",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaSuplier');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_suplier'=>$id);
		$this->RsModel->HapusData('tbl_suplier',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaSuplier');
	}

	public function edit(){
			$where['id_suplier']=$this->input->post('id');
			$data['nama_suplier']=$this->input->post("nama");
			$data['alamat']=$this->input->post("alamat");
			$data['no_telp']=$this->input->post("no_telp");
			//print_r($where);die;
			$this->RsModel->EditData("tbl_suplier",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaSuplier');

	}

}
