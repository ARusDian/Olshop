<?php 
include('upgambar.php');
include('../../koneksi.php');
if (isset($_POST['save'])) {
      $username = $_POST['username'];
      $name = $_POST['name'];
      $password = $_POST['password'];
      $repass = $_POST['repassword'];
      $status = $_POST['status'];
      
      if ($password != $repass) {
            echo "<script>alert('Password dan Repassword Berbeda !!!')</script>";
            echo"<script> location='registrasi.php'; </script>";
            return false;
      }
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
      echo  "<meta http-equiv='refresh' content='1;url=../../Login/login.php'>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/register.css">
    <title>Log-In</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="circle1"><span class="fa fa-users"></span></div>
            <div class="color-top">
                <h2>Register</h2>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <i class="fa fa-user"></i>
                <input type="text" name="name" id="username" >
                <label class="nama" for="" >Name</label>
                <i class="fa fa-user-o"></i>
                <input type="text" name="username" id="username" >
                <label class="username" for="" >Username</label>

                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password">
                <label class="password" for="" >Password</label>
                <i class="fa fa-unlock-alt"></i>
                <input type="password" name="repassword" id="password">
                <label class="repassword" for="" >Re-Password</label>
                
                <input type="hidden" value="0" name="status">

                <input type="file"  name="gambar">
                
                <label><i class="fa fa-file-image-o" aria-hidden="true"></i>Foto</label>

                <button name="save" type="submit">Register</button>
                <button name="save" type="submit"><a href="../../Login/login.php">Sudah punya akun?</a></button>
            </form>

        </div>
    </div>
    <script src="https://kit.fontawesome.com/8b70099a2c.js" crossorigin="anonymous"></script>

</body>
</html>