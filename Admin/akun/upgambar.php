<?php 

function uploadImage(){
        $namaFile = $_FILES['gambar']['name'];
        $sizeFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //mengecek apakah ada file yang di upload
        if ($error === 4) {
            //echo "<script>alert(\"Silahkan Upload gambar\");</script>";
            return false;
        }
        
        //mengecek extensi file gambar yang diupload
        $allowextensions = ['jpg','jpeg','png'];
        $extension = explode(".",$namaFile); //tricky untuk memecah nama file pada titik untuk mengetahui extensions yang dipakai
        $extension = strtolower/*memaksa string menjadi kecil semua kemudian diambil*/
        (end($extension));//mengambil text atau nama file paling belakang setelah dipecah(mengambil nama extensinya)

        if (!in_array/*mengecek isi array pertama sama seperti array kedua*/($extension,$allowextensions)) {
            echo "<script>alert(\"extensi yang diperbolehkan jpg,jpeg,png\");</script>";
            return false;
        }

        //mengecek ukuran file
        if ($sizeFile > 1000000) {
            echo "<script>alert('ukuran file terlalu besar')</script>";
            return false;
        }

        //mengganti nama file dengan random number agar tidak terjadi tabrakan ketika penamaan file di server

        $newname = uniqid().".".$extension;//function uniqid untuk memberikan id uniq 

        move_uploaded_file($tmpName, '../../assets/images/users/'. $newname);

        return $newname;
    }

?>