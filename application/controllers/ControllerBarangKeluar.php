<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBarangKeluar extends CI_Controller {

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
		$databeranda['hasil_g']=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.kode_permintaan,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk group by tbl_barang_keluar.id_atk");
		$databeranda['hasil_k']=$this->db->query("SELECT DISTINCT(tbl_barang_keluar.id_atk),tbl_atk.nama_barang from tbl_barang_keluar LEFT JOIN tbl_atk on tbl_barang_keluar.id_atk = tbl_atk.id_atk");
		$databeranda['tampil_atk']=$this->db->query("select * from tbl_atk");
		$databeranda['tampil_suplier']=$this->db->query("select * from tbl_suplier");
		$databeranda['tampil']=$this->db->query("select * from tbl_barang_keluar");
		$databeranda['content']='barang_keluar/v_barang_keluar';
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
			$data['kode_permintaan']=$this->input->post("id_k");
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

	public function detail(){
		
		$ab=$this->db->query("select tbl_atk.nama_barang,tbl_barang_keluar.kode_permintaan,tbl_barang_keluar.id_atk,tbl_barang_keluar.nama_peminta,tbl_barang_keluar.bagian,tbl_barang_keluar.jumlah,tbl_barang_keluar.tanggal_keluar,tbl_barang_keluar.id_barang_keluar from tbl_atk inner join tbl_barang_keluar on tbl_barang_keluar.id_atk = tbl_atk.id_atk where tbl_barang_keluar.id_atk ='".$_GET['id_atk']."'");
		 // print_r($ab);
		echo '<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Detail Data Barang Keluar/Permintaan</h3>
                                </div>
                                <div class="box-body">
                                    <table id="l1" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
                                             <th>Kode Permintaan</th>
                                            <th>Nama Barang</th>
                                             <th>Nama</th>
                                              <th>Bagian</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Keluar</th>
                                           

                                            </tr>
                                        </thead>';
                                        
                                            
                                                $a=1;
                                               foreach ($ab->result_array() as $key) { 
                                           
                                     echo" <tr>
                                            <td>".$a."</td>
                                            <td>".$key['kode_permintaan']."</td>
                                            <td>".$key["nama_barang"]."</td>
                                            <td>".$key["nama_peminta"]."</td> 
                                            <td>".$key["bagian"]."</td>
                                            <td>".$key["jumlah"]."</td> 
                                            <td>".$key["tanggal_keluar"]."</td> 
                                            </tr>";
                                        $a++;
                                          }

                                   echo '</table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            ';
            echo "<script type='text/javascript'>
            	$(document).ready(function() {
                    $('#l1').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    } );
                } );
                </script>";
	}

}
