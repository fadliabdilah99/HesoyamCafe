<?php
include "conect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';
$name =  (isset($_POST['nama'])) ? htmlentities($_POST['nama'])  : '';
$username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
$level =  (isset($_POST['level'])) ? htmlentities($_POST['level'])  : '';
$nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp'])  : '';
$alamat =  (isset($_POST['alamat'])) ? htmlentities($_POST['alamat'])  : '';
$password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : '';

if (!empty($_POST['sumbituser'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' ");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>
        alert("username yang dimasukan telah ada")
        window.history.back()
        </script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name', username='$username', level='$level', notelepon='$nohp', alamat='$alamat', password='$password' WHERE id='$id'");
        if ($query) {
            $massage = '<script>alert("databerhasil")
            window.history.back()</script>';
        } else {
            $massage = '<script>alert("datagagal")
            window.history.back()
        </script>';
        }
    }
    echo $massage;
}
