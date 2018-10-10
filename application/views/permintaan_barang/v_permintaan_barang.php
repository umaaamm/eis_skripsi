<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Permintaan Barang Baru</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanPermintaanBarangBaru" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Peminta</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Peminta" required>
                                        </div>

                                        <div class="form-group">
                                          <label>Nama Barang</label>
                                            <input type="text" class="form-control" name="barang" placeholder="Nama Barang" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="text" class="form-control" name="jumlah" placeholder="Jumlah yang diminta" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alasan Meminta Barang Baru</label>
                                            <textarea name="alasan" class="form-control" placeholder="Alasan Anda Meminta barang baru" required></textarea>
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
                        <h4 class="modal-title" id="myModalLabel">Edit Data Barang Masuk</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerPermintaanBarang/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >

                                         
                                        <div class="form-group">
                                            <label>Nama Peminta</label>
                                            <input type="text" class="form-control" name="nama" id="nm" placeholder="Nama Peminta" >
                                        </div>

                                        <div class="form-group">
                                          <label>Nama Barang</label>
                                            <input type="text" class="form-control" id="nm_b" name="barang" placeholder="Nama Barang" >
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="text" class="form-control" id="jml" name="jumlah" placeholder="Jumlah yang diminta">
                                        </div>
                                        <div class="form-group">
                                            <label>Alasan Meminta Barang Baru</label>
                                            <textarea name="alasan" class="form-control" id="alasan" placeholder="Alasan Anda Meminta barang baru"></textarea>
                                        </div>
                                    </div>

                                       
                                    <!-- /.box-body -->

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
                                            <th>Status</th>
                                            <th>Action</th>

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
                                            <?php if ($key['s_admin'] == '0' && $key['s_pimpinan'] == '0') { ?>
                                                <td><small class="label bg-yellow">Proses Verifikasi</small></td>
                                                 <td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_barang_baru"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_barang_baru"]; ?>','<?php echo $key["nama_peminta"]; ?>','<?php echo $key["nama_barang"]; ?>','<?php echo $key["jumlah"]; ?>','<?php echo $key["alasan"]; ?>')">Edit</button> </td>
                                          <?php }elseif ($key['s_admin'] == '1' && $key['s_pimpinan'] == '1') { ?>
                                                <td><small class="label bg-green">di Verifikasi oleh Admin dan Pimpinan</small></td>
                                                <td>-</td>
                                          <?php  }else{ ?>
                                                    <td><small class="label bg-red">Permintaan ditolak.</small></td>
                                                     <td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_barang_baru"]; ?>')">Hapus</button>
                                            <!-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_barang_baru"]; ?>','<?php echo $key["nama_peminta"]; ?>','<?php echo $key["nama_barang"]; ?>','<?php echo $key["jumlah"]; ?>','<?php echo $key["alasan"]; ?>')">Edit</button>  -->
                                        </td>
                                         <?php } ?>
                                            
                                           
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
        document.location='<?php echo base_url(); ?>ControllerPermintaanBarang/hapus/'+$id;
    }
}

function edit(id,nama_peminta,nama_barang,jumlah,alasan){ 
    $('#id').val(id);
    $('#nm').val(nama_peminta);
    $('#nm_b').val(nama_barang);
    $('#jml').val(jumlah);
    $('#alasan').val(alasan);
    // $('#st').val(stok);  
}

</script>

