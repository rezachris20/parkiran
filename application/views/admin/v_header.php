<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Parkiran Kendaraan</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/normalize.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/themify-icons.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/flag-icon.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/cs-skin-elastic.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/scss/style.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/scss/socials.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/lib/datatable/dataTables.bootstrap.min.css' ?>">
    <link href="<?php echo base_url().'assets/css/lib/vector-map/jqvmap.min.css' ?>" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/lib/chart-js/Chart.bundle.js' ?>"></script>




</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                
                <br>
                <img style="width: 50%" src="images/<?php echo $this->session->userdata('foto'); ?>" alt="Logo">

                <p style="color: white;"><?php echo $this->session->userdata('nama'); ?></p>
                
                <p style="color: white;"><?php echo $this->session->userdata('id_karyawan'); ?></p>
              
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo base_url().'pelanggan' ?>"> <i class="menu-icon fa fa-user"></i>Data Pelanggan </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'parkir' ?>"> <i class="menu-icon fa fa-car"></i>Parkir </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file"></i><a href="<?php echo base_url().'rmobilmasuk' ?>">Mobil Masuk/Keluar</a></li>
                            <li><i class="fa fa-file"></i><a href="<?php echo base_url().'rmobilinap' ?>">Mobil Inap</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Data Statistik</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-bar-chart-o"></i><a href="<?php echo base_url().'hstatistik' ?>">Perhari</a></li>
                            <li><i class="fa fa-bar-chart-o"></i><a href="<?php echo base_url().'bstatistik' ?>">Perbulan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'home/logout' ?>"> <i class="menu-icon fa fa-sign-out"></i> Logout </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

          

        </header><!-- /header -->
        <!-- Header-->