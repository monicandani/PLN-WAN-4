<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <?php foreach($user as $u){ ?>
                    <form action="<?php echo base_url();?>c_user/update_user" method="post">
                        <div class="form-group">
                          <label for="ID">No Karyawan<font color="red">*</font></label>
                          <input  class="form-control" type="text" name="no_karyawan" value="<?php echo $u->no_karyawan ?>">
                           <input  class="form-control" type="hidden" name="id_karyawan" value="<?php echo $u->id_karyawan ?>">
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama:<font color="red">*</font></label>
                          <input id="nama" type="text"  class="form-control" name="nama" value="<?php echo $u->nama ?>">
                        </div>
                        <div class="form-group">
                          <label for="password">Password:<font color="red">*</font></label>
                          <input id="password" type="password"  class="form-control" name="password" value="<?php echo $u->password ?>">
                        </div>
                        <!-- <div class="form-group">
                          <label for="comfirmpassword">Konfirmasi Password:<font color="red">*</font></td>
                          <input type="password" id="confirmpassword" name="password" style="width:500px" class="form-control">
                        </div> -->
                        <div class="form-group">
                          <label>Status :</label>
                          <select class="form-control" name="status_user">
                            <?php echo "<option value='$u->status_user'>-- $u->status_user --</option>"; ?>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                          </select>
                        </div>
                     
                        <hr/>
                          <button type="submit" class="btn btn-default btn-lg">Simpan</button>
                        </label></div>
                      </form>
                    <?php } ?>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
</main>