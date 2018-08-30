<main>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit Layanan </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br/>
                    <?php foreach($jenislayanan as $jl){ ?>
                    <form action="<?php echo base_url();?>c_layanan/update_jenislayanan" method="post">
                        <div class="form-group">
                          <label>Nama Jenis Layanan <font color="red">*</font></label>
                          <input type="hidden" style="width:500px" class="form-control" name="id_jenislayanan" value="<?php echo $jl->id_jenislayanan ?>">
                          <input style="width:500px" class="form-control" id="ID" type="text" name="nama_layanan" value="<?php echo $jl->nama_layanan ?>">
                        </div>
                        <hr/>
                          <button type="submit" class="btn btn-default btn-lg">SIMPAN</button>
                        </label>
                      </div>
                    </form>
                        <?php } ?>
                        </div>
                        </div>  
                      </div>
                    </div>
                  </div>

</main>