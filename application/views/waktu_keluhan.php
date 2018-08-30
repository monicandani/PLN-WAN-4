<main>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Waktu Keluhan</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                            <?php foreach($tampil_waktu as $tw){ ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Open Date</th>
                                            <th>Open Time</th>
                                            <th>Close Date</th>
                                            <th>Close Time</th>
                                            <th>Durasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $tw->open_date ?></td>
                                            <td><?php echo $tw->open_time ?></td>
                                            <td><?php echo $tw->close_date ?></td>
                                            <td><?php echo $tw->close_time ?></td>
                                            <td><?php echo $tw->durasi ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                                <!-- back -->
                                <br>
                                <a href="<?php echo base_url();?>c_keluhan/form_data_keluhan" class="btn btn-default"><span class="glyphicon glyphicon-hand-left"></span> &nbsp; KEMBALI </a>&nbsp;
                                <br>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div> <!-- container -->
        </div>


</main>