<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerUtama extends CI_Controller {

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


	function __construct(){
	parent::__construct();
	
			if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$databeranda['jumlah_masuk']=$this->db->query("select count(*) as total_masuk from tbl_barang_masuk");
		$databeranda['jumlah_keluar']=$this->db->query("select count(*) as total from tbl_barang_keluar");
		$databeranda['jumlah_sum']=$this->db->query("select sum(jumlah) as total_sum from tbl_barang_keluar");
		$databeranda['jumlah_sum_masuk']=$this->db->query("select sum(stok_t) as total_sum_m from tbl_barang_masuk");
		$databeranda['jumlah_sum_tersedia']=$this->db->query("select sum(stok_b) as total_sum_t from tbl_persedian");
		$databeranda['content']='admin/v_beranda';
		$this->load->view('admin/home',$databeranda);
	}
}
