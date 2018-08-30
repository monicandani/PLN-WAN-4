<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit Keluhan</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                     <?php foreach($jeniskeluhan as $jk){ ?>
                    <form action="<?php echo base_url();?>c_keluhan/update_jeniskeluhan" method="post">
                        <div class="form-group">
                          <label>Jenis Keluhan</label>
                          <input type="hidden" class="form-control" name="id_jeniskeluhan" value="<?php echo $jk->id_jeniskeluhan ?>">
                          <input type="text" class="form-control" name="jenis_keluhan" value="<?php echo $jk->jenis_keluhan ?>">
                        </div>
                        <div class="form-group">
                          <label for="password">Keterangan</label>
                          <textarea rows="3" class="form-control" name="ket_keluhan"><?php echo $jk->ket_keluhan ?></textarea>
                        </div>
                        
                          <button type="submit" class="btn btn-default btn-lg">Simpan </button>
                        </label></div>
                      </form>
                   <?php }?>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>
</main>