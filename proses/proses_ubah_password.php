<?php
session_start();
include "conect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';
$passwordlama =  (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama']))  : '';
$passwordbaru =  (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru']))  : '';
$konfirmasi =  (isset($_POST['konfirmasi'])) ? md5(htmlentities($_POST['konfirmasi']))  : '';

if (!empty($_POST['sumbitubahpassword'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($passwordbaru == $konfirmasi) {

            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE username = '$_SESSION[username]'");
            if ($query) {
                $massage = '<script>alert("password berhasil di ubah ")
                window.history.back()
                </script>';
            } else {
                $massage = '<script>alert("password gagal diubah")
                window.history.back()
            </script>';
            }
        } else {
            $massage = '<script>alert("password baru tidak sesuai")
            window.history.back()</script>';
        }
    } else {
        $massage = '<script>alert("password lama tidak sesuai")
        window.history.back()</script>';
    }
} else {
    header('location:../home');
}
echo $massage;
