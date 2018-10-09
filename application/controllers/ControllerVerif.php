<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerVerif extends CI_Controller {

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
		$cek=$this->db->query("select * from tbl_barang_baru where s_admin = '0' ");
		$num=$cek->num_rows();
		// print_r($num);die;
		if ($num >= 0) {
			$databeranda['tampil']=$this->db->query("select * from tbl_barang_baru where s_admin ='0' and s_pimpinan='0' ");
		}else{
			$databeranda['tampil']=$this->db->query("select * from tbl_barang_baru where s_admin='2'");
		}
		$databeranda['hasil_v']=$this->db->query("select * from tbl_barang_baru where s_admin = '1' and s_pimpinan='1'");
		$databeranda['content']='verif/v_verif_admin';
		$this->load->view('admin/home',$databeranda);
	}

	public function pimpinan(){
		$cek=$this->db->query("select * from tbl_barang_baru where s_pimpinan = '0' and s_admin='1' ");
		$num=$cek->num_rows();

		if ($num <= 0) {
			$databeranda['tampil']=$this->db->query("select * from tbl_barang_baru where s_pimpinan='2'");
		}else{
			$databeranda['tampil']=$this->db->query("select * from tbl_barang_baru");
		}
		
		$databeranda['content']='verif/v_verif_pimpinan';
		$this->load->view('admin/home',$databeranda);
	}
	

	

}
