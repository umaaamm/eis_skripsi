<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
// print_r($tampil_div['0']['divisi']);die;
$tahun = date('Y');
$mont = date('m');
$rand=rand(2,100000);
if ($tampil_div['0']['divisi']=='operasional') {
     $kode_p ="OP".$rand."/".$mont."/".$tahun;
}elseif ($tampil_div['0']['divisi']=='penjaminan') {
     $kode_p="PJ".$rand."/".$mont."/".$tahun;
}elseif ($tampil_div['0']['divisi']=='klaim') {
      $kode_p="KL".$rand."/".$mont."/".$tahun;
}

?>
</div>
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Data Barang Keluar/Permintaan</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanBarangKeluar" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Kode Permintaan</label>
                                            <input type="text" value="<?php echo $kode_p ?>" class="form-control" name="id_k" placeholder="" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Peminta</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Peminta Barang" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select class="form-control" name="id_atk">
                                                <option value="-">-- Nama Barang --</option>
                                              <?php foreach($tampil_atk->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_atk'];?>"><?php echo $keyy['nama_barang'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div> -->

                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            
                                                <?php
                                                    
                                                    $jsArray = "var prdName = new Array();\n";
                                                    echo '
                                                          <select name="id_atk" class="form-control" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                                                   ';
                                                     foreach ($cek_stok->result_array() as $key => $row) {
                                                    
                                                   echo '
                                                  <option value="' . $row['id_atk'] . '">' . $row['nama_barang'] . '</option>';
                                                   $jsArray .= "prdName['" . $row['id_atk'] . "'] = '" . addslashes($row['stok_b']) . "';\n";
                                                     }
                                                     echo '
                                                     </select>';
                                                  ?>
                                                  
                                           <!--  </select> -->
                                        </div> 
                                            
                                        
                                        <div class="form-group">
                                            <label>Bagian/Divisi</label>
                                            <select class="form-control" name="bagian">
                                                <option value="-">-- Bagian/Divisi --</option>
                                               <option <?php if( $tampil_div['0']['divisi']=='operasional'){echo "selected"; } ?> value="operasional">Operasional</option> 
                                                <option <?php if( $tampil_div['0']['divisi']=='penjaminan'){echo "selected"; } ?>  value="penjaminan">Penjaminan</option>
                                                <option <?php if( $tampil_div['0']['divisi']=='klaim'){echo "selected"; } ?> value="klaim">Klaim</option>
                                              <!-- <?php foreach($tampil_suplier->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_suplier'];?>"><?php echo $keyy['nama_suplier'];?></option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Tersedia</label>
                                            <input type="text" id="prd_name" class="form-control" name="jumlah_s" placeholder="Stok Tersedia" readonly>
                                        </div>
                                          <script type="text/javascript">
                                                    <?php echo $jsArray; ?>
                                                    </script>   
                                         <div class="form-group">
                                            <label>Jumlah Yang Diajukan</label>
                                            <input type="text" class="form-control" name="jumlah" placeholder="Nama Peminta Barang" required>
                                        </div>
                                    </div>
   
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                            

 <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data Barang Keluar</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerBarangKeluar/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >
                                            <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select class="form-control" name="id_atk" id="id_atk">
                                                <option value="-">-- Nama Barang --</option>
                                              <?php foreach($tampil_atk->result_array() as $keyy)
                                              {
                                                ?> 
                                                    <option value="<?php echo $keyy['id_atk'];?>"><?php echo $keyy['nama_barang'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama" id="nm">
                                        </div>
                                     

                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <select class="form-control" name="bagian" id="bagian">
                                                <option value="-">-- Nama Bagian --</option>
                                                <option value="operasional">Operasional</option>
                                                <option value="penjaminan">Penjaminan</option>
                                                <option value="klaim">Klaim</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" id="jumlah">
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                </div>
            </div>
        </div>                           
                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-8">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Barang Keluar/Permintaan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
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
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil_g->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key["kode_permintaan"];?></td>
                                            <td><?php echo $key["nama_barang"];?></td>
                                            <td><?php echo $key["nama_peminta"];?></td> 
                                            <td><?php echo $key["bagian"];?></td>
                                            <td><?php echo $key["jumlah"];?></td> 
                                            <td><?php echo $key["tanggal_keluar"];?></td> 
                                            
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                    

<script type="text/javascript">
function hapus($id){
    var conf=window.confirm('Data Akan Dihapus ?');
    if (conf) {
        document.location='<?php echo base_url(); ?>ControllerBarangKeluar/hapus/'+$id;
    }
}

function edit(id,id_atk,nama,bagian,jumlah){ 
    $('#id').val(id);
    $('#id_atk').val(id_atk);
    $('#nm').val(nama);
    $('#bagian').val(bagian);
    $('#jumlah').val(jumlah);
    // $('#st').val(stok);  
}

</script>

