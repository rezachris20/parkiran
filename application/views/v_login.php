<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/normalize.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/themify-icons.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/flag-icon.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/cs-skin-elastic.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/scss/style.css' ?>">


</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo1.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <?php
                if (isset($_GET['pesan']))
                {
                  if ($_GET['pesan'] == "gagal")
                  {
                    echo '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            Username dan password salah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                  }
                  elseif ($_GET['pesan'] == "logout")
                  {
                    echo  '<div class="alert  alert-success alert-dismissible fade show" role="alert">
                            Anda telah logout.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                  }
                  elseif($_GET['pesan'] == "belumlogin")
                  {
                    echo '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            Anda belum login.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                  }
                } 
              ?>
                    <form method="POST" action="<?php echo base_url().'login/admin' ?> ">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url().'assets/js/vendor/jquery-2.1.4.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/js/popper.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/js/plugins.js' ?>"></script>
    <script src="<?php echo base_url().'assets/js/main.js' ?>"></script>


</body>
</html>
