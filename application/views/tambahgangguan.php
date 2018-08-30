<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Tambah Jenis Gangguan </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <form action="<?php echo base_url();?>c_gangguan/tambah_aksi_jenisgangguan" method="post">
                        <div class="form-group">
                          <label for="nama">Jenis Gangguan<font color="red">*</font></label>
                          <input id="nama" type="text"  class="form-control" name="jenis_gangguan">
                          <span class="help-block" style="color: red"> <?php $error = form_error('jenis_gangguan');
                          echo "<font style='color: red;font-size: 15px' >$error</font>";?></span>
                        </div>
                        <div class="form-group">
                          <label for="">Keterangan</label>
                          <textarea rows="3" class="form-control" name="ket_gangguan"></textarea>
                        </div>
                        
                        <hr/>
                          <button type="submit" class="btn btn-default btn-lg">Tambah </button>
                        </div>
                      </form>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
</main>