<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Pengguna </h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->

                  <a href="<?php echo base_url();?>c_user/tambah_user" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus-sign"></span> <b>TAMBAH</b> </a>

                  <br>
                  <br>
                    
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>ID Karyawan</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th style="width:50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                        $no=1;
                                        foreach($user as $u ) {

                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->no_karyawan ?></td>
                                            <td><?php echo $u->password ?></td>
                                            <td><?php echo $u->status_user ?></td>
                                            <td>
                                              <div class="btn-group">
                                              <form method='' action="<?php echo base_url('c_user/edit_user/'.$u->id_karyawan) ?>">
                                                 <button class='btn btn-default' type='submit'>Edit</button>
                                               </form>
                                              <button data-toggle="modal" data-target="#exampleModal" onclick="set_id(<?php echo $u->id_karyawan ?>)" class="btn btn-danger">Hapus</button>
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
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <i class="fa fa-trash fa-4x mb-3 animated bounce"></i>
                              <p style="font-size: 15px">Apakah anda yakin ingin menghapus akun ini?</p>
                            </div>

                          </div> <!-- modal body -->
                          <div class="modal-footer">
                              <button class="btn btn-default" type="submit" onclick='deletep()'>Ya</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                      </div>
                  </div>
              </div><!-- modal -->

<script type="text/javascript">
    $(document).ready( function () {
    $('#example').DataTable();
} );
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
        window.location.href =  "<?php echo base_url();?>c_user/hapus_user/"+p_id;
    }
</script>

</main>