<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'template/home_header.php'
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
      img.a {
        vertical-align: baseline;
      }
    </style>
  </head>

  <body>
    
      <div class="container mt-5 mb-5">
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <h4>Berita <?php echo $this->session->flashdata('error');?></h4>
                <ul class="timeline">
                  <?php foreach($tbl_berita->result() as $row ): ?>
                  <li>
                    <h5><a href="<?php echo base_url('utama/detail')?>/<?php echo $row->id?>"><?php echo $row->judul; ?></a></h5>
                    <a href="#" class="float-right"><?php echo $row->tanggal_posting; ?></a>
                    <br><br>
                    <p style="text-align:center;"><img src="<?php echo base_url('upload/post/'.$row->gambar); ?>" alt="Image" alt="Logo" style="width:40%"></p>
                    
                    <p align="justify"><?php 
                        $hasil = $row->isi; 
                        $snippet = substr($hasil,0,500);
                        echo $snippet;?>....... <a href="<?php echo base_url('utama/detail')?>/<?php echo $row->id?>"> Baca lebih lanjut</a></p>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
  </body>
  
<?php include 'template/footer.php'; ?>