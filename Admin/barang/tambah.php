<?php 
include('UPgambar.php');
include('../../koneksi.php');
if (isset($_POST['save'])) {
      $nama = $_POST['nama'];
      $gambar = uploadImage();
      $harga = $_POST['harga'];
      $stok = $_POST['stok'];
      $deskripsi = $_POST['deskripsi'];
      $jenis = $_POST['jenis'];
  
      if (!$gambar) {
          
          echo"<script> location='index.php'; </script>";
          return false;
      }
  
      $result = mysqli_query($koneksi,
      "INSERT INTO barang (nama,gambar,jenis,deskripsi,harga,stok) VALUES 
      ('$nama','$gambar','$jenis','$deskripsi','$harga','$stok')");
  
      echo  "<div class='alert alert-info'>Data Tersimpan</div>";
      echo  "<meta http-equiv='refresh' content='1;url=index.php'>";
  }

?>

<!-- HTML FORM -->
<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
            <div class="panel-heading">
                  <h5><b>Tambah barang</b></h5>
            </div>

            <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                              <label>Harga (Rp)</label>
                              <input type="number" class="form-control" name="harga">
                        </div>
                        <div class="form-group">
                              <label>Stok</label>
                              <input type="number" class="form-control" name="stok">
                        </div>
                        <div class="form-group">
                              <label>Kategori</label>
                              <select name="jenis" size="value" class="form-control select2">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Gaming">Gaming</option>
                                    <option value="Olahraga">Olahraga</option>
                              </select>
                        </div>
                        <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea name="deskripsi" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                              <label>Foto</label>
                              <input type="file" class="form-control" name="gambar">
                        </div>
                        <button class="btn btn-primary" name="save"><img src="../../assets/icon/Centang.png"width="40px;" height="40px;"  >Tambahkan</button>
                  </form>
            </div>
      </div>
</div>
