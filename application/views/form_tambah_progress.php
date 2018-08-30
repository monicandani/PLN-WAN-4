
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Tambah Progress</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br/>
                    <?php foreach($gangguan as $g){ ?>
                    <form action="<?php echo base_url();?>c_gangguan/tambah_aksi_progress" method="post">
                        <div class="row">
                       <div class='col-md-12'>
                         <div class="form-group">
                             <label for="date"> Waktu :  </label>
                             <input type='hidden' name="id_gangguan" class="form-control" value="<?php echo $g->id_gangguan ?>" />
                             <input type='hidden' name="open_date" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($g->id_gangguan)->open_date?>" />
                             <input type='hidden' name="open_time" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($g->id_gangguan)->open_time?>" />
                             <input type='time' class="form-control" name="waktu" />
                
                         </div>
                       </div>
                    </div>
                        <div class="form-group">
                          <label for="nama">Keterangan </label>
                          <textarea rows="3" class="form-control" name="ket_progress"></textarea>
                        </div>

                       <div class="form-group">
                          <label for="prodi"> Status :</label>
                          <select class="form-control" id="status_progress" name="status_progress">
                            <option value="1">_____Pilih Status_____</option>
                            <option value="1">Penanganan </option>
                            <option value="2">Selesai </option>
                          </select>
                        </div>

                         <div class="form-group" id="jenisgangguan" style="display: none;">
                          <label for="prodi">Jenis Gangguan :</label>
                          <select class="form-control"   name="id_jenisgangguan">
                            <option value="<?php echo $g->id_jenisgangguan ?>">--<?php echo $this->m_data_gangguan->tampil_jenisgangguan_byid($g->id_jenisgangguan)->jenis_gangguan ?>--</option>
                            <?php 
                               foreach($get_jenisgangguan as $jg){ 
                               echo "<option  value='$jg->id_jenisgangguan'>$jg->jenis_gangguan</option>";
                               }
                            ?>
                          </select>
                       </div>

                       <div class="row" id="penyebab_gangguan" style="display: none;">
                      <div class='col-md-12'>
                          <div class="form-group">
                            <label for="date">Penyebab :  </label>
                                  
                                  <textarea rows="5" class="form-control" name="penyebab_gangguan" ><?php echo $g->penyebab_gangguan ?></textarea>
                              </div>
                          </div>
                      </div>

                      <div class="row" id="solusi_gangguan" style="display: none;">
                      <div class='col-md-12'>
                          <div class="form-group">
                            <label for="date">Solusi :  </label>
                                  <textarea rows="5" class="form-control" name="solusi_gangguan"><?php echo $g->solusi_gangguan ?></textarea>
                              
                              </div>
                          </div>
                      </div>
                    <div class="row"  id="lokasi_gangguan" style="display: none;">
                    <div class='col-md-12'>
                        <div class="form-group">
                          <label for="date">Lokasi Gangguan :  </label>
                                <input type="text" name="lokasi_gangguan" class="form-control" value="<?php echo $g->lokasi_gangguan ?>">
                            
                            </div>
                        </div>
                    </div>

                        
                        <br>

                          <button type="submit" class="btn btn-default btn-lg"> Tambah </button>
                        </label></div>
                      </form>
                    <?php }?>
                        
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>

    <script>
      $('#status_progress').on('change', function(){
        var val = this.value;
        if(val == "2"){
          $('#penyebab_gangguan').attr('style','display:block !important');
          $('#lokasi_gangguan').attr('style','display:block !important');
          $('#solusi_gangguan').attr('style','display:block !important');
          $('#jenisgangguan').attr('style','display:block !important');
        }else if(val =="1"){
           $('#penyebab_gangguan').attr('style','display:none !important');
          $('#lokasi_gangguan').attr('style','display:none !important');
          $('#solusi_gangguan').attr('style','display:none !important');
          $('#jenisgangguan').attr('style','display:none !important');
        }
      });
    </script>
    <!-- CONTENT-WRAPPER SECTION END-->