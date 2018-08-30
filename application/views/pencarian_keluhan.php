<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Hasil Pencarian Data Keluhan</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                            <a href="<?php echo base_url();?>c_keluhan/form_tambah_keluhan" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus-sign"></span> <b>TAMBAH</b> </a>
                            <div class="table-responsive" style="margin-top: 20px">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Area</th>
                                            <th>Jenis Keluhan</th>
                                            <th>Penyebab</th>
                                            <th>Solusi</th>
                                            <th>Waktu Keluhan</th>
                                            <?php if ($status_user == 'Admin') {
                                              echo "<th style='width:50px'></th>";
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        foreach($keluhan as $k ) {

                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php //echo anchor('c_keluhan/tampil_lokasi/'.$k->sid,'Area '.$this->m_data_keluhan->tampil_layanan($k->sid)->lokasi); ?>
                                              <button onclick='tampil_lokasi(<?php echo $k->sid ?>)' id="btn-edit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ModalZ">Area <?php echo $this->m_data_keluhan->tampil_layanan($k->sid)->lokasi ?></button>
                                             </td>
                                            <td>
                                              <?php if ($k->id_jeniskeluhan=="10") {
                                              echo "<p style='color:'>Belum Teridentifikasi</p>";
                                              } else {
                                                ?>
                                                 <button onclick='ket_jeniskeluhan(<?php echo $k->id_keluhan ?>)' id="btn-edit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ModalY"><?php echo $this->m_data_keluhan->tampil_jeniskeluhan_byid($k->id_jeniskeluhan)->jenis_keluhan ?></button>
                                              <?php  } ?>
                                            </td>
                                            <td><?php echo $k->penyebab_keluhan ?></td>
                                            <td><?php echo $k ->solusi_keluhan ?></td>
                                            <!-- <td><a class="btn btn-primary" href="<?php //echo base_url();?>c_main/waktu">Lihat</button></a></td> -->
                                            <td>
                                                 <!-- <form method='' action="<?php //echo base_url('c_keluhan/tampil_waktu/'.$k->id_keluhan)?>">
                                                     <button class='btn btn-primary' type='submit'>Detail</button>
                                                                                                 </form> -->
                                              <button onclick='detail_waktu(<?php echo $k->id_keluhan ?>)' id="btn-edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalX">Detail</button>
                                            </td>
                                            <?php if ($status_user == 'Admin') {
                                             ?>
                                            <td>
                                              <div class="btn-group">
                                                 <form method='' action="<?php echo base_url('c_keluhan/edit_keluhan/'.$k->id_keluhan) ?>">
                                                    <button class='btn btn-default' type='submit'>Edit</button>
                                                </form>
                                            <button data-toggle="modal" data-target="#exampleModal" onclick="set_id(<?php echo $k->id_keluhan ?>)" class="btn btn-danger">Hapus</button>
                                          </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url();?>c_keluhan/tampil_searchkeluhan" class="btn btn-default"> Menu Pencarian </a>&nbsp;
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
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data Keluhan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <i class="fa fa-trash fa-4x mb-3 animated bounce"></i>
                              <p style="font-size: 15px">Apakah anda yakin ingin menghapus data keluhan ini?</p>
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

   <!-- Modal Detail Waktu -->
              <div class="modal fade" id="ModalX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Waktu Keluhan</h5>
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

              <!-- Modal Keterangan Jenis Keluhan -->
              <div class="modal fade" id="ModalY" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Keterangan Jenis Keluhan</h5>
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
                                        <td><strong>Jenis Keluhan</strong></td>
                                        <td style="" id="jenis_keluhan"></td>
                                    </tr>
                                    <tr>
                                       <td style=""><strong>Keterangan</strong></td>
                                      <td style="" id="ket_keluhan"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Deskripsi Jenis Gangguan</strong></td>
                                       <td style="" id="deskripsi_jeniskeluhan"></td>
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






    <script type="text/javascript">
        $(document).ready( function () {
        $('#example').DataTable();
    } );
        $('#example').dataTable({
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
            window.location.href =  "<?php echo base_url();?>c_keluhan/hapus_keluhan/"+p_id;
        }


       function detail_waktu(id) {

      $.ajax({
        url: "<?php echo base_url('c_keluhan/detail_waktu/') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          console.table(data);
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

    function ket_jeniskeluhan(id) {

      $.ajax({
        url: "<?php echo base_url('c_keluhan/keluhan_data') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          console.table(data);
          $('#deskripsi_jeniskeluhan').text(data.deskripsi_jeniskeluhan);
          $('#jenis_keluhan').text(data.jenis_keluhan);
          $('#ket_keluhan').text(data.ket_keluhan);
          
          $('#ModalY').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('gagal mengambil data');
        }
      });
    }

    function tampil_lokasi(id) {

      $.ajax({
        url: "<?php echo base_url('c_keluhan/lokasi_data') ?>/" + id,
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


    </script>
