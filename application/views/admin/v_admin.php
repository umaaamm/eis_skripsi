<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
						<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Data Admin</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanAdmin" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="user" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bagian</label>
                                            <select class="form-control" name="bagian">
                                                 <option value="-">-- Bagian --</option>
                                              <option value="pimpinan">Pimpinan</option>
                                                <option value="operasional">Operasional</option>
                                                <option value="penjaminan">Penjaminan</option>
                                                <option value="klaim">Klaim</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level">
                                            
                                                <option value="Admin">Admin</option>
                                                <option value="Pimpinan">Pimpinan</option>
                                                
                                            </select>
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
                        <h4 class="modal-title" id="myModalLabel">Edit Admin</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerAdmin/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama" id="nm">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email" id="em">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="user" placeholder="Username" id="us">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="pass" placeholder="Password" id="pw">
                                        </div>

                                         <div class="form-group">
                                            <label>Bagian</label>
                                            <select class="form-control" name="bagian" id="bg">
                                                <option value="-">-- Bagian --</option>
                                                <option value="pimpinan">Pimpinan</option>
                                                <option value="operasional">Operasional</option>
                                                <option value="penjaminan">Penjaminan</option>
                                                <option value="klaim">Klaim</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" id="lvl" name="level">
                                            
                                                <option value="Admin">Admin</option>
                                                <option value="Pimpinan">Pimpinan</option>
                                                
                                            </select>
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
                                    <h3 class="box-title">Data Admin</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin1" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
											
                                            <th>Nama</th>
                                            <th>Email</th>
											<th>Username</th>
											<th>Password</th>
                                            <th>Bagian</th>
                                            <th>Level</th>
											<th>Action</th>

                                            </tr>
                                        </thead>
                                        
											<?php
												$a=1;
												foreach ($tampil->result_array() as $key) {
											?>
											<tr>
											<td><?php echo $a; ?></td>
											<td><?php echo $key["nama"];?></td>
                                            <td><?php echo $key["email"];?></td> 	
											<td><?php echo $key["username"];?></td>	
											<td><?php echo $key["password"];?></td>
                                            <td><?php echo $key["bagian"];?></td> 
                                             <td><?php echo $key["level"];?></td> 
											<td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_admin"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_admin"]; ?>','<?php echo $key["nama"]; ?>','<?php echo $key["email"]; ?>','<?php echo $key["username"]; ?>','<?php echo $key['password'];?>','<?php echo $key['bagian'];?>','<?php echo $key['level'];?>')">Edit</button> 
											</tr>
										<?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                    

<script type="text/javascript">
function hapus($id){
	var	conf=window.confirm('Data Akan Dihapus ?');
	if (conf) {
		document.location='<?php echo base_url(); ?>ControllerAdmin/hapus/'+$id;
	}
}
// function hapusakses($id){
//     var conf=window.confirm('Data Akan Dihapus ?');
//     if (conf) {
//         document.location='<?php echo base_url(); ?>Rs/hapusakses/'+$id;
//     }
// }
function edit(id,nama,email,username,password,bagian,level){
	//var	conf=window.confirm('Apakah Data Akan Diedit ?');
	//if (conf) {
    $('#id').val(id);
	$('#nm').val(nama);
    $('#em').val(email);
	$('#us').val(username);
	$('#pw').val(password);
    $('#bg').val(bagian);
    $('#lvl').val(level);
  
//}
}

// function editakses(id_akses,id_dokter,username,password){
//     //var   conf=window.confirm('Apakah Data Akan Diedit ?');
//     //if (conf) {
//     $('#id').val(id_akses);
//     $('#kode').val(id_dokter);
//     $('#usr').val(username);
//     $('#pwd').val(password);
  
// //}
// }

</script>

