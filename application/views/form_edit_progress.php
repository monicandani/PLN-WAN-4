
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit Progress</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <?php foreach($progress as $p){ ?>
                    <form action="<?php echo base_url();?>c_gangguan/update_progress" method="post">
                        <div class="row">
                       <div class='col-md-12'>
                         <div class="form-group">
                             <label for="date"> Waktu :  </label>
                             <input type='time' class="form-control" name="waktu" value="<?php echo $p->waktu ?>" />
                             <input type='hidden' class="form-control" name="id_gangguan" value="<?php echo $p->id_gangguan ?>" />
                             <input type='hidden' name="open_date" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($p->id_gangguan)->open_date?>" />
                             <input type='hidden' name="open_time" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($p->id_gangguan)->open_time?>" />
                             <input type='hidden' class="form-control" name="id_progress" value="<?php echo $p->id_progress ?>" />


                
                         </div>
                       </div>
                    </div>
                        <div class="form-group">
                          <label for="nama">Keterangan </label>
                          <textarea rows="3" class="form-control" name="ket_progress"><?php echo $p->ket_progress ?></textarea>
                        </div>

                       <div class="form-group">
                          <label for="prodi"> Status :</label>
                          <select class="form-control" id="status_progress" name="status_progress">
                            <?php if ($p->status_progress == "1") {
                              echo "<option value='1'>--Penanganan--</option>";
                            } else {
                              echo "<option value='2'>--Selesai--</option>";
                            }
                             ?>
                            <option value="1">Penanganan </option>
                            <option value="2">Selesai </option>
                          </select>
                        </div>

                         <div class="row" id="penyebab_gangguan" style="display: none;">
                      <div class='col-md-12'>
                          <div class="form-group">
                            <label for="date">Penyebab :  </label>
                                  
                                  <textarea rows="5" class="form-control" name="penyebab_gangguan"><?php echo $this->m_data_gangguan->tampil_gangguan_byid($p->id_gangguan)->penyebab_gangguan ?></textarea>
                              </div>
                          </div>
                      </div>

                      <div class="row" id="solusi_gangguan" style="display: none;">
                      <div class='col-md-12'>
                          <div class="form-group">
                            <label for="date">Solusi :  </label>
                                  <textarea rows="5" class="form-control" name="solusi_gangguan"><?php echo $this->m_data_gangguan->tampil_gangguan_byid($p->id_gangguan)->solusi_gangguan ?></textarea>
                              
                              </div>
                          </div>
                      </div>
                    <div class="row"  id="lokasi_gangguan" style="display: none;">
                    <div class='col-md-12'>
                        <div class="form-group">
                          <label for="date">Lokasi Gangguan :  </label>
                                <input type="text" name="lokasi_gangguan" class="form-control" value="<?php echo $this->m_data_gangguan->tampil_gangguan_byid($p->id_gangguan)->lokasi_gangguan?>">
                            
                            </div>
                        </div>
                    </div>
                        
                        <br>

                          <button type="submit" class="btn btn-default btn-lg"> Simpan </button>
                        </label></div></form>
                      <?php } ?>
                        
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
        }else if(val =="1"){
           $('#penyebab_gangguan').attr('style','display:none !important');
          $('#lokasi_gangguan').attr('style','display:none !important');
          $('#solusi_gangguan').attr('style','display:none !important');
        }
      });
    </script>
    <!-- CONTENT-WRAPPER SECTION END-->