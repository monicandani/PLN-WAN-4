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
    <title><?php echo $title ?></title>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" /> -->

    <!-- timepicker -->
    <!-- <link href="<?php //echo base_url('assets/css/default.css')?>" rel="stylesheet" />
    <link href="<?php //echo base_url('assets/css/default.time.css')?>" rel="stylesheet" /> -->

   

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- FONT AWESOME ICONS  -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="<?php //echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />

    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" />
    <script src="<?php //echo base_url('assets/js/jquery-1.11.1.js')?>"></script>
    <!-- <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->

    <!-- DataTables plugin start -->
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.min.css">
    
    <!-- JS -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.bootstrap.js"></script> -->
    <!-- DataTables plugin end -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <!-- <script src="<?php echo base_url();?>/assets/datatables/jquery.dataTables.min.js" type="text/javascript"></script>  -->
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  
</head>
<body style="width: auto; font-family: Trebuchet MS">
    <!-- LOGO HEADER-->
   <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <a class="media-left" href="http://pln.co.id/">
                    <img style="padding-top: 20px; padding-bottom: 20px" src="<?php echo base_url();?>assets/img/pln3.png" />
                </a>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <?php 
                                if($status_user == 'Admin') {
                                    echo"
                                    <li class='nav-item'> 
                                    <a  class='nav-link' href=".base_url('c_main/home')." style='color:white' >BERANDA</a>
                                    </li>
                                    <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:white'>DATA</a>
                                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                            <a class='dropdown-item' href=".base_url('c_gangguan/form_data_gangguan')." style='color: black'>GANGGUAN</a>
                                            <a class='dropdown-item' href=".base_url('c_keluhan/form_data_keluhan')." style='color: black'>KELUHAN</a>
                                            <div class='dropdown-divider'></div>
                                            <a  class='dropdown-item' href=".base_url('c_gangguan/history_gangguan')." style='color: black'>HISTORI GANGGUAN</a>
                                      
                                            </div>
                                        </li>    
                                    ";
                                } elseif($status_user=='User' || $status_user=='Petugas'){
                                    echo"
                                    <li class='nav-item'>
                                    <a class='nav-link' href=".base_url('c_main/home_user')." style='color:white'>BERANDA</a></li>";
                                }
                                ?>
                                <li class='nav-item dropdown'>
                                    <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:white'>PENCARIAN</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="<?php echo base_url();?>c_gangguan/tampil_searchgangguan" style="color: black">DATA GANGGUAN</a>
                                      <a class="dropdown-item" href="<?php echo base_url();?>c_keluhan/tampil_searchkeluhan" style="color: black">DATA KELUHAN</a>
                                  </div>
                                </li>
                                <?php 
                                if ($status_user == 'Admin') {
                                    echo " <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:white' >MASTER DATA</a>
                                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href=".base_url('c_gangguan/jenisgangguan')." style='color: black'>KATEGORI GANGGUAN</a>
                                    <a class='dropdown-item' href=".base_url('c_keluhan/jeniskeluhan')." style='color: black'>KATEGORI KELUHAN</a>
                                    <a class='dropdown-item' href=".base_url('c_layanan/jenislayanan')." style='color: black'>KATEGORI LAYANAN</a>
                                    <a class='dropdown-item' href=".base_url('c_layanan/form_layanan')." style='color: black'>LAYANAN</a>
                                    <a class='dropdown-item' href=".base_url('c_user/user')." style='color: black'>PENGGUNA</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href=".('https://drive.google.com/open?id=17IpB62pc7YjAUHb6Rqw44mj0hrQgzUbm')." style='color: black' method='post' target='_blank'>USER MANUAL</a>
                                    
                                    </div>
                                </li>";
                                }   
                                 ?>
                                <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url();?>c_main/logout" style='color:white' >KELUAR</a></li>
                            </ul>
                        </div>
                    </nav>
                </body>
    <!-- MENU SECTION END-->
