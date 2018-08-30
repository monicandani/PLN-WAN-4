<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-head-line"><strong> Edit Data Gangguan</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
      <?php foreach($gangguan as $g){ ?>
      <form action="<?php echo base_url();?>c_gangguan/update_gangguan" method="post">             
      <div class="form-group">
      <label for="area">Area: </label>
      <select id="area" name="id_layanan" class="form-control">
       <option value="<?php echo $g->id_layanan ?>">--<?php echo $this->m_data_gangguan->tampil_layanan($g->id_layanan)->lokasi ?>--</option>
        <?php 
             foreach($get_layanan as $gl){ 
               echo "<option  value='$gl->id_layanan'>$gl->lokasi</option>";
               }
         ?>
    </select>
  </div>
  <div class="form-group">
                          <label for="prodi">Jenis Gangguan :</label>
                          <select class="form-control"  id="jenis gangguan" name="id_jenisgangguan">
                            <option value="<?php echo $g->id_jenisgangguan ?>">--<?php echo $this->m_data_gangguan->tampil_jenisgangguan_byid($g->id_jenisgangguan)->jenis_gangguan ?>--</option>
                            <?php 
                               foreach($get_jenisgangguan as $jg){ 
                               echo "<option  value='$jg->id_jenisgangguan'>$jg->jenis_gangguan</option>";
                               }
                            ?>
                          </select>
  </div>

  <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Deskripsi Gangguan </label>
                    
                    <textarea type="text" name="deskripsi_jenisgangguan" class="form-control" rows="4"><?php echo $g->deskripsi_jenisgangguan ?></textarea>
                </div>
            </div>
        </div>  


  <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Lokasi Gangguan  </label>
                    
                    <input type="text" name="lokasi_gangguan" class="form-control" value="<?php echo $g->lokasi_gangguan ?>">
                </div>
            </div>
        </div>  

    <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Penyebab :  </label>
                    
                    <textarea rows="5" class="form-control" name="penyebab_gangguan" ><?php echo $g->penyebab_gangguan ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Solusi :  </label>
                    <textarea rows="5" class="form-control" name="solusi_gangguan" ><?php echo $g->solusi_gangguan ?></textarea>
                
                </div>
            </div>
        </div>
    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Open Date :  </label>
                    <input type='date' name="open_date" class="form-control" value="<?php echo $g->open_date ?>"/>
                
                </div>
            </div>
        </div>
 <!-- s -->

    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Open Time :  </label>
                    <input type='text' class="form-control" name="open_time" value="<?php echo $g->open_time ?>"/>
                    <input type='hidden' class="form-control" name="id_gangguan" value="<?php echo $g->id_gangguan ?>" />
                    <input type='hidden' class="form-control" name="isDelete" value="<?php echo $g->isDelete ?>" />
                    <input type='hidden' class="form-control" name="cari_durasi" value="<?php echo $g->cari_durasi ?>" />
                
                </div>
            </div>
        </div>
    
<div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Close Date :  </label>
                    <input type='date' name="close_date" class="form-control" value="<?php echo $g->close_date ?>" />
                
                </div>
            </div>
        </div>


    <div class="row">
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Close Time :  </label>
                    <?php if ($g->close_time == '00:00:00') {
                      echo "<input type='text' class='form-control' name='close_time' placeholder='hh:mm:ss'/>";
                    } else{
                      echo "<input type='text' class='form-control' name='close_time' value='$g->close_time'/>";
                    } ?>
                </div>
            </div>
        </div>

        <hr/>
         <button type="submit" class="btn btn-default btn-lg">Simpan </button>
                        </label></div></form>
                        
                          
                    </form>
                  <?php }?>
  </div>
  </div>
</div>
 </div>
            </div>
        </div>
    </div>
 </main>