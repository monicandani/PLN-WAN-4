<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>PLN</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js')?>"></script>
     <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.css" type="text/css" />
    <script src="<?php echo base_url();?>/assets/datatables/jquery.dataTables.min.js" type="text/javascript"></script>  <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  
</head>
<body style="width: auto; font-family: Trebuchet MS" ">
    <header>
        <div style="width: 900px" class="container">
            <div  class="row">
                <div  class="col-md-12">
                    <strong ></strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    
    <nav class="navbar navbar-inverse set-radius-zero" >

  <center><img style="height: 120px;width: 120px" src="<?php echo base_url();?>/assets/img/pln.jpg"width="1350px" class="image1 mt-2"></center>
</nav>
</div>
</div>
</div>

            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a  href="<?php echo base_url();?>c_main/home">Beranda</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Data <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?php echo base_url();?>c_gangguan/form_data_gangguan" style="color: black">Gangguan</a></li>
                                  <li><a href="<?php echo base_url();?>c_keluhan/form_data_keluhan" style="color: black">Keluhan</a></li>
                                </ul>
                            </li>  
                            <!-- wey -->
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pencarian <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?php echo base_url();?>c_gangguan/tampil_searchgangguan" style="color: black">Data Gangguan</a></li>
                                  <li><a href="<?php echo base_url();?>c_keluhan/tampil_searchkeluhan" style="color: black">Data Keluhan</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelola <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?php echo base_url();?>c_gangguan/jenisgangguan" style="color: black">Jenis Gangguan</a></li>
                                  <li><a href="<?php echo base_url();?>c_keluhan/jeniskeluhan" style="color: black">Jenis Keluhan</a></li>
                                  <li><a href="<?php echo base_url();?>c_layanan/jenislayanan" style="color: black">Jenis Layanan</a></li>
                                  <li><a href="<?php echo base_url();?>c_layanan/form_layanan" style="color: black">Layanan</a></li>
                                  <li class="divider"></li>
                                  <li><a href="<?php echo base_url();?>c_user/user" style="color: black">Akun</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>c_main/logout">Keluar</a></li>
                        </ul>
                    </div>
                </div>
                        

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->