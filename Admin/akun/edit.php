<?php 
    include('../../koneksi.php');
    include('UPgambar.php');
    

    $id = $_GET['id'];
    $result = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");

    $data = mysqli_fetch_assoc($result);

    if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $status = $_POST['status'];

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
                  else{unlink("../assets/images/$gambarlama");}
            }

            $result = mysqli_query($koneksi,
            "UPDATE users SET username='$name',user='$user',gambar='$foto',pass='$pass',tingkat='$status' WHERE id='$id' ");

            if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script> alert('data user telah diubah'); </script>";
            echo "<script> location='index.php'; </script>";
            }else {
            echo "<script>alert('data user gagal diubah');</script>";
            echo "<script>location='index.php';</script>";
            }
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
            <div class="panel-heading">
                  <b>Tambah barang</b>
            </div>

            <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="<?= $data['username'] ?>">
                        </div>
                        <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username" value="<?= $data['user'] ?>">
                        </div>
                        <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" name="password" value="<?= $data['pass'] ?>">
                        </div>
                        Status akun sekarang adalah sebagai 
                              <b><?php $status = $data ['tingkat'];
                                    if($status=="1" ){echo"Admin";}
                                    else{echo"User";}?> </b>
                        <div>Status Akun 
                              <select name="status" size="value">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                              </select>
                        </div>
                        <input type="hidden" name="gambarLama" value="<?= $data['gambar'] ?>">
                        <div class="form-group">
                              <label>Foto</label>
                              <img src="../../assets/images/users/<?php echo $data['gambar']; ?>" class="img-thumbnail" width="100">
                              <input type="file" class="form-control" name="gambar">
                        </div>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button class="btn btn-primary" name="edit"><img src="../../assets/icon/Centang.png"width="40px;" height="40px;"  >Ubah</button>
                  </form>
            </div>
      </div>
</div>
