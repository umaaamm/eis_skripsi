<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
 <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
    <form role="form" action="<?php echo base_url()?>LaporanFilter" method="post">
        <div class="col-md-3">
            <div class="form-group">
                <!-- <label>Pilih Jenis Laporan</label> -->
               <div class="form-group">
                                            <label>Pilih Jenis Laporan</label>
                                            <select class="form-control" name="jenis">
                                                <option value="-">-- Pilih Jenis Laporan --</option>
                                                 <option value="LP">Laporan Pembelian</option>
                                                  <option value="LPE">Laporan Perediaan</option>
                                                  <option value="LBK">Laporan Barang Keluar</option>
                                            
                                            </select>
                                        </div> 

                                        <div class="form-group">
                                        
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="seluruh">
                      Seluruh
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="periode">
                      Per periode
                    </label>
                  </div>
                </div>

                <div id="datetimepicker1" class="input-group date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" class="form-control" name="tanggal1" type="text"></input>
                    <span class="input-group-addon add-on">
                        <i data-time-icon="glyphicon glyphicon-calendar" data-date-icon="glyphicon glyphicon-calendar">
                      </i>
                    </span>
                  </div>
                <br>
                <div id="datetimepicker2" class="input-group date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" class="form-control" name="tanggal2" type="text"></input>
                    <span class="input-group-addon add-on">
                        <i data-time-icon="glyphicon glyphicon-calendar" data-date-icon="glyphicon glyphicon-calendar">
                      </i>
                    </span>
                  </div>
                <br>
                <button type="submit" name="filter" class="btn btn-primary">Lihat</button>
                 <!-- <button type="submit" name="cetak" class="btn btn-primary">Cetak</button> -->
                
            </div>

    
</div>

                        <!-- right column -->


                        <?php
                        // print_r($flag);
                        if (isset($flag) && $flag == "pembelian") { ?>
                           <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan Pembelian</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="l1" class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                                <th>No</th>
                                            
                                            <th>Nama Supplier</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Masuk</th>
                                            <th>Tanggal Masuk</th>
                                            
                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil_masuk->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key["nama_suplier"];?></td>
                                            <td><?php echo $key["nama_barang"];?></td> 
                                            <td><?php echo $key["stok_t"];?></td> 
                                            <td><?php echo $key["tanggal_masuk"];?></td> 
                                            
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           </div>
                       <!--  </div>/.col (right)  -->
                       
                   <?php }elseif (isset($flag) && $flag == "persediaan") { ?>
                           <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan Perediaan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="l2" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
                                            
                                            <th>Nama Barang</th>
                                            <th>Jumlah Stok</th>
                                           

                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil_persediaan->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key["nama_barang"];?></td>
                                            <td><?php echo $key["stok_b"];?></td>   
                                            
                                            
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           </div>
                    <?php }elseif (isset($flag) && $flag == "keluar") { ?>
                           <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan Barang Keluar</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="l3" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
                                           
                                            <th>Nama Barang</th>
                                             <th>Nama</th>
                                              <th>Bagian</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Keluar</th>
                                           

                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil_keluar->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
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
                           </div>
                       <?php } ?>

                        
                           
                       

<script type="text/javascript">
function verifya($id){
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/ya_p/'+$id;
}
function veriftidak($id){
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/tidak_p/'+$id;
}

</script>

