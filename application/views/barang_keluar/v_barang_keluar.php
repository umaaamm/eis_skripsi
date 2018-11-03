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
                                    <h3 class="box-title">Kelola Data Barang Keluar/Permintaan</h3>
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
                                            <!-- <th>Action</th> -->

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
                                            <!-- <td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_barang_keluar"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_barang_keluar"]; ?>','<?php echo $key["id_atk"]; ?>','<?php echo $key["nama_peminta"]; ?>','<?php echo $key["bagian"]; ?>','<?php echo $key["jumlah"]; ?>')">Edit</button>  -->
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

