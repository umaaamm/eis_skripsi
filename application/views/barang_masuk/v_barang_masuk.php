<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
// print_r($cek_stok);die;
?>
</div>
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Data Barang Masuk</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanBarangMasuk" name="autoSumForm" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select class="form-control" onchange="cek_database()" id="id_atk" name="id_atk">
                                                <option value="-">-- Nama Barang --</option>
                                              <?php foreach($tampil_atk->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_atk'];?>"><?php echo $keyy['nama_barang'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div> 

                                         

                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <select class="form-control" name="id_suplier">
                                                <option value="-">-- Nama Supplier --</option>
                                              <?php foreach($tampil_suplier->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_suplier'];?>"><?php echo $keyy['nama_suplier'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                         <div class="row form-group">
                                            <div class="col-xs-6">
                                            <label>Stok Tersedia</label>
                                            <input type="text" id="stok_b" class="form-control" name="stok_tersedia" id="st" placeholder="Stok Barang Tersedia" onFocus="startCalc();" onBlur="stopCalc();" readonly>
                                            </div>
                                             <div class="col-xs-4">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control satuan" placeholder="Satuan" readonly>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="row form-group">
                                            <div class="col-xs-6">
                                            <label>Jumlah Barang Masuk</label>
                                            <input type="text" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" name="stok" placeholder="Stok Barang" required>
                                            </div>
                                            <div class="col-xs-4">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control satuan" placeholder="Satuan" readonly>
                                            </div>
                                        </div>
                                          
                                        <div class="row">
                                            <div class="col-xs-6">
                                            <label>Stok Akhir</label>
                                            <input type="text" value='0' onchange='tryNumberFormat(this.form.thirdBox);' class="form-control" name="stok_akhir"  placeholder="Stok Barang" readonly>
                                            </div>
                                            <div class="col-xs-4">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control satuan"  placeholder="Satuan" readonly>
                                            </div>
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
                    <form role="form" action="<?php echo base_url()?>ControllerBarangMasuk/edit" method="post">
                                   
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
                                            <label>Nama Supplier</label>
                                            <select class="form-control" name="id_suplier" id="id_suplier">
                                                <option value="-">-- Nama Supplier --</option>
                                              <?php foreach($tampil_suplier->result_array() as $keyy)
                                              {
                                                ?>
                                                    
                                                    <option value="<?php echo $keyy['id_suplier'];?>"><?php echo $keyy['nama_suplier'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" class="form-control" name="stok" id="st" placeholder="Stok Barang" >
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
                                    <h3 class="box-title">Data Barang Masuk</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
                                            
                                            <th>Nama Supplier</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Masuk</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Action</th>

                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil_g->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key["nama_suplier"];?></td>
                                            <td><?php echo $key["nama_barang"];?></td> 
                                            <td><?php echo $key["stok_t"];?></td> 
                                            <td><?php echo $key["tanggal_masuk"];?></td> 
                                            <td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_barang_m"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_barang_m"]; ?>','<?php echo $key["id_atk"]; ?>','<?php echo $key["id_suplier"]; ?>','<?php echo $key["stok_t"]; ?>')">Edit</button> 
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                    
<script type="text/javascript">

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){


one = document.autoSumForm.stok_tersedia.value;
two = document.autoSumForm.stok.value; 

document.autoSumForm.stok_akhir.value = (one * 1) + (two * 1);


}

function stopCalc(){
clearInterval(interval);}

</script>
<script type="text/javascript">
function hapus($id){
    var conf=window.confirm('Data Akan Dihapus ?');
    if (conf) {
        document.location='<?php echo base_url(); ?>ControllerBarangMasuk/hapus/'+$id;
    }
}

function edit(id,id_atk,id_suplier,stok){ 
    $('#id').val(id);
    $('#id_atk').val(id_atk);
    $('#id_suplier').val(id_suplier);
    $('#st').val(stok);
    // $('#st').val(stok);  
}

</script>

<script type="text/javascript">
    function cek_database(){
        var id_atk = $("#id_atk").val();
        // alert(id_atk);
        $.ajax({
            type : 'GET',
            url: '<?php echo base_url();?>ControllerBarangMasuk/cek',
            data:"id_atk="+id_atk,
            // dataType:"json",
            success:function(data) {
            var json = data,
            obj = JSON.parse(json);
            $('.satuan').val(obj.satuan);
            // alert(data);
            $('#stok_b').val(obj.stok_b);
        },
        });
    };
</script>
<!-- <script type="text/javascript">
var getp = function() {
    $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>ControllerPermintaanBarang/notif_p',
        dataType:"json",
        success : function(data){
            $('.notif_p').html(data.notification);
            // alert(data.notification);
            // var refInterval = window.setTimeout('get()', 2000); // 30 seconds
        },
    });
};
</script>
 -->

