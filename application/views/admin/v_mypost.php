<?php include 'template/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Post - Les Sports</title>
</head>
<body>
  <div id="content-wrapper">
    <div class="container-fluid">
    	<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('home/admin');?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Post</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              My Post</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Tanggal Posting</th>
                      <!-- <th></th>
                      <th></th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Tanggal Posting</th>
                      <!-- <th></th>
                      <th></th> -->
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php foreach($tbl_berita->result() as $row ): ?>
                    <tr>
                      <td><a href="<?php echo base_url('home/detail')?>/<?php echo $row->id?>"><?php echo $row->judul; ?></a></td>
                      <td><?php echo $row->kategori; ?></td>
                      <td><?php echo $row->tanggal_posting; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

    </div>

  </div>
</body>
</html>
<?php include 'template/footer.php'; ?>