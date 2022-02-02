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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Georama:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            background-color: #c7d5ea;}
    </style>
</head>
<body>
    <header>
        <div class = "head-wrap">
            <div class = "announcement">
                <a href="./login/login.php" class="btn announ">Jangan lewatkan, Ayo Bergabung!</a>
                <span href="#" class="fa fa-binoculars" aria-hidden="true">  Ayo Temukan Gayamu! di Universe-Shop</span>
            </div>          
        </div>
        <div class="container">
            <div class="head-bottom"> 
                <div class="header-left"><a href="home.php">
                    <img class="logo" src="../assets/images/pp.jpg" height="50px" width="50px">
                    <h3>UniverseShop</h3></a>
                </div>
                <div class="header-right">
                    <a href="../login/login.php" class="login"><span class="fa fa-sign-in" aria-hidden="true"></span>Log Out</a>
                    <a href="#" ><span class="fa fa-user-circle" aria-hidden="true"></span>Akun</a>
                    <a href="" ><span class="fa fa-shopping-cart" aria-hidden="true"></span>Produk</a>
                    
                        
                </div>
            </div>
        </div>
    </header>

    <br><br><br>
        
        <!--------------------------Content---------------------------->     
        
    <div class="product-wrapper">
        <div class="container">
            <div class="head-product">
                <h1>Pilihlah Barang yang Kamu Inginkan!</h1>
            </div>
            <div class="products">
            <?php
            include('../koneksi.php');
                    $data = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_connect_error($koneksi));
                    $no = 1;
                
                    while($row = mysqli_fetch_assoc($data)){
                ?>
                <div class="product">
                <div class="product-img">
                    <img src="../assets/images/product/<?=$row['gambar'] ;?>" height="150px" width="100%" class="rounded-50">
                </div>

                <div class= "product-content">
                    <h3><?= $row ['nama'];?> </h3>
                    <h4>Rp. <?= $row ['harga'];?></h4>
                    <p>
                        <?= $row ['deskripsi'];?>
                    </p>
                    <ul clas="star">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    </ul>
                    <h5><?= $row ['jenis'];?></h5>
                    </div>
                </div>
                <?php
                $no++;}
            ?> 
            </div>
        </div>
    </div>

    








        <!------------------------------------------------------------->

    <footer class="footer-distributed">
        <div class="head-footer">
        </div>
        <div class="body-footer">
            <div class="footer-left">
    
                <div class="footer-logo">
                    <img class="logo" src="../assets/images/pp.jpg" alt="image" height="50" width="50">
                    <h3>Universe Shop</h3>
                </div>
    
                <p class="footer-links">
                    <a href="#" class="link-1">Home</a>
                    
                    <a href="#">Blog</a>
                
                    <a href="#">Pricing</a>
                
                    <a href="#">About</a>
                    
                    <a href="#">Faq</a>
                    
                    <a href="#">Contact</a>
                </p>
    
            </div>
            
    
            <div class="footer-center">
    
                <div class="marker">
                    <p> Samarinda, Indonesia</p>
                </div>
    
                <div class="phone">
                    <p>+62 853-4894-0228</p>
                </div>
    
                <div class="mail">
                    <p><a href="mailto:support@ceight-shop.com">support@univ-shop.com</a></p>
                </div>
    
            </div>
    
            <div class="footer-right">
                <p>Media Sosial</p>
                <div class="footer-icons">
                    
                    <a href="https://www.facebook.com/ahmd.rusdian"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/rush_dyne/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a>
    
                </div>
    
            </div>
        </div>
        <div class="copyright-footer">
            <p>&#169 2021  <span>UniverseShop</span> </p>
        </div>
    </footer>
</body>
</html>