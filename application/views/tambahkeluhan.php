<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Tambah Jenis Keluhan</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <form action="<?php echo base_url();?>c_keluhan/tambah_aksi_jeniskeluhan" method="post">
                        <div class="form-group">
                          <label for="nama">Jenis Keluhan<font color="red">*</font></label>
                          <input id="nama" type="text"  class="form-control" name="jenis_keluhan">
                          <span class="help-block" style="color: red"> <?php $error = form_error('jenis_keluhan');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span>
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <textarea rows="3" class="form-control" name="ket_keluhan"></textarea>
                          
                        </div>
                        
                          <button type="submit" class="btn btn-default btn-lg">Simpan </button>
                        </label></div>
                     </form>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
</main>