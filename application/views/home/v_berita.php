<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'template/home_header.php'
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
        .button {
          background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .button3 {
          background-color: white; 
          color: black; 
          border: 2px solid #ffcc00;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
        	<?php foreach($tbl_berita->result() as $row): ?>
            <div class="col-md-10 offset-md-1">
                <h5><?php echo $row->judul; ?></h5>
                <ul class="timeline">
                  <li>
                    <a href="#" class="float-right"><?php echo $row->tanggal_posting; ?></a>
                    <p>Penulis: <?php echo $row->penulis; ?></p>
                    <br>
                    <p style="text-align:center;"><img src="<?php echo base_url('upload/post/'.$row->gambar); ?>" alt="Image" alt="Logo" style="width:70%"></p>
                    <p align="justify"><?php echo $row->isi;?></p>
                    <p class="button button3"><?php echo $row->reader;?> Read</p>
                  </li>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div>
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1"></div>
            <h4>Komentar</h4>
            <?php foreach($tbl_komentar->result() as $row =>$key): ?>
                <div class="col-md-10 offset-md-1">
                    <br>
                    <!-- <h4><?php echo $key->penulis_komentar; ?></h4> -->
                    <font color="#ffcc00"><?php echo $key->penulis_komentar; ?></font>
                            <!-- <a href="#" class="float-right"><?php echo $key->tanggal_posting; ?></a> -->
                    <p align="justify"><?php echo $key->isi_komentar;?></p>
                </div>
                <br>
            <?php endforeach; ?>
        	<div class="col-lg-12">
			    <div class="row">
			        <div class="col-md-12">
                <div class="hidden">
			            <div class="form-group">
			                <form action="<?php echo base_url('utama/tambah_komentar');?>" method="post">
                                <br>
			                	<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $key->id; ?>">

			                  	<textarea class="form-control" id="isi_komentar" name="isi_komentar" placeholder="Tanggapan anda" required="required"></textarea>

			                	<input type="hidden" id="penulis_komentar" name="penulis_komentar" class="form-control" value="<?php echo $this->session->userdata('nama');?>">

			                  	<div class="col-lg-12 text-center">
				        			<div id="success"></div><br><br>
				        			<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Kirim Tanggapan Anda</button>
				    			</div>
			                </form>
			        	</div>
                </div>
			    	<div class="clearfix"></div>
			    </div>
			</div>
        </div>
      </div>
    </section>
    </div>
</body>
</html>
<?php include 'template/footer.php'; ?>