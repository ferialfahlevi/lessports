<?php include 'template/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>New Post - Les Sports</title>
</head>
<body>
  <div id="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('home/admin');?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">New Post</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              New Post</div>
              <div class="card-body">
          <form action="<?php echo base_url('home/add_post'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <input readonly id="kategori" name="kategori" class="form-control" required="required" value="<?php echo $this->session->userdata('kategori');?>">
                <label for="inputEmail">Kategori</label>
              </div>
            </div>

          	<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="judul" name="judul" class="form-control" required="required">
                <label for="inputEmail">Judul</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input readonly type="hidden" id="penulis" name="id_penulis" class="form-control" required="required" value="<?php echo $this->session->userdata('username');?>">
                <input readonly type="text" id="penulis" name="penulis" class="form-control" required="required" value="<?php echo $this->session->userdata('nama');?>">
                <label for="inputEmail">Penulis</label>
              </div>
            </div>

            <input type="hidden" id="tanggal_posting" name="tanggal_posting" class="form-control" placeholder="tanggal" required="required" value="<?php $today = date("y-m-d"); echo $today;?>">

            <div class="form-group">
              <div class="form-label-group">
                <input type="file" id="image" name="image" class="form-control" required="required">
                <label for="inputEmail">Gambar</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <textarea id="isi" name="isi" class="form-control" rows="7" placeholder="Isi Artikel" required="required"></textarea>
              </div>
            </div>

            <button class="btn btn-primary btn-block">Submit New Post</button>
          </form>
        </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>

      </div>
</body>
</html>
<?php include 'template/footer.php'; ?>