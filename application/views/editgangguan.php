
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit Gangguan</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br/>
                    <?php foreach($jenisgangguan as $jg){ ?>
                    <form action="<?php echo base_url();?>c_gangguan/update_jenisgangguan" method="post">
                        <div class="form-group">
                          <label>Jenis Gangguan</label>
                           <input type="hidden"  class="form-control" name="id_jenisgangguan" value="<?php echo $jg->id_jenisgangguan ?>">
                          <input type="text"  class="form-control" name="jenis_gangguan" value="<?php echo $jg->jenis_gangguan ?>">
                        </div>
                        <div class="form-group">
                          <label for="password">Keterangan</label>
                          <textarea rows="3" class="form-control" name="ket_gangguan"><?php echo $jg->ket_gangguan ?></textarea>
                        </div>
                        
                          <button type="submit" class="btn btn-default btn-lg">Simpan</button>
                        </label></div></form>
                      <?php } ?>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
    <!-- CONTENT-WRAPPER SECTION END-->