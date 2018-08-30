<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Keterangan Jenis Gangguan</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Table -->

                  <a href="<?php echo base_url();?>c_gangguan/form_data_gangguan" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-chevron-left"></span> <b>KEMBALI</b> </a>

                  <br>
                  <br>
                    
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                       <?php foreach($tampil_ket as $tk){ ?>
                                      <tr>
                                        <td><strong>Jenis Gangguan</strong></td>
                                        <td style="width:700px"><?php echo  $this->m_data_gangguan->tampil_jenisgangguan_byid($tk->id_jenisgangguan)->jenis_gangguan ?></td>
                                      </tr>
                                      <tr>
                                        <td style="height:100px"><strong>Keterangan</strong></td>
                                        <td style="width:700px height:100px"><?php echo  $this->m_data_gangguan->tampil_jenisgangguan_byid($tk->id_jenisgangguan)->ket_gangguan ?></td>
                                      </tr>
                                      <tr>
                                        <td><strong>Deskripsi Jenis Gangguan</strong></td>
                                        <td style="width:700px;height:100px"><?php echo $tk->deskripsi_jenisgangguan ?></td>
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


 