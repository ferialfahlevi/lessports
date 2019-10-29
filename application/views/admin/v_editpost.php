<?php 
include 'template/header.php'; 
foreach($tbl_berita->result() as $row ):
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $row->judul; ?> - Les Sports</title>
</head>
<body>
  <div id="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('home/admin');?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Post</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Edit Post</div>
              <div class="card-body">
                <form action="<?php echo base_url('home/update')?>/<?php echo $row->id; ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
              <div class="form-label-group">
                <input type="text" hidden="true" id="id" name="id" class="form-control" required="required" value="<?php echo $row->id; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" readonly id="kategori" name="kategori" class="form-control" required="required" value="Olahraga <?php echo $row->kategori; ?>">
                <label for="inputEmail">Kategori</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="judul" name="judul" class="form-control" required="required" value="<?php echo $row->judul; ?>">
                <label for="inputEmail">Judul</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" readonly id="tanggal_posting" name="tanggal_posting" class="form-control" required="required" value="<?php echo $row->tanggal_posting; ?>">
                <label for="inputEmail">Tanggal Posting</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" readonly id="penulis" name="penulis" class="form-control" required="required" value="<?php echo $row->penulis; ?>">
                <label for="inputEmail">Penulis</label>
              </div>
            </div>

            

            <div class="form-group">
              <div class="form-label-group">
                <div class="row center">
                  <img src="<?php echo base_url('upload/post/'.$row->gambar); ?>" alt="Post's Image" height="100vh">
                </div>
                <br>
                <input name="image" type="file" id="file" class="form-control">
                
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <textarea id="isi" name="isi" class="form-control" rows="7"><?php echo $row->isi; ?></textarea>
              </div>
            </div>

            <button class="btn btn-primary btn-block">Perbaharui Berita</button>

                </form>
        </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>

      </div>
</body>
</html>
<?php endforeach; ?>
<?php include 'template/footer.php'; ?>