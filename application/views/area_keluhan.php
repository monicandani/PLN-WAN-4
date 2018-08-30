<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Lokasi</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                            <?php foreach($tampil_layanan as $tl){ ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SID</th>
                                            <th>Lokasi</th>
                                            <th>Jenis Layanan</th>
                                            <th>Kapasitas</th>
                                            <th>Nama PIC</th>
                                            <th>Nomer Telpon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $tl->sid ?></td>
                                            <td><?php echo $tl->lokasi ?></td>
                                            <!-- <td><?php //echo $tl->id_jenislayanan ?></td> -->
                                            <td><?php echo $this->m_data_keluhan->tampil_jenislayanan($tl->id_jenislayanan)->nama_layanan ?></td>
                                            <td><?php echo $tl->kapasitas ?></td>
                                            <td><?php echo $tl->nama_pic ?></td>
                                            <td><?php echo $tl->no_hp_pic ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <br>
                                <a href="<?php echo base_url();?>c_keluhan/form_data_keluhan" class="btn btn-default"><span class="glyphicon glyphicon-hand-left"></span> &nbsp; KEMBALI </a>&nbsp;
                                <br>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>
        </div>
    </div>

</main>