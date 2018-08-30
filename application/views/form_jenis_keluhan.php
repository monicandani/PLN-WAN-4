<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Keterangan Jenis Keluhan</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Table -->

                  <a href="<?php echo base_url();?>c_keluhan/form_data_keluhan" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-chevron-left"></span> <b>KEMBALI</b> </a>

                  <br>
                  <br>
                    
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                       <?php foreach($tampil_ket as $tk){ ?>
                                      <tr>
                                        <td><strong>Jenis Keluhan</strong></td>
                                        <td style="width:700px"><?php echo  $this->m_data_keluhan->tampil_jeniskeluhan_byid($tk->id_jeniskeluhan)->jenis_keluhan ?></td>
                                      </tr>
                                      <tr>
                                        <td style="height:100px"><strong>Keterangan</strong></td>
                                        <td style="width:700px height:100px"><?php echo  $this->m_data_keluhan->tampil_jeniskeluhan_byid($tk->id_jeniskeluhan)->ket_keluhan ?></td>
                                      </tr>
                                      <tr>
                                        <td><strong>Deskripsi Jenis Keluhan</strong></td>
                                        <td style="width:700px;height:100px"><?php echo $tk->deskripsi_jeniskeluhan ?></td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- Table  -->
                </div>
            </div>
        </div>
    </div>


 