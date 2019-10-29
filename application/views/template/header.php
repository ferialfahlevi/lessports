<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $cek = $this->session->userdata('status');
    if ($cek != 'login') {
      echo "<style type='text/css'>
          .hidden {
          display: none;
          }
        </style>";
    } elseif ($cek == 'login') {
      $jenis = $this->session->userdata('jenis_akun');
        if ($jenis == 'biasa') {
          echo "<style type='text/css'>
          .show {
          display: none;
          }
        </style>";
        } 
          elseif ($jenis == 'admin') {
            echo "<style type='text/css'>
          .show {
          display: none;
          }
        </style>";
          }
      
    } ?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url();?>assets/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/home/css/agency.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Les Sports</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger portfolio-link" data-toggle="modal" href="#portfolioModal6">Cabang Olahraga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Mengenai Les Sports</a>
            </li>
            <li class="nav-item">
              <div class="hidden">
                <a class="nav-link js-scroll-trigger" href="<?php
                  $jenis = $this->session->userdata('jenis_akun');
                  if ($jenis == 'admin') {
                    echo base_url('home/admin');
                  }
                ?>"><?php echo $this->session->userdata('nama');?></a>
              </div>
              
            </li>
            <li class="nav-item">
              <div class="hidden">
                <a class="nav-link portfolio-link" data-toggle="modal" href="#portfolioModal1">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <div class="show">
                <a class="nav-link portfolio-link" data-toggle="modal" href="#portfolioModallogin">Login</a>
              </div>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>assets/home/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/home/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url();?>assets/home/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>assets/home/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url();?>assets/home/js/agency.min.js"></script>

  </body>
