<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
                      
              
                              <div class="col-md-12">
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
                                             <!-- <th>Kode Permintaan</th> -->
                                            <th>Nama Barang</th>
                                             <!-- <th>Nama</th> -->
                                             <!--  <th>Bagian</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Keluar</th> -->
                                            <th>Action</th>

                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil_g->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <!-- <td><?php echo $key["kode_permintaan"];?></td> -->
                                            <td><?php echo $key["nama_barang"];?></td>
                                            <!-- <td><?php echo $key["nama_peminta"];?></td>  -->
                                            <!-- <td><?php echo $key["bagian"];?></td> -->
                                            <!-- <td><?php echo $key["jumlah"];?></td>  -->
                                            <!-- <td><?php echo $key["tanggal_keluar"];?></td>  -->
                                            <td>
                                            <!-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" data-id=".$key['id_atk'].">Detail</button>  -->

                                            <a href='#myModal' class='btn btn-primary btn-small' id='custId' data-toggle='modal' data-id="<?php echo $key["id_atk"];?>">Detail</a>
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


<div class="modal fade bs-example-modal-lg" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Data Barang Keluar/Permintaan</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

                           
                       <!--  </div>/.col (right)  -->
                    
<script type="text/javascript">
function hapus($id){
    var conf=window.confirm('Data Akan Dihapus ?');
    if (conf) {
        document.location='<?php echo base_url(); ?>ControllerBarangKeluar/hapus/'+$id;
    }
}

function edit(id_atk){ 
    // $('#id').val(id);
    $('#id_atk').val(id_atk);
    // $('#nm').val(nama);
    // $('#bagian').val(bagian);
    // $('#jumlah').val(jumlah);
    // $('#st').val(stok);  
}

</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            // var id_anggota = $(this).attr("id_atk");
            // console.log(rowid);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : '<?php echo base_url();?>ControllerBarangKeluar/detail',
                data :  'id_atk='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

