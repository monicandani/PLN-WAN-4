<main>
    <div class="content-wrapper">
        <div class="container" >
            <div class="row">
                <div class="col">
                    <h4  class="page-head-line">Pencarian Keluhan</h4>
                </div>
            </div>
            <center>
            
            
            <div class="container">
             <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                   <div class="alert alert-info">
                  <form class="" action="<?php echo base_url().'c_keluhan/filter_manual'; ?>" method="post">
                     <label>Area: </label>
                     <select id="area" name="id_layanan" class="form-control">
                     <option value="">_____Pilih Area_____</option>
                      <?php 
                        foreach($get_layanan as $gl ) {
                          echo "<option value='$gl->id_layanan'> $gl->lokasi</option>";
                        }
                      ?>
                    </select>

  <div class="form-group">
                          <label for="prodi">Jenis Keluhan :</label>
                          <select class="form-control" id="jenis keluan" name="id_jeniskeluhan">
                            <option value="">_____Pilih Jenis Keluhan_____</option>
                            <?php 
                              foreach($get_jeniskeluhan as $gjk ) {
                                echo "<option value='$gjk->id_jeniskeluhan'> $gjk->jenis_keluhan</option>";
                              }
                            ?>                          
                          </select>
                        </div>

                        
<div class="form-group">
                          <label for="prodi">Bulan :</label>
                          <select class="form-control" id="jenis gangguan" name="bulan">
                            <option value="">_____Pilih Bulan_____</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                          </select>
</div>
<div class="row"> <div class='col'>
            <div class="form-group">
              <label for="date">Tahun :  </label>
                    <input type='text' class="form-control" name="tahun" placeholder="Masukkan tahun" />
                
                </div>
            </div>
</div>

<!-- <div class="row"> <div class='col-md-12'>
            <div class="form-group">
              <label for="date">Durasi :  </label>
                    <input type='text' class="form-control" name="durasi" />
                
                </div>
            </div>
</div> -->
 <div class="form-group">
                           <label for="prodi">Durasi :</label>
                           <select class="form-control"  id="Durasi " name="durasi">
                             <option value="">_____Pilih Rentan Waktu_____</option>
                             <option value="1">< 4 Jam</option>
                             <option value="2">4 Jam- 7 Jam </option>
                             <option value="3"> > 7 Jam </option>
                           </select>
 </div>  
                        <hr />
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> &nbsp;Search </button>&nbsp;
                        </div>
                        </div>
              </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </center>
            </div>
          </div>
        </main>
