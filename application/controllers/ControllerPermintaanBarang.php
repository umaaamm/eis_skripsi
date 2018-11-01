<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPermintaanBarang extends CI_Controller {

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
		// $databeranda['hasil_g']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk");
		// $databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		// $databeranda['tampil_suplier']=$this->db->query("select * from tbl_suplier");
		$databeranda['tampil']=$this->db->query("select * from tbl_barang_baru");
		$databeranda['content']='permintaan_barang/v_permintaan_barang';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			
			$data['nama_peminta']=$this->input->post("nama");
			$data['nama_barang']=$this->input->post("barang");
			$data['jumlah']=$this->input->post("jumlah");
			$data['alasan']=$this->input->post("alasan");
			$data['s_admin']='0';
			$data['s_pimpinan']='0';
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_barang_baru",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaPermintaanBarangBaru');
		
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_barang_baru'=>$id);
		$this->RsModel->HapusData('tbl_barang_baru',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaPermintaanBarangBaru');
	}

	public function edit(){
			$where['id_barang_baru']=$this->input->post('id');
			$data['nama_peminta']=$this->input->post("nama");
			$data['nama_barang']=$this->input->post("barang");
			$data['jumlah']=$this->input->post("jumlah");
			$data['alasan']=$this->input->post("alasan");
			
			//print_r($where);die;
			$this->RsModel->EditData("tbl_barang_baru",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaPermintaanBarangBaru');

	}
	public function ya(){
			$id=$this->uri->segment(3);
			$this->db->query("update tbl_barang_baru set s_admin='1' where id_barang_baru='".$id."'");
			
			//print_r($where);die;
			// $this->RsModel->EditData("tbl_barang_keluar",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil di Verifikasi</div>");
			header('location:'.base_url().'VerifAdmin');

	}
	public function tidak(){
			$id=$this->uri->segment(3);
			$this->db->query("update tbl_barang_baru set s_admin='3' where id_barang_baru='".$id."'");
			
			//print_r($where);die;
			// $this->RsModel->EditData("tbl_barang_keluar",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-danger'>Data Tidak di Verifikasi</div>");
			header('location:'.base_url().'VerifAdmin');

	}
	public function ya_p(){
			$id=$this->uri->segment(3);
			$this->db->query("update tbl_barang_baru set s_pimpinan='1' where id_barang_baru='".$id."'");
			
			//print_r($where);die;
			// $this->RsModel->EditData("tbl_barang_keluar",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil di Verifikasi</div>");
			header('location:'.base_url().'VerifPimpinan');

	}
	public function tidak_p(){
			$id=$this->uri->segment(3);
			$this->db->query("update tbl_barang_baru set s_pimpinan='3' where id_barang_baru='".$id."'");
			
			//print_r($where);die;
			// $this->RsModel->EditData("tbl_barang_keluar",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-danger'>Data Tidak di Verifikasi</div>");
			header('location:'.base_url().'VerifPimpinan');

	}

	public function notif(){
		$q = $this->db->query("select count(s_admin) as notif from tbl_barang_baru where s_pimpinan='0' and s_admin='0' ")->result_array();
		// print_r($q['0']['notif']);die;
		
		if ($q['0']['notif'] == '0') {
			$data = array(
		   'notification' => ''
			);
		}else {
			$data = array(
		   'notification' => $q['0']['notif']
		);
		}
		
			echo json_encode($data);
		// print_r($data);die;

	}
	public function notif_p(){
		$q = $this->db->query("select count(s_admin) as notif from tbl_barang_baru where s_pimpinan='0' and s_admin='1' ")->result_array();
		// print_r($q['0']['notif']);die;
		
		if ($q['0']['notif'] == '0') {
			$data = array(
		   'notification' => ''
			);
		}else {
			$data = array(
		   'notification' => $q['0']['notif']
		);
		}
		
			echo json_encode($data);
		// print_r($data);die;

	}

}
