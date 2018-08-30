<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-head-line"><strong> Edit Data Keluhan</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
      <?php foreach($keluhan as $k){ ?>
      <form action="<?php echo base_url();?>c_keluhan/update_keluhan" method="post">
      <div class="form-group">
      <label for="area">Area : </label>
      <select id="area" name="id_layanan" class="form-control">
        <option value="<?php echo $k->id_layanan ?>">--<?php echo $this->m_data_keluhan->tampil_layanan($k->id_layanan)->lokasi ?>--</option>
        <?php 
             foreach($get_layanan as $gl){ 
               echo "<option  value='$gl->id_layanan'>$gl->lokasi</option>";
               }
         ?>
      </select>
  </div>

  <div class="form-group">
                          <label for="prodi">Jenis Keluhan :</label>
                          <select class="form-control" id="jenis keluan" name="id_jeniskeluhan">
                            <option value="<?php echo $k->id_jeniskeluhan ?>">--<?php echo $this->m_data_keluhan->tampil_jeniskeluhan_byid($k->id_jeniskeluhan)->jenis_keluhan ?>--</option>
                            <?php 
                               foreach($get_jeniskeluhan as $jk){ 
                               echo "<option  value='$jk->id_jeniskeluhan'>$jk->jenis_keluhan</option>";
                               }
                            ?>
                          </select>
                        </div>

   <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Deskripsi Keluhan :  </label>
                    
                    <textarea rows="4" class="form-control" name="deskripsi_jeniskeluhan"><?php echo $k->deskripsi_jeniskeluhan ?></textarea>
                </div>
            </div>
        </div>

    <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Penyebab :  </label>
                    
                    <textarea rows="5" class="form-control" name="penyebab_keluhan"><?php echo $k->penyebab_keluhan ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Solusi :  </label>
                    <textarea rows="5" class="form-control" name="solusi_keluhan"><?php echo $k->solusi_keluhan ?></textarea>
                
                </div>
            </div>
        </div>
    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Open Date :  </label>
                    <input type='date' class="form-control" name="open_date" value="<?php echo $k->open_date ?>" />
                
                </div>
            </div>
        </div>
 

    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Open Time :  </label>
                    <!-- <input type='time' class="form-control" name="open_time" value="<?php //echo $k->open_time ?>" /> -->
                    <input type="text" class="form-control" name="open_time" value="<?php echo $k->open_time ?>" />
                    <input type='hidden' class="form-control" name="id_keluhan" value="<?php echo $k->id_keluhan ?>" />
                    <input type='hidden' class="form-control" name="isDelete" value="<?php echo $k->isDelete ?>" />
                
                </div>
            </div>
        </div>
    
<div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Close Date :  </label>
                    <input type='date' class="form-control" name="close_date" value="<?php echo $k->close_date ?>" />
                
                </div>
            </div>
        </div>


    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Close Time :  </label>
                    <?php if ($k->close_time == '00:00:00') {
                      echo "<input type='text' class='form-control' name='close_time' placeholder='hh:mm:ss'/>";
                    } else{
                      echo "<input type='text' class='form-control' name='close_time' value='$k->close_time'/>";
                    } ?>
                
                </div>
            </div>
        </div>

        <hr/>
        
          
                        
                          <button type="submit" class="btn btn-default btn-lg">Simpan </button>
                        </label></div></form>
                        
                          
                    </form>
                  <?php } ?>
  </div>
  </div>
</div>
 </div>
            </div>
        </div>
    </div>
 </main>