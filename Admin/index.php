<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../login/login.php");
    }
    
    //echo "Koneksi ke Admin Berhasil";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/Olshop/template/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/Olshop/template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/Olshop/template/admin/dist/css/adminlte.min.css">
</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="brand-image img-circle elevation-3" src="/Olshop/assets/images/pp.jpg" alt="AdminLTELogo" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link" >Menu awal</a><br>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="akun/index.php" class="nav-link">Daftar Akun</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="barang/index.php" class="nav-link">Daftar Produk</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../login/logout.php"><button type="button" class="btn btn-block btn-outline-danger btn-lg" >Logout</button></a>
      </li>
    </ul>
    


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="/Olshop/assets/images/pp.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="index.php"" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <b>Dashboard</b>
              </p>
            </a>
        <li class="nav-item">
            <a href="akun/index.php" class="nav-link ">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                <b>Daftar Akun</b>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barang/index.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
              <b>Daftar Produk</b>
              </p>
            </a>
          </li>
        </li>
        </ul>
      </nav>
    </div>
  </aside>
  </nav>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Member terdaftar teratas</h3>

                    <div class="card-tools">
                      
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    <?php
                        include('../koneksi.php');
                        $data = mysqli_query($koneksi,"SELECT * FROM users LIMIT 4") or die(mysqli_connect_error($koneksi));
                        $no = 1;
                        while($row = mysqli_fetch_assoc($data)){
                    ?>
                      <li>
                        <img src=../assets/images/users/<?= $row['gambar'] ;?>  height="100" width="100">
                        <br><br><br><h5><?= $row ['username'];?></h5>
                        
                      </li>
                    <?php
                            $no++;}
                        
                        ?> 
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="akun/index.php">Lihat semua user</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->


            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Produk teratas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Stok</th>
                    </tr>
                    </thead>
                    <?php
                        include('../koneksi.php');
                        $data = mysqli_query($koneksi,"SELECT * FROM barang LIMIT 5") or die(mysqli_connect_error($koneksi));
                        $no = 1;
                        
                            while($row = mysqli_fetch_assoc($data)){
                    ?>
                    <tbody>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row ['nama'];?></td>
                      <td><I><b><?= $row ['jenis'];?></b></I></td>
                      <td><?= $row ['stok'];?></td>
                    </tr>
                    <?php
                        $no++;}
                    ?> 
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
                <a href="barang/index.php" class="btn btn-sm btn-secondary float-right">Lihat semua produk</a>
              <!-- /.card-footer -->
          </div>
          <!-- /.col -->
   
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>




<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/Olshop/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Olshop/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/Olshop/template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/Olshop/template/admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/Olshop/template/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/Olshop/template/admin/plugins/raphael/raphael.min.js"></script>
<script src="/Olshop/template/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/Olshop/template/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="/Olshop/template/admin/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/Olshop/template/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/Olshop/template/admin/dist/js/pages/dashboard2.js"></script>
</body>
</html>