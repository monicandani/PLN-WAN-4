<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">DAFTAR </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <form action="<?php echo base_url();?>c_user/tambah_aksi_user" method="post">
                        
                        <div class="form-group">
                          <label for="nama">Nama:<font color="red">*</font></label>
                          <input id="nama" type="text" style="width:500px" class="form-control" name="nama">
                          <span class="help-block" style="color: red"> <?php $error = form_error('nama');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <div class="form-group">
                          <label for="id_karyawan">No Karyawan:<font color="red">*</font></label>
                          <input id="id_karyawan" type="text" style="width:500px" class="form-control" name="no_karyawan">
                           <span class="help-block" style="color: red"> <?php $error = form_error('no_karyawan');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <div class="form-group">
                          <label for="password">Password:<font color="red">*</font></label>
                          <input id="password" type="password" style="width:500px" class="form-control" name="password">
                           <span class="help-block" style="color: red"> <?php $error = form_error('password');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <!-- <div class="form-group">
                          <label for="comfirmpassword">Konfirmasi Password:<font color="red">*</font></td>
                          <input type="password" id="confirmpassword" name="password" style="width:500px" class="form-control">
                        </div> -->
                     <div class="form-group">
                          <label for="prodi">Status :<font color="red">*</font></label>
                          <select class="form-control" id="jenis gangguan" name="status_user">
                            <option value="_">_____Pilih Status_____</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                            <option value="Petugas">Petugas</option>
                          </select>
                           <span class="help-block" style="color: red"> <?php $error = form_error('status_user');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <hr/>
                          <button type="submit" class="btn btn-default btn-lg">Daftar </button>
                        </label></div></form>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
</main>