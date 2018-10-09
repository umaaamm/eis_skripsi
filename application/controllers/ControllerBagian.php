<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBagian extends CI_Controller {

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
		
		$databeranda['tampil']=$this->db->query("select * from tbl_bagian");
		$databeranda['content']='bagian/v_bagian';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$data['nama_bagian']=$this->input->post("nama");
			$data['divisi']=$this->input->post("bagian");
			$data['username']=$this->input->post("user");
			$data['password']=$this->input->post("pass");
			$data['level']="Biasa";
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_bagian",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaDivisi');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_bagian'=>$id);
		$this->RsModel->HapusData('tbl_bagian',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaDivisi');
	}

	public function edit(){
			$where['id_bagian']=$this->input->post('id');
			$data['nama_bagian']=$this->input->post("nama");
			$data['divisi']=$this->input->post("bagian");
			$data['username']=$this->input->post("user");
			$data['password']=$this->input->post("pass");
			$data['level']="Biasa";
			//print_r($where);die;
			$this->RsModel->EditData("tbl_bagian",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaDivisi');

	}

}