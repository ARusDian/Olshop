<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "shop";


    $koneksi = mysqli_connect($db_host,$db_user,$db_pass, $db_name);

    //TESTING KONEKSI

    // if (mysqli_connect_errno($koneksi)){
    //     echo "koneksi DataBase Gagal". mysqli_connect_error();
    // }
    // else{
    //     echo "Berhasil";
    // }
    ?>