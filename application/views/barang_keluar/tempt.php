<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Datadfff Barang Keluar/Permintaan</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanBarangKeluar" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select class="form-control" name="id_atk">
                                                <option value="-">-- Nama Barang --</option>
                                              <?php foreach($tampil_atk->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_atk'];?>"><?php echo $keyy['nama_barang'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                            <div class="form-group">
                                            <label>Nama Peminta</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Peminta Barang" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Bagian/Divisi</label>
                                            <select class="form-control" name="bagian">
                                                <option value="-">-- Bagian/Divisi --</option>
                                                 <option value="operasional">Operasional</option>
                                                <option value="penjaminan">Penjaminan</option>
                                                <option value="klaim">Klaim</option>
                                              <!-- <?php foreach($tampil_suplier->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_suplier'];?>"><?php echo $keyy['nama_suplier'];?></option>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
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