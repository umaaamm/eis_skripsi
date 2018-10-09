<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
                        
                        <!-- right column -->
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
                       

<script type="text/javascript">
function verifya($id){
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/ya_p/'+$id;
}
function veriftidak($id){
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/tidak_p/'+$id;
}

</script>

