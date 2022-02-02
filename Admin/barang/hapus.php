<?php 
include('../../koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");

$data = mysqli_fetch_assoc($result);

$gambarproduk = $data['gambar'];
if(file_exists("../../assets/images/product/$gambarproduk"))
{
    unlink("../../assets/images/product/$gambarproduk");
}

mysqli_query($koneksi,"DELETE FROM barang WHERE id='$id'") or die(mysqli_error($koneksi));

echo "<script>alert('produk dihapus');</script>";
echo "<script>location='index.php';</script>";