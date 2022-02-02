<?php
    session_start();
    include('../koneksi.php');
    
    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $pass =$_POST['pass'];
        
        $hasil = mysqli_query($koneksi,"SELECT tingkat FROM users WHERE user = '$username'" );    
        $status = mysqli_fetch_assoc($hasil)['tingkat'];
        
        
        if($status == 1){
            $result = mysqli_query($koneksi,"SELECT * FROM users WHERE user = '$username' AND pass = '$pass' " );
            
            $data = mysqli_fetch_assoc($result);
            
            if (mysqli_num_rows($result) === 1){
                $_SESSION['admin'] = true;
                $_SESSION['pengunjung'] = "admin";
                $_SESSION['login'] = true;
                header("Location: ../admin/index.php");
            }
            else{
                $_SESSION["gagal"] = true;
                header("Location: login.php");
            }
        }
        if($status ==0){
            $result = mysqli_query($koneksi,"SELECT * FROM users WHERE user = '$username' AND pass = '$pass' " );
            
            $data = mysqli_fetch_assoc($result);
            
            if (mysqli_num_rows($result) === 1){
                $_SESSION['user'] = true;
                $_SESSION['admin'] = true;
                $_SESSION['pengunjung'] = $username;
                $_SESSION['login'] = true;
                header("Location: ../pengunjung/home.php");
            }
            else{
                $_SESSION["gagal"] = true;
                header("Location: login.php");
            }
        }
    }
?>