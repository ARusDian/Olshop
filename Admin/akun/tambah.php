<?php 
include('UPgambar.php');
include('../../koneksi.php');
if (isset($_POST['save'])) {
      $username = $_POST['username'];
      $name = $_POST['name'];
      $password = $_POST['password'];
      $status = $_POST['status'];
      
      $gambar = uploadImage();
      if (!$gambar) {
            $result = mysqli_query($koneksi,
            "INSERT INTO users (username,user,gambar,pass,tingkat) VALUES 
            ('$name','$username','default.png','$password','$status')");
      }
      else{
      $result = mysqli_query($koneksi,
            "INSERT INTO users (username,user,gambar,pass,tingkat) VALUES 
            ('$name','$username','$gambar','$password','$status')");
      }
      echo  "<div class='alert alert-info'>Data Tersimpan</div>";
      echo  "<meta http-equiv='refresh' content='1;url=index.php'>";
  }

?>

<!-- HTML FORM -->
<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
            <div class="panel-heading">
                  <h5><b>Tambah Akun</b></h5>
            </div>

            <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                              <label>username</label>
                              <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                              <label>password</label>
                              <input type="text" class="form-control" name="password">
                        </div>
                        <div>Status Akun
                              <select name="status" size="value">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                              </select>
                        </div>
                        <div class="form-group">
                              <label>Foto</label>
                              <input type="file" class="form-control" name="gambar">
                        </div>
                        <button class="btn btn-primary" name="save"><img src="../../assets/icon/Centang.png"width="40px;" height="40px;"  >Tambah</button>
                  </form>
            </div>
      </div>
</div>
