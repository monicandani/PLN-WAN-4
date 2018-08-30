<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Data Gangguan</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink d-->
                            <a href="<?php echo base_url();?>c_gangguan/form_tambah_gangguan" class="btn btn-primary btn-md"><span class="fa fa-plus"></span> <b>TAMBAH</b> </a>
                            <div class="table-responsive" style="margin-top: 20px">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Area</th>
                                            <th>Jenis Gangguan</th>
                                            <th>Lokasi Gangguan</th>
                                            <th>Penyebab</th>
                                            <th>Solusi</th>
                                            <th>Progress</th>
                                            <th>Durasi</th>
                                            <?php if ($status_user == 'Admin' || $status_user == 'Petugas') {
                                              echo "<th style='width:50px'>Aksi</th>";
                                            } ?>
                                            <th style="display: none;">SID</th>
                                            <th style="display: none;">Open Date</th>
                                            <th style="display: none;">Open Time</th>
                                            <th style="display: none;">Close Date</th>
                                            <th style="display: none;">Close Time</th>
                                            <th style="display: none;">Jenis Layanan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                        $no=1;
                                        foreach($gangguan as $g ) {

                                        ?>
                                        <tr>
                                            <td><?php echo $g->open_date ?></td>
                                            <td>
                                              <button onclick='tampil_lokasi(<?php echo $g->id_layanan ?>)' id="btn-edit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ModalZ">Area <?php echo $this->m_data_gangguan->tampil_layanan($g->id_layanan)->lokasi ?></button></td>
                                           <!--  <td><?php //echo anchor('c_gangguan/form_jenis_gangguan/'.$g->id_gangguan, $this->m_data_gangguan->tampil_jenisgangguan_byid($g->id_jenisgangguan)->jenis_gangguan); ?> </td> -->
                                            <td><?php if ($g->id_jenisgangguan=="16") {
                                              echo "<p style='color:'>Belum Teridentifikasi</p>";
                                              } else {
                                                ?>
                                                 <button onclick='ket_jenisgangguan(<?php echo $g->id_gangguan ?>)' id="btn-edit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ModalY"><?php echo $this->m_data_gangguan->tampil_jenisgangguan_byid($g->id_jenisgangguan)->jenis_gangguan ?></button>
                                              <?php  } ?>
                                              </td>
                                            <td><?php echo $g->lokasi_gangguan ?></td>
                                            <td><?php echo $g->penyebab_gangguan ?></td>
                                            <td><?php echo $g->solusi_gangguan ?></td>
                                            <td>
                                              <?php if($this->m_data_gangguan->get_last_progress($g->id_gangguan)== false && ($status_user == 'Admin' || $status_user == 'Petugas')):  ?>
                                                 <center><form method='' action="<?php echo base_url('c_gangguan/tambah_progress/'.$g->id_gangguan)?>">
                                                     <button class="btn btn-outline-dark btn-sm" type='submit'><i class="fas fa-plus-square"></i> </button>
                                                  </form></center>
                                              <!-- <center><button onclick='tambah_progress(<?php //echo $g->id_gangguan ?>)' id="btn-edit" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus-square"></i></button></center> -->
                                              <?php else: ?>
                                                <?php if ($this->m_data_gangguan->get_last_progress($g->id_gangguan)['status_progress'] == 1): ?>
                                                    <a href="<?php echo base_url('c_gangguan/progress/'.$g->id_gangguan) ?>">Penanganan</a><br>
                                                    <?php if ($status_user == 'Admin' || $status_user == 'Petugas') { ?>
                                                       <center><form method='' action="<?php echo base_url('c_gangguan/tambah_progress/'.$g->id_gangguan)?>">
                                                             <button class="btn btn-outline-dark btn-sm" type='submit'><i class="fas fa-plus-square"></i> </button>
                                                          </form></center>
                                                     <!--  <center><button onclick='tambah_progress(<?php //echo $g->id_gangguan ?>)' id="btn-edit" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus-square"></i></button></center> -->
                                                <?php } ?>
                                                    <?php elseif($this->m_data_gangguan->get_last_progress($g->id_gangguan)['status_progress'] == 2): ?>
                                                      <a href="<?php echo base_url('c_gangguan/progress/'.$g->id_gangguan) ?>">Selesai</a>
                                                      <?php else: ?>
                                                <?php endif ?>
                                                
                                              <?php endif; ?>
                                            </td>
                                            <td><?php echo $g->durasi ?></td>
                                            <?php if ($status_user == 'Admin' || $status_user == 'Petugas') { ?>
                                            <td> 
                                              <div class="btn-group">
                                              <button onclick='detail_waktu(<?php echo $g->id_gangguan ?>)' id="btn-edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalX">Detail</button>
                                              <form method='' action="<?php echo base_url('c_gangguan/edit_gangguan/'.$g->id_gangguan) ?>">
                                                    <button class='btn btn-default btn-sm' type='submit'>Edit</button>
                                                </form>
                                              <button data-toggle="modal" data-target="#exampleModal" onclick="set_id(<?php echo $g->id_gangguan ?>)" class="btn btn-danger btn-sm">Hapus</button>
                                            </div>
                                            </td>
                                             <?php }?>
                                            <td style="display: none;"><?php echo $this->m_data_gangguan->tampil_layanan($g->id_layanan)->sid ?></td>
                                            <td style="display: none;"><?php echo $g->open_date ?></td>
                                            <td style="display: none;"><?php echo $g->open_time ?></td>
                                            <td style="display: none;"><?php echo $g->close_date ?></td>
                                            <td style="display: none;"><?php echo $g->close_time ?></td>
                                            <td style="display: none;"><?php echo $this->m_data_gangguan->jenislayanan_byid($this->m_data_gangguan->tampil_layanan($g->id_layanan)->id_jenislayanan)->nama_layanan ?></td>
                                        </tr>
                                        
                                        <?php }?>
                                    </tbody>
                                </table>
                                <form action="<?php echo base_url();?>c_gangguan/tampil_searchgangguan">
                                  <button class='btn btn-outline-primary' type='submit' style="margin-bottom: 15px"><i class="fas fa-search" style="margin-right: 10px"></i>Menu Pencarian</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Keterangan-->
   

      </div>
    </div> <!-- MODAL -->

    <!-- Modal Hapus -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data Gangguan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <i class="fa fa-trash fa-4x mb-3 animated bounce"></i>
                              <p style="font-size: 15px">Apakah anda yakin ingin menghapus data gangguan ini?</p>
                            </div>

                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button class="btn btn-default" type="submit" onclick='deletep()'>Ya</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->

              <!-- Modal tampil lokasi-->
              <div class="modal fade" id="ModalZ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Lokasi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                  <tbody>
                                     <tr>
                                        <td><strong>SID</strong></td>
                                        <td style="" id="sid"></td>
                                    </tr>
                                    <tr>
                                       <td style=""><strong>Lokasi</strong></td>
                                      <td style="" id="lokasi"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jenis Layanan</strong></td>
                                       <td style="" id="nama_layanan"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kapasitas</strong></td>
                                       <td style="" id="kapasitas"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama PIC</strong></td>
                                       <td style="" id="nama_pic"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>No Telepon</strong></td>
                                       <td style="" id="no_hp_pic"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                       <td style="" id="email"></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>

                          </div>
                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->


               <!-- Modal Keterangan Jenis Gangguan -->
              <div class="modal fade" id="ModalY" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Keterangan Jenis Gangguan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                  <tbody>
                                     <tr>
                                        <td><strong>Jenis Gangguan</strong></td>
                                        <td style="" id="jenis_gangguan"></td>
                                    </tr>
                                    <tr>
                                       <td style=""><strong>Keterangan</strong></td>
                                      <td style="" id="ket_gangguan"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Deskripsi Jenis Gangguan</strong></td>
                                       <td style="" id="deskripsi_jenisgangguan"></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>

                          </div>
                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->

              <!-- Modal Detail Waktu -->
              <div class="modal fade" id="ModalX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Waktu Gangguan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                  <tbody>
                                     <tr>
                                        <td><strong>Open Date</strong></td>
                                        <td style="" id="open_date"></td>
                                    </tr>
                                    <tr>
                                       <td style=""><strong>Open Time</strong></td>
                                      <td style="" id="open_time"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Close Date</strong></td>
                                       <td style="" id="close_date"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Close Time</strong></td>
                                       <td style="" id="close_time"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Durasi</strong></td>
                                       <td style="" id="durasi"></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>

                          </div>
                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
                                       <input type='hidden' id="id_gangguan" name="id_gangguan" class="form-control" value="<?php echo $g->id_gangguan ?>" />
                                       <input type='hidden' id="open_date" name="open_date" class="form-control" value="<?php echo $g->open_date ?>" />
                                       <input type='hidden' id="open_time" name="open_time" class="form-control" value="<?php echo $g->open_time?>" />
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
                                    <select class="form-control"  id="jenis_gangguan" name="id_jenisgangguan">
                                      <option value="<?php echo $g->id_gangguan ?>">--<?php echo $this->m_data_gangguan->tampil_jenisgangguan_byid($this->m_data_gangguan->get_gangguan_byid($g->id_gangguan)->id_jenisgangguan)->jenis_gangguan ?>--</option>
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
                                            <textarea rows="5" id="penyebab_gangguan" class="form-control" name="penyebab_gangguan" ><?php echo $this->m_data_gangguan->get_gangguan_byid($g->id_gangguan)->penyebab_gangguan ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="solusigangguan" style="display: none;">
                                <div class='col-md-12'>
                                    <div class="form-group">
                                      <label for="date">Solusi :  </label>
                                            <textarea rows="5" id="solusi_gangguan" class="form-control" name="solusi_gangguan"><?php echo $g->solusi_gangguan ?></textarea>
                                        
                                        </div>
                                    </div>
                                </div>
                              <div class="row"  id="lokasigangguan" style="display: none;">
                              <div class='col-md-12'>
                                  <div class="form-group">
                                    <label for="date">Lokasi Gangguan :  </label>
                                          <input type="text" id="lokasi_gangguan" name="lokasi_gangguan" class="form-control" value="<?php echo $g->lokasi_gangguan?>">
                                      
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


             
    <script type="text/javascript">
        $(document).ready( function () {
          $('#example').dataTable({
            dom: '<"top"B>flt<"bottom"p><"clear">',
            buttons: [
                {
                  text: 'Export Excel',
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [1,9,10,11,12,13,7,14,2,3,4,5] // menentukan export kolom ke excel
                    },
                    className: 'btn btn-success mr-3'
                }
            ],
            
            "order": [[ 0, "desc" ]]
          });
        });
        
    </script>

     <script>
        // popovers Initialization
        $(function () {
            $('[data-toggle="popover"]').popover()
        });

        var p_id;
        function set_id(id) {
            p_id = id;

        }

        function deletep(){
            window.location.href =  "<?php echo base_url();?>c_gangguan/hapus_gangguan/"+p_id;
        }

        function detail_waktu(id) {

      $.ajax({
        url: "<?php echo base_url('c_gangguan/detail_waktu/') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          console.table(data);
          $('#id_gangguan').text(data.id_gangguan);
          $('#open_date').text(data.open_date);
          $('#open_time').text(data.open_time);
          $('#close_date').text(data.close_date);
          $('#close_time').text(data.close_time);
          $('#durasi').text(data.durasi);
          
          $('#ModalX').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('gagal mengambil data');
        }
      });
    }

      function ket_jenisgangguan(id) {

      $.ajax({
        url: "<?php echo base_url('c_gangguan/gangguan_data') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          console.table(data);
          $('#deskripsi_jenisgangguan').text(data.deskripsi_jenisgangguan);
          $('#jenis_gangguan').text(data.jenis_gangguan);
          $('#ket_gangguan').text(data.ket_gangguan);
          
          $('#ModalY').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('gagal mengambil data');
        }
      });
    }

    function tampil_lokasi(id) {

      $.ajax({
        url: "<?php echo base_url('c_gangguan/lokasi_data') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          console.table(data);
          $('#sid').text(data.sid);
          $('#lokasi').text(data.lokasi);
          $('#nama_layanan').text(data.nama_layanan);
          $('#kapasitas').text(data.kapasitas);
          $('#nama_pic').text(data.nama_pic);
          $('#no_hp_pic').text(data.no_hp_pic);
          $('#email').text(data.email);

          $('#ModalZ').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('gagal mengambil data');
        }
      });
    }

    function tambah_progress(id) {

      $.ajax({
        url: "<?php echo base_url('c_gangguan/ambil_data_gangguan/') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id_gangguan"]').val(data.id_gangguan);
          $('[name="jenis_gangguan"]').val(data.jenis_gangguan);
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



    </script>


</main>