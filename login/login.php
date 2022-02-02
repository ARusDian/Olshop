<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Log-In</title>
</head>
<body>
    <?php 
        session_start();
        
        if (isset($_SESSION["gagal"])) { ?>
            <div class="alert alert-danger" role="alert">
                Username/Password salah!!
            </div>
            <?php } ?>

        <?php if (isset($_GET['pesan'])){ ?>
            <div class="alert alert-danger" role="alert">
                Logout Berhasil!!
            </div>
            <?php } ?>

            <?php session_unset(); ?>
    <div class="container">
        <div class="wrapper">
            <div class="circle1"><span class="fa fa-users"></span></div>
            <div class="color-top">
                <h2>Login</h2>
            </div>
            <form action="cek_login.php" method="POST" >
                <i class="fa fa-user-tie"></i>
                <input type="text" name="username" id="username" >
                <label class="nama" for="" >Username</label>
                <i class="fa fa-lock"></i>
                <input type="password" name="pass" id="password">
                <label class="password" for="" >Password</label>
                <button name="login" type="submit">Login</button>
            </form>
            <div class="submit">
                <a href="../Admin/akun/registrasi.php"><button type="submit">Register</button></a>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/8b70099a2c.js" crossorigin="anonymous"></script>

</body>
</html>