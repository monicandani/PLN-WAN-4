<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit Layanan </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br/>
                     <?php foreach($layanan as $l){ ?>
                    <form action="<?php echo base_url();?>c_layanan/update_layanan" method="post">
                        <div class="form-group">
                          <label for="ID">SID <font color="red">*</font></label>
                          <input style="width:500px" class="form-control" id="ID" type="text" name="sid" value="<?php echo $l->sid ?>">
                          <input style="width:500px" class="form-control" id="ID" type="hidden" name="id_layanan" value="<?php echo $l->id_layanan ?>">
                        </div>
                        <div class="form-group">
                          <label for="nama">Lokasi<font color="red">*</font></label>
                          <input id="nama" type="text"  class="form-control" name="lokasi" value="<?php echo $l->lokasi ?>">
                          <input id="nama" type="hidden"  class="form-control" name="isDelete" value="<?php echo $l->isDelete ?>">
                        </div>
                        <div class="form-group">
                           <label><b>Jenis Layanan</b></label>
                            <select class="form-control" id="prodi" name="id_jenislayanan">
                              <option value="<?php echo $l->id_jenislayanan ?>">--<?php echo $this->m_data_layanan->tambah_jenislayanan($l->id_jenislayanan)->nama_layanan ?>--</option>
                                <?php 
                                  foreach($get_jenislayanan as $jl){ 
                                  echo "<option  value='$jl->id_jenislayanan'>$jl->nama_layanan</option>";
                                }
                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="password">Kapasitas<font color="red">*</font></label>
                          <input id="password" type="text" class="form-control" name="kapasitas" value="<?php echo $l->kapasitas ?>">
                        </div>
                        <div class="form-group">
                          <label for="comfirmpassword">Nama PIC<font color="red">*</font></td>
                          <input type="text"  name="nama_pic"  class="form-control" value="<?php echo $l->nama_pic ?>">
                        </div>
                        <div class="form-group">
                          <label for="comfirmpassword">No. HP PIC<font color="red">*</font></td>
                          <input type="text" name="no_hp_pic"  class="form-control" value="<?php echo $l->no_hp_pic ?>">
                        </div>
                        <div class="form-group">
                          <label for="comfirmpassword">E-mail PIC<font color="red">*</font></td>
                          <input type="text" name="email"  class="form-control" value="<?php echo $l->email ?>" >
                        </div>
                        <hr/>
                          <button type="submit" class="btn btn-default btn-lg">Simpan </button>
                        </label></div></form>
                      <?php } ?>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
 </main>