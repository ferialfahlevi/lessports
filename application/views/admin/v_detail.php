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
            <li class="breadcrumb-item active">Detail Post</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Post</div>
              <div class="card-body">
            <h6 class="breadcrumb-item active"><?php echo $this->session->flashdata('errror'); ?></h6>

            <div class="form-group">
              <div class="form-label-group">
                <input readonly type="text" id="kategori" name="kategori" class="form-control" required="required" value="Olahraga <?php echo $row->kategori; ?>">
                <label for="inputEmail">Kategori</label>
              </div>
            </div>

          	<div class="form-group">
              <div class="form-label-group">
                <input readonly type="text" id="judul" name="judul" class="form-control" required="required" value="<?php echo $row->judul; ?>">
                <label for="inputEmail">Judul</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input readonly type="text" id="tanggal_posting" name="tanggal_posting" class="form-control" required="required" value="<?php echo $row->tanggal_posting; ?>">
                <label for="inputEmail">Tanggal Posting</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input readonly type="text" id="penulis" name="penulis" class="form-control" required="required" value="<?php echo $row->penulis; ?>">
                <label for="inputEmail">Penulis</label>
              </div>
            </div>

            

            <div class="form-group">
              <div class="form-label-group">
                <div class="row center">
                  <img src="<?php echo base_url('upload/post/'.$row->gambar); ?>" alt="Post's Image" height="100vh">
                </div>
                <!-- <input readonly type="text" id="gambar" name="gambar" class="form-control" value="<?php echo $row->gambar; ?>">
                <label for="inputEmail">Gambar</label> -->
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <textarea readonly id="isi" name="isi" class="form-control" rows="7"><?php echo $row->isi; ?></textarea>
              </div>
            </div>

            <a class="btn btn-primary btn-block" href="<?php echo base_url('utama/detail')?>/<?php echo $row->id; ?>">Lihat Berita Ini</a>
            <a class="btn bg-success btn-primary btn-block" href="<?php echo base_url('home/editpost')?>/<?php echo $row->id?>">Edit Berita Ini</a>
            <a class="btn bg-danger btn-primary btn-block" href="#" data-toggle="modal" data-target="#delete">Hapus Berita Ini</a>
        </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>

      </div>
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Delete" untuk menghapus postan anda.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('home/delete')?>/<?php echo $row->id; ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php endforeach; ?>
<?php include 'template/footer.php'; ?>