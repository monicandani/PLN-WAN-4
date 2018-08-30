<main>
    <div class="content-wrapper">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <h4  class="page-head-line">Pencarian Gangguan</h4>
                </div>
            </div>
            <center>
            <div class="row">
            
            <div>
                <div class="col-md-3"></div>
                <div class="col-md-6" style="margin-right:200 ; margin-left:200" >
                   <div class="alert alert-info">
                    <div class="form-group">
                          <label for="prodi">Jenis Pencarian :</label>
                          <select class="form-control" id="jenis_pencarian" name="jenis_pencarian">
                            <option value="_">_____Pilih_____</option>
                            <option value="bulan">Bulan</option>
                            <option value="tahun">Tahun</option>
                            <option value="durasi">Durasi</option>
                          </select>
                    </div>

<div class="form-group" style="display: none" id="bulan1">
                          <label for="prodi">Bulan :</label>
                          <select class="form-control" id="jenis gangguan" name="jenis gangguan">
                            <option value="_">_____Pilih Bulan_____</option>
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
<div class="row">
<div class='col-md-12' style="display: none" id="tahun1">
            <div class="form-group">
              <label for="date">Tahun :  </label>
                    <input type='date' class="form-control" />
                
                </div>
            </div>
        </div>
<div class="form-group" style="display: none" id="durasi1">
                          <label for="prodi">Durasi :</label>
                          <select class="form-control"  id="Durasi " name="Durasi ">
                            <option value="_">_____Pilih Rentan Waktu_____</option>
                            <option value="Putus Kabel">< 4 Jam</option>
                            <option value="Perangkat">4 Jam- 7 Jam </option>
                            <option value="Modul"> > 7 Jam </option>
                          </select>
</div>
                        <hr />
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> &nbsp;Cek </button>&nbsp;
                        </div>
                        </div>
              </form>
                </div>
            <center/>
            </div>
            </div>
        </div>
    </div>
</main>

 <script>
      $('#jenis_pencarian').on('change', function(){
        var val = this.value;
        if(val =="bulan"){
          $('#bulan1').attr('style','display:block !important');
          $('#tahun1').attr('style','display:none !important');
          $('#durasi1').attr('style','display:none !important');
        }else if(val =="tahun"){
          $('#tahun1').attr('style','display:block !important');
          $('#bulan1').attr('style','display:none !important');
          $('#durasi1').attr('style','display:none !important');
        }else if(val =="durasi"){
          $('#durasi1').attr('style','display:block !important');
          $('#bulan1').attr('style','display:none !important');
          $('#tahun1').attr('style','display:none !important');
        }



      });
    </script>