<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/agency.min.css" rel="stylesheet">
    <style type="text/css">
      ul.timeline {
        list-style-type: none;
        position: relative;
      }
      ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 0px;
        width: 2px;
        height: 100%;
        z-index: 400;
      }
      ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
      }
      ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: -9px;
        width: 20px;
        height: 20px;
        z-index: 400;
      }

    </style>

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
          .hidden {
          display: none;
          }
        </style>";
          }
      
    } ?>

    

  </head>

  <body id="page-top">

    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Apakah anda ingin logout?</h2>
                  <a class="btn btn-primary" href="<?php echo base_url('utama/action_logout'); ?>">
                    Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
              <div class="show">
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

    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-uppercase">Les Sports!</div>
          <a class="btn btn-primary btn-xl text-uppercase portfolio-link" data-toggle="modal" href="#portfolioModal6">Timeline</a>
        </div>
      </div>
    </header> 

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Pilih Kategori Olahraga</h2>
                  <section id="portfolio">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-3 col-sm-4 portfolio-item">
                          <a class="portfolio-link" data-toggle="modal" href="<?php echo base_url('utama/timeline/atletik') ?>">
                            <div class="portfolio-hover">

                            </div>
                            <img class="img-fluid" src="<?php echo base_url();?>assets/home/img/portfolio/01-thumbnail.jpg" alt="">
                          </a>
                          <div class="portfolio-caption">
                            <h4>Atletik</h4>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 portfolio-item">
                          <a class="portfolio-link" data-toggle="modal" href="<?php echo base_url('utama/timeline/bola') ?>">
                            <div class="portfolio-hover">

                            </div>
                            <img class="img-fluid" src="<?php echo base_url();?>assets/home/img/portfolio/02-thumbnail.jpg" alt="">
                          </a>
                          <div class="portfolio-caption">
                            <h4>Bola</h4>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 portfolio-item">
                          <a class="portfolio-link" data-toggle="modal" href="<?php echo base_url('utama/timeline/air') ?>">
                            <div class="portfolio-hover">

                            </div>
                            <img class="img-fluid" src="<?php echo base_url();?>assets/home/img/portfolio/03-thumbnail.jpg" alt="">
                          </a>
                          <div class="portfolio-caption">
                            <h4>Air</h4>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 portfolio-item">
                          <a class="portfolio-link" data-toggle="modal" href="<?php echo base_url('utama/timeline/udara') ?>">
                            <div class="portfolio-hover">

                            </div>
                            <img class="img-fluid" src="<?php echo base_url();?>assets/home/img/portfolio/04-thumbnail.jpg" alt="">
                          </a>
                          <div class="portfolio-caption">
                            <h4>Udara</h4>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 portfolio-item">
                          <a class="portfolio-link" data-toggle="modal" href="<?php echo base_url('utama/timeline/beladiri') ?>">
                            <div class="portfolio-hover">

                            </div>
                            <img class="img-fluid" src="<?php echo base_url();?>assets/home/img/portfolio/05-thumbnail.jpg" alt="">
                          </a>
                          <div class="portfolio-caption">
                            <h4>Bela Diri</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="portfolio-modal modal fade" id="portfolioModallogin" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">LOGIN</h2>
                  <p class="item-intro text-muted">Masuk sebagai akun untuk mendapatkan berita menarik seputar olahraga.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo base_url();?>assets/home/img/portfolio/login-full.jpg" alt="">
                  <form action="<?php echo base_url('utama/action_login'); ?>" method="post">
                    <div class="form-group">
                    <input class="col-lg-12 form-control" id="username" name="username" type="text" placeholder="Username" required="required">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="col-lg-12 form-control" id="password" name="password" type="Password" placeholder="Password" required="required">
                      <p class="help-block text-danger"></p>
                    </div>
                    <button class="btn btn-primary" type="submit">
                      Login
                    </button>
                  </form>
                    <br>
                  <ul class="list-inline">
                    <br>
                    <li>Belum punya akun?</li>
                    <li>Klik <a data-dismiss="modal" data-toggle="modal" href="#portfolioModalregister">disini.</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url();?>assets/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url();?>assets/js/agency.min.js"></script>

  </body>
