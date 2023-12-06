<?php
// include "conect.php";
// $name =  (isset($_POST['name'])) ? htmlentities($_POST['name'])  : '';
// $username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
// $level =  (isset($_POST['level'])) ? htmlentities($_POST['level'])  : '';
// $nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp'])  : '';
// $alamat =  (isset($_POST['alamat'])) ? htmlentities($_POST['alamat'])  : '';
// $password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : '';

// if (!empty($_POST['sumbituser'])) {
//     $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,notelepon,alamat,password) values ('$name','$username','$level','$nohp','$alamat','$password') ");
//     if (!$query) {
//         $massage = '<script>alert("databerhasil)</script>';
//     } else {
//         $massage = '<script>alert("datagagal)</script>';
//     }
//     echo $massage;
// }




include "conect.php";
$name =  (isset($_POST['nama'])) ? htmlentities($_POST['nama'])  : '';
$username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
$level =  (isset($_POST['level'])) ? htmlentities($_POST['level'])  : '';
$nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp'])  : '';
$alamat =  (isset($_POST['alamat'])) ? htmlentities($_POST['alamat'])  : '';
$password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : '';

if (!empty($_POST['sumbituser'])) {
    // cek gambar/bukann




    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' ");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>alert("username yang dimasukan telah ada")
        window.history.back()
        </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,notelepon,alamat,password) values ('$name','$username','$level','$nohp','$alamat','$password') ");
        if (!$query) {
            $massage = '<script>alert("databerhasil")</script>';
        } else {
            $massage = '<script>alert("datagagal")
        </script>';
            header('location:../user');
        }
    }
    echo $massage;
}
