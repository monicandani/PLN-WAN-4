<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Layanan</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                         <a style="margin-bottom: 10px" href="<?php echo base_url();?>c_layanan/form_tambah_layanan" class="btn btn-primary btn-md"><span class="fa fa-plus"></span> <b>TAMBAH</b> </a>
                          <table id="example"  class="table table-striped table-hover" style="margin-top: 25px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>SID</th>
                                            <th>Lokasi</th>
                                            <th>Jenis Layanan</th>
                                            <th>Kapasitas</th>
                                            <th>Nama PIC</th>
                                            <th>No HP</th>
                                            <th>E-mail</th>
                                            <th style="width:50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        foreach($layanan as $l ) {

                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $l->sid ?></td>
                                            <td>Area <?php echo $l->lokasi ?></td>
                                            <td><?php echo $this->m_data_layanan->tambah_jenislayanan($l->id_jenislayanan)->nama_layanan ?></td>
                                            <td><?php echo $l->kapasitas ?></td>
                                            <td><?php echo $l->nama_pic ?></td>
                                            <td><?php echo $l->no_hp_pic ?></td>
                                            <td><?php echo $l->email ?></td>
                                            <td>
                                              <div class="btn-group">
                                                 <form method='' action="<?php echo base_url('c_layanan/edit_layanan/'.$l->id_layanan) ?>">
                                                    <button class='btn btn-default' type='submit'>Edit</button>
                                                </form>
                                                <button data-toggle="modal" data-target="#exampleModal" onclick="set_id(<?php echo $l->id_layanan ?>)" class="btn btn-danger">Hapus</button>
                                              </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
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
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Area</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <i class="fa fa-trash fa-4x mb-3 animated bounce"></i>
                              <p style="font-size: 15px">Apakah anda yakin ingin menghapus area ini?</p>
                            </div>

                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button class="btn btn-default" type="submit" onclick='deletep()'>Ya</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->

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
        window.location.href =  "<?php echo base_url();?>c_layanan/hapus_layanan/"+p_id;
    }
</script>

<script type="text/javascript">
      $(document).ready( function () {
      $('#example').DataTable();
  } );
      $('#example').dataTable({
    });
</script>



</main>