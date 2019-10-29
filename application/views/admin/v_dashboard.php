<?php include 'template/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Les Sports</title>
</head>
<body>
  <div id="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Lihat berita yang telah kamu tulis</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('home/mypost')?>/<?php echo $this->session->userdata('username'); ?>">
                  <span class="float-left">Lihat berita</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Kamu telah menulis sebanyak <?php echo $hitung;?> berita</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('home/newpost'); ?>">
                  <span class="float-left">Buat berita lainnya!</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <?php echo $this->session->flashdata('coba');?>

          

        </div>

      </div>
</body>
</html>
<?php include 'template/footer.php'; ?>