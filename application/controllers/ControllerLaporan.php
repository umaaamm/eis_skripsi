<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLaporan extends CI_Controller {

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
		$databeranda['hasil_persediaan']=$this->db->query("select tbl_atk.nama_barang,tbl_persedian.id_atk,tbl_persedian.stok_b,tbl_persedian.id_persediaan
from tbl_atk inner join tbl_persedian on tbl_persedian.id_atk = tbl_atk.id_atk");
		$databeranda['hasil_keluar']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk");
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['hasil_masuk']=$this->db->query("select tbl_barang_masuk.id_barang_m,tbl_atk.nama_barang,tbl_barang_masuk.id_atk,tbl_barang_masuk.id_suplier, tbl_barang_masuk.stok_t,tbl_barang_masuk.tanggal_masuk, tbl_suplier.nama_suplier
from tbl_atk inner join tbl_barang_masuk on tbl_barang_masuk.id_atk = tbl_atk.id_atk INNER JOIN tbl_suplier on tbl_barang_masuk.id_suplier = tbl_suplier.id_suplier");
		$databeranda['content']='laporan/v_laporan';
		$this->load->view('admin/home',$databeranda);
	}

	public function filter(){
		$jenis=$this->input->post("jenis");
		$radio=$this->input->post("optionsRadios");
		$tanggal1 = $this->input->post("tanggal1");
		$tanggal2 = $this->input->post("tanggal2");

		if ($jenis == 'LP') {
			if ($radio == 'periode') {
				// print_r("kwowkow");die;
				$databeranda['hasil_masuk']=$this->db->query("select tbl_barang_masuk.id_barang_m,tbl_atk.nama_barang,tbl_barang_masuk.id_atk,tbl_barang_masuk.id_suplier, tbl_barang_masuk.stok_t,tbl_barang_masuk.tanggal_masuk, tbl_suplier.nama_suplier
from tbl_atk inner join tbl_barang_masuk on tbl_barang_masuk.id_atk = tbl_atk.id_atk INNER JOIN tbl_suplier on tbl_barang_masuk.id_suplier = tbl_suplier.id_suplier WHERE tanggal_masuk BETWEEN '".$tanggal1."' AND '".$tanggal2."' ");
				$databeranda['flag'] = "pembelian";
			}else{
				// print_r("kwowkow");die;
				$databeranda['hasil_masuk']=$this->db->query("select tbl_barang_masuk.id_barang_m,tbl_atk.nama_barang,tbl_barang_masuk.id_atk,tbl_barang_masuk.id_suplier, tbl_barang_masuk.stok_t,tbl_barang_masuk.tanggal_masuk, tbl_suplier.nama_suplier
from tbl_atk inner join tbl_barang_masuk on tbl_barang_masuk.id_atk = tbl_atk.id_atk INNER JOIN tbl_suplier on tbl_barang_masuk.id_suplier = tbl_suplier.id_suplier");
				$databeranda['flag'] = "pembelian";
			}
			
		}elseif ($jenis == 'LPE') {
			if ($radio == 'periode') {
		$databeranda['hasil_persediaan']=$this->db->query("select tbl_atk.nama_barang,tbl_persedian.id_atk,tbl_persedian.stok_b,tbl_persedian.id_persediaan
from tbl_atk inner join tbl_persedian on tbl_persedian.id_atk = tbl_atk.id_atk");
		$databeranda['flag'] = "persediaan";
	}else{
		$databeranda['flag'] = "persediaan";
		$databeranda['hasil_persediaan']=$this->db->query("select tbl_atk.nama_barang,tbl_persedian.id_atk,tbl_persedian.stok_b,tbl_persedian.id_persediaan
from tbl_atk inner join tbl_persedian on tbl_persedian.id_atk = tbl_atk.id_atk");
	}
		}elseif ($jenis == 'LBK') {
			if ($radio == 'periode') {
				$databeranda['flag'] = "keluar";
				$databeranda['hasil_keluar']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk WHERE tanggal_keluar BETWEEN '".$tanggal1."' AND '".$tanggal2."' ");
			}else{
				$databeranda['flag'] = "keluar";
				$databeranda['hasil_keluar']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk");
			}
			
		}
		// print_r($tanggal1);die;
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['content']='laporan/v_laporan';
		// $this->session->set_flashdata("notif","<div class='alert alert-success'>Data Berhasil difilter</div>");
		$this->load->view('admin/home',$databeranda);
	}

	
	

	

}
