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
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="width: auto; font-family: Trebuchet MS" >
    
    <!-- HEADER END-->
    
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
       <header>
        <div style="width: 300px" style="margin-bottom: 100px" class="container">
            <div  class="row">
                <div  class="col-md-12">
                    <strong >SISTEM PENCATATAN GANGGUAN WAN</strong>
                </div>

            </div>
        </div>
    </header>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                
            </div>
            <?php echo form_open('c_login/aksi_login'); ?>
                <div class="col-md-3"></div>
                <div class="col-md-6 col-sm-6" style="margin-right:200 ; margin-left:200; margin-top:50px; ">
                    <div class="panel panel-primary" style="box-shadow: 8px 8px 5px #888888">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Masuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                        </div>
                        <div class="panel-body">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input placeholder="ID Karyawan" type="text" name="no_karyawan" id="id_karyawan" class="form-control" />
                        </div>
                        <p>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input placeholder="Password" type="password" name="password" id="password" class="form-control" />
                        </div>
                        <hr />
                      
                        <button style="box-shadow: 8px 8px 5px #888888;" class="btn btn-info" type="submit"> <span class="glyphicon glyphicon-user"></span> &nbsp;Masuk </button>&nbsp;
                    </p>
                    <hr />
                        </div>
                </div>
            </div>
        </form>
                     
                        
                    </div>
                </div>
              </div>
                       </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2018 | By : <a href="https://www.instagram.com/default_unj/" target="_blank">DEFAULT</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js')?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
    
</body>
</html>
