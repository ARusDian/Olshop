<?php 
include('../../koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");

$data = mysqli_fetch_assoc($result);

$gambaruser = $data['gambar'];

if(file_exists("../../assets/images/users/$gambaruser"))
{   
    if($gambaruser == 'default.png'){
        $gambaruser = 'default.png';
        echo "<script>location='index.php';</script>";
        
    }
    else{
        unlink("../../assets/images/users/$gambaruser");
    }
}

mysqli_query($koneksi,"DELETE FROM users WHERE id='$id'") or die(mysqli_error($koneksi));

echo "<script>alert('akun dihapus');</script>";
echo "<script>location='index.php';</script>";