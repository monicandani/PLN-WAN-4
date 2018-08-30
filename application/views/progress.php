<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Progress</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                             <button onclick='tambah_progress(<?php echo $id ?>)' id="btn-edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalTambah">TAMBAH</button>
                            <div class="table-responsive" style="margin-top: 20px">
                                <table id="example" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu</th>
                                            <th>Keterangan</th>
                                            <th style="width:50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach($progress as $p ) {

                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $p->waktu ?></td>
                                            <td><?php echo $p->ket_progress ?></td>
                                            <td>
                                              <div class="btn-group">
                                               <button onclick='edit_progress(<?php echo $p->id_progress ?>)' id="btn-edit" class="btn btn-default btn-md" data-toggle="modal" data-target="#ModalEdit">Edit</button>
                                            <button data-toggle="modal" data-target="#exampleModal" onclick="set_id(<?php echo $p->id_progress?>)" class="btn btn-danger">Hapus</button>
                                          </div>
                                          </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <br>
                                <form action="<?php echo base_url();?>c_gangguan/form_data_gangguan">
                                  <button class="btn btn-outline-primary"><i class="fas fa-chevron-circle-left" style="margin-right: 3px"></i> KEMBALI </button>&nbsp;
                                </form>
                                
                                <br>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Progress</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <i class="fa fa-trash fa-4x mb-3 animated bounce"></i>
                              <p style="font-size: 15px">Apakah anda yakin ingin menghapus progress ini?</p>
                            </div>

                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button class="btn btn-default" type="submit" onclick='deletep()'>Ya</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->

     <!-- Modal Tambah Progress -->
              <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Progress Gangguan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body"> 
                              <form action="<?php echo base_url();?>c_gangguan/tambah_aksi_progress" method="post">
                                  <div class="row">
                                 <div class='col-md-12'>
                                   <div class="form-group">
                                       <label for="date"> Waktu :  </label>
                                       <!-- $id = id_gangguan -->
                                       <input type='hidden' id="id_gangguan" name="id_gangguan" class="form-control" value="<?php echo $id ?>" />
                                       <input type='hidden' id="open_date" name="open_date" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->open_date?>" />
                                       <input type='hidden' id="open_time" name="open_time" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->open_time?>" />
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
                                    <select class="form-control"  id="id_jenisgangguan" name="id_jenisgangguan">
                                      <option value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->id_jenisgangguan ?>">--<?php echo $this->m_data_gangguan->tampil_jenisgangguan_byid($this->m_data_gangguan->get_gangguan_byid($id)->id_jenisgangguan)->jenis_gangguan ?>--</option>
                                      <?php 
                                         foreach($get_jenisgangguan as $jg){ 
                                         echo "<option  value='$jg->id_jenisgangguan'>$jg->jenis_gangguan</option>";
                                         }
                                      ?>
                                    </select>
                                  </div>
    
                                 <div class="row" id="penyebabgangguan" style="display: none;">
                                <div class='col-md-12'>
                                    <div class="form-group">
                                      <label for="date">Penyebab :  </label>
                                            <textarea rows="5" id="penyebab_gangguan" class="form-control" name="penyebab_gangguan" ><?php echo $this->m_data_gangguan->get_gangguan_byid($id)->penyebab_gangguan ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="solusigangguan" style="display: none;">
                                <div class='col-md-12'>
                                    <div class="form-group">
                                      <label for="date">Solusi :  </label>
                                            <textarea rows="5" id="solusi_gangguan" class="form-control" name="solusi_gangguan"><?php echo $this->m_data_gangguan->get_gangguan_byid($id)->solusi_gangguan ?></textarea>
                                        
                                        </div>
                                    </div>
                                </div>
                              <div class="row"  id="lokasigangguan" style="display: none;">
                              <div class='col-md-12'>
                                  <div class="form-group">
                                    <label for="date">Lokasi Gangguan :  </label>
                                          <input type="text" id="lokasi_gangguan" name="lokasi_gangguan" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->lokasi_gangguan?>">
                                      
                                      </div>
                                  </div>
                              </div>
                                 
                              

                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-default btn-md"> Tambah </button>
                            </form>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->


     <!-- Modal Edit Progress -->
              <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Progress Gangguan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body"> 
                              <form action="<?php echo base_url();?>c_gangguan/update_progress" method="post">
                                  <div class="row">
                                 <div class='col-md-12'>
                                   <div class="form-group">
                                       <label for="date"> Waktu :  </label>
                                       <!-- $id = id_gangguan -->
                                       <input type='hidden' id="id_gangguan" name="id_gangguan" class="form-control" value="<?php echo $id ?>" />
                                       <input type='hidden' id="id_progress" name="id_progress" class="form-control" value="<?php echo $p->id_progress ?>" />
                                       <input type='hidden' id="open_date" name="open_date" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->open_date?>" />
                                       <input type='hidden' id="open_time" name="open_time" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->open_time?>" />
                                       <input type='time' class="form-control" id="waktu" name="waktu" value="<?php echo $p->waktu ?>"/>
                          
                                   </div>
                                 </div>
                              </div>
                                  <div class="form-group">
                                    <label for="nama">Keterangan </label>
                                    <textarea rows="3" class="form-control" id="ket_progress" name="ket_progress"><?php echo $p->ket_progress ?></textarea>
                                  </div>

                                 <div class="form-group">
                                    <label for="prodi"> Status :</label>
                                    <select class="form-control" id="status_progress_edit" name="status_progress">
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

                                  <div class="form-group" id="jenisgangguan_edit" style="display: none;">
                                    <label for="prodi">Jenis Gangguan :</label>
                                    <select class="form-control"  id="id_jenisgangguan" name="id_jenisgangguan">
                                      <option value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->id_jenisgangguan ?>">--<?php echo $this->m_data_gangguan->tampil_jenisgangguan_byid($this->m_data_gangguan->get_gangguan_byid($id)->id_jenisgangguan)->jenis_gangguan ?>--</option>
                                      <?php 
                                         foreach($get_jenisgangguan as $jg){ 
                                         echo "<option  value='$jg->id_jenisgangguan'>$jg->jenis_gangguan</option>";
                                         }
                                      ?>
                                    </select>
                                  </div>
    
                                 <div class="row" id="penyebabgangguan_edit" style="display: none;">
                                <div class='col-md-12'>
                                    <div class="form-group">
                                      <label for="date">Penyebab :  </label>
                                            <textarea rows="5" id="penyebab_gangguan" class="form-control" name="penyebab_gangguan" ><?php echo $this->m_data_gangguan->get_gangguan_byid($id)->penyebab_gangguan ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="solusigangguan_edit" style="display: none;">
                                <div class='col-md-12'>
                                    <div class="form-group">
                                      <label for="date">Solusi :  </label>
                                            <textarea rows="5" id="solusi_gangguan" class="form-control" name="solusi_gangguan"><?php echo $this->m_data_gangguan->get_gangguan_byid($id)->solusi_gangguan ?></textarea>
                                        
                                        </div>
                                    </div>
                                </div>
                              <div class="row"  id="lokasigangguan_edit" style="display: none;">
                              <div class='col-md-12'>
                                  <div class="form-group">
                                    <label for="date">Lokasi Gangguan :  </label>
                                          <input type="text" id="lokasi_gangguan" name="lokasi_gangguan" class="form-control" value="<?php echo $this->m_data_gangguan->get_gangguan_byid($id)->lokasi_gangguan?>">
                                      
                                      </div>
                                  </div>
                              </div>
                                 
                              

                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-default btn-md"> Simpan</button>
                            </form>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->


  <script type="text/javascript">
   $(document).ready( function () {
     $('#example').DataTable(); } );
     $('#example').dataTable({});
 </script>

 <script>
   // popovers Initialization
    $(function () {
      $('[data-toggle="popover"]').popover() });
        var p_id;
        function set_id(id) {
        p_id = id;
      }

    function deletep(){
     window.location.href =  "<?php echo base_url();?>c_gangguan/hapus_progress/"+p_id;
   }

   function tambah_progress(id) {

      $.ajax({
        url: "<?php echo base_url('c_gangguan/ambil_data_gangguan/') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id_gangguan"]').val(data.id_gangguan);
          $('[name="id_jenisgangguan"]').val(data.id_jenisgangguan);
          $('[name="penyebab_gangguan"]').val(data.penyebab_gangguan);
          $('[name="lokasi_gangguan"]').val(data.lokasi_gangguan);
          $('[name="solusi_gangguan"]').val(data.solusi_gangguan);
          
          $('#ModalTambah').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('gagal mengambil data');
        }
      });
    }

    $('#status_progress').on('change', function(){
        var val = this.value;
        if(val == "2"){
          $('#penyebabgangguan').attr('style','display:block !important');
          $('#lokasigangguan').attr('style','display:block !important');
          $('#solusigangguan').attr('style','display:block !important');
          $('#jenisgangguan').attr('style','display:block !important');
        }else if(val =="1"){
           $('#penyebabgangguan').attr('style','display:none !important');
          $('#lokasigangguan').attr('style','display:none !important');
          $('#solusigangguan').attr('style','display:none !important');
          $('#jenisgangguan').attr('style','display:none !important');

        }
      });

     function update_progress(id) {

      $.ajax({
        url: "<?php echo base_url('c_gangguan/ambil_data_progress/') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id_gangguan"]').val(data.id_gangguan);
          $('[name="id_progress"]').val(data.id_progress);
          $('[name="waktu"]').val(data.waktu);
          $('[name="open_date"]').val(data.open_date);
          $('[name="open_time"]').val(data.open_time);
          $('[name="ket_progress"]').val(data.ket_progress);
          $('[name="status_progress"]').val(data.status_progress);
          $('[name="id_jenisgangguan"]').val(data.id_jenisgangguan);
          $('[name="penyebab_gangguan"]').val(data.penyebab_gangguan);
          $('[name="lokasi_gangguan"]').val(data.lokasi_gangguan);
          $('[name="solusi_gangguan"]').val(data.solusi_gangguan);
          
          $('#ModalEdit').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('gagal mengambil data');
        }
      });
    }

    $('#status_progress_edit').on('change', function(){
        var val = this.value;
        if(val == "2"){
          $('#penyebabgangguan_edit').attr('style','display:block !important');
          $('#lokasigangguan_edit').attr('style','display:block !important');
          $('#solusigangguan_edit').attr('style','display:block !important');
          $('#jenisgangguan_edit').attr('style','display:block !important');
        }else if(val =="1"){
          $('#penyebabgangguan_edit').attr('style','display:none !important');
          $('#lokasigangguan_edit').attr('style','display:none !important');
          $('#solusigangguan_edit').attr('style','display:none !important');
          $('#jenisgangguan_edit').attr('style','display:none !important');

        }
      });

 </script>
