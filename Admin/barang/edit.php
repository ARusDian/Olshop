<?php 
    include('../../koneksi.php');
    include('UPgambar.php');
    

    $id = $_GET['id'];
    $result = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");

    $data = mysqli_fetch_assoc($result);

    if (isset($_POST['edit'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $deskripsi = $_POST['deskripsi'];
            $jenis = $_POST['jenis'];
            $id = $_POST['id'];

            $gambarlama = htmlspecialchars($_POST['gambarLama']);

            if ($_FILES['gambar']['error'] === 4) {
                  $foto = $gambarlama;
            }else {
                  //unlink("../assets/images/$gambarlama");
                  $foto = uploadImage();
                  
                  if(uploadImage()==false){
                        $foto = $gambarlama;   
                  }
            }

            $result = mysqli_query($koneksi,
            "UPDATE barang SET nama='$nama',gambar='$foto',jenis='$jenis',
            deskripsi='$deskripsi',harga='$harga',stok='$stok' WHERE id='$id' ");

            if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script> alert('data produk telah diubah'); </script>";
            echo "<script> location='index.php'; </script>";
            }else {
            echo "<script>alert('data produk gagal diubah');</script>";
            echo "<script>location='index.php';</script>";
            }
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
            <div class="panel-heading">
                  <h3><b>Tambahkan Barang</b></h3>
            </div>
            <br>
            <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                        </div>
                        <div class="form-group">
                              <label>Harga (Rp)</label>
                              <input type="number" class="form-control" name="harga" value="<?= $data['harga'] ?>">
                        </div>
                        <div class="form-group">
                              <label>Stok</label>
                              <input type="number" class="form-control" name="stok" value="<?= $data['stok'] ?>">
                        </div>
                        <div class="form-group">
                              <label>Kategori Sekarang adalah <?=$data['jenis']?></label>
                              <select name="jenis" size="value" class="form-control select2" value="<?=$data['jenis']?>">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Gaming">Gaming</option>
                                    <option value="Olahraga">Olahraga</option>
                              </select>
                        </div>
                              <br>
                        <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea name="deskripsi" class="form-control" rows="10"><?= $data['deskripsi'] ?></textarea>
                        </div>
                        <input type="hidden" name="gambarLama" value="<?= $data['gambar'] ?>">
                        <div class="form-group">
                              <label>Foto</label>
                              <img src="../../assets/images/product/<?php echo $data['gambar']; ?>" class="img-thumbnail" width="100">
                              <input type="file" class="form-control" name="gambar">
                        </div>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button class="btn btn-primary" name="edit"><img src="../../assets/icon/Centang.png"width="40px;" height="40px;"  >Ubah</button>
                  </form>
            </div>
      </div>
</div>
