<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-head-line"><strong> MASUKKAN DATA GANGGUAN </strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
      <form action="<?php echo base_url();?>c_gangguan/tambah_aksi_gangguan_email" method="post">        
      <div class="form-group">
      <label for="area">Lokasi : <font color="red">*</font></label>
      <select id="area" name="id_layanan" class="form-control">
        <option value="">_____Pilih Area_____</option>
        <?php 
            foreach($get_layanan as $gl){ 
               echo "<option  value='$gl->id_layanan'>$gl->lokasi</option>";
                   }
                ?>
      </select>
      <span class="help-block" style="color: red"> <?php $error = form_error('id_layanan');
      echo "<font style='color: red;font-size: 15px' >$error</font>";?></span>           
  </div>
      
  
  <div class="form-group">
                          <label for="prodi">Jenis Gangguan :</label>
                          <select class="form-control" id="jenis gangguan" name="id_jenisgangguan">
                            <option value="16">_____Pilih Jenis Gangguan_____</option>
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
              <label for="date">Lokasi Gangguan :  </label>
                    <input type="text" name="lokasi_gangguan" class="form-control">
                
                </div>
            </div>
        </div>

    



    <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Penyebab :  </label>
                    
                    <textarea rows="5" class="form-control" name="penyebab_gangguan"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Solusi :  </label>
                    <textarea rows="5" class="form-control" name="solusi_gangguan"></textarea>
                
                </div>
            </div>
        </div>
    
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Open Date :  <font color="red">*</font></label>
                    <input type='date' class="form-control" name="open_date" />
                    <span class="help-block" style="color: red"> <?php $error = form_error('open_date');
                    echo "<font style='color: red;font-size: 15px' >$error</font>";?></span>
                </div>
            </div>
        
 

    
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Open Time :  <font color="red">*</font></label>
                    <!-- <input id="timepicker" type="time" class="form-control" name="open_time" /> -->
                    <input id="timepicker" type="text" class="form-control" name="open_time" placeholder="hh:mm:ss" />
                    <span class="help-block" style="color: red"> <?php $error = form_error('open_time');
                    echo "<font style='color: red;font-size: 15px' >$error</font>";?></span>
                </div>
            </div>
        
    

        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Close Date :  </label>
                    <input type='date' class="form-control" name="close_date" />
                
                </div>
            </div>
        


    
        <div class='col-md-6'>
            <div class="form-group">
              <label for="date">Close Time :  </label>
                    <!-- <input type='time' class="form-control" name="close_time" /> -->
                    <input id="timepicker" type="text" class="form-control" name="close_time" placeholder="hh:mm:ss" />
                
                </div>
            </div>

        <div class="row">
        <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Deskripsi Jenis gangguan :  </label>
                    <textarea rows="3" class="form-control" name="deskripsi_jenisgangguan"></textarea>
                
                </div>
            </div>
        </div>
      

        </div>
        </div>
          <br>
                       
                        <!-- s -->
                          <button type="submit" class="btn btn-default btn-lg">Simpan </button>
                        </label></div></form>
                        
                          
                    </form>
  </div>
  </div>
</div>
 </div>
            </div>
        </div>
    </div>
</main>


<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js">
  $('#timepicker').timepicker({
    timeFormat: 'h:mm:ss p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
</script>