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
                                    <h3 class="box-title">Data Barang Permintaan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
                                            <th>Nama Peminta</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Alasan</th>
                                            <!-- <th>Status</th> -->
                                            <th>Verifikasi</th>

                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($tampil->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key["nama_peminta"];?></td>
                                            <td><?php echo $key["nama_barang"];?></td> 
                                            <td><?php echo $key["jumlah"];?></td> 
                                            <td><?php echo $key["alasan"];?></td> 
                                            <td><button class="btn btn-info btn-sm" onclick="verifya('<?php echo $key["id_barang_baru"]; ?>')">Verifikasi</button>
                                                <button class="btn btn-danger btn-sm" onclick="veriftidak('<?php echo $key["id_barang_baru"]; ?>')">Tidak Verifikasi</button>
                                            
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           </div>
                       <!--  </div>/.col (right)  -->
                       

<script type="text/javascript">
function verifya($id){
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/ya_p/'+$id;
}
function veriftidak($id){
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/tidak_p/'+$id;
}

</script>

