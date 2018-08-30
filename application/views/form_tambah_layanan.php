<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Tambah Layanan </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <form action="<?php echo base_url();?>c_layanan/tambah_aksi_layanan" method="post">
                        <div class="form-group">
                          <label for="ID">SID <font color="red">*</font></label>
                          <input class="form-control" id="ID" type="text" name="sid">
                          <span class="help-block" style="color: red"> <?php $error = form_error('sid');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <div class="form-group">
                          <label for="nama">Lokasi<font color="red">*</font></label>
                          <input id="nama" type="text" class="form-control" name="lokasi">
                          <span class="help-block" style="color: red"> <?php $error = form_error('lokasi');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <div class="form-group">
                           <label>Jenis Layanan<font color="red">*</font></label>
                            <select class="form-control" id="id_jenislayanan" name="id_jenislayanan">
                              <option>__Pilih Jenis Layanan__</option>
                                <?php 
                                  foreach($get_jenislayanan as $jl){ 
                                  echo "<option  value='$jl->id_jenislayanan'>$jl->nama_layanan</option>";
                                }
                              ?>
                            </select>
                            <span class="help-block" style="color: red"> <?php $error = form_error('id_jenislayanan');
                            echo "<font style='color: red;font-size: 15px' >$error</font>";?></span> 
                        </div>
                        <div class="form-group">
                          <label for="password">Kapasitas</label>
                          <input type="text" class="form-control" name="kapasitas">
                        </div>
                        <div class="form-group">
                          <label for="comfirmpassword">Nama PIC</td></label>
                          <input type="text" name="nama_pic"  class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="comfirmpassword">No. HP PIC</td></label>
                          <input type="text" name="no_hp_pic" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="comfirmpassword">E-mail PIC</td></label>
                          <input type="text" name="email" class="form-control">
                        </div>
                        <hr/>
                          <button type="submit" class="btn btn-default btn-lg">Tambah </button>
                        </label></div></form>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
 </main>