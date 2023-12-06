<?php

include "conect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';
$password = md5('password');
$query = mysqli_query($conn, "UPDATE tb_user SET password='$password' WHERE id = '$id'");

if (!$query) {
    $massage = '<script>alert("data gagal di hapus")</script>';
} else {
    $massage =
        header('location:../user');
}
echo $massage;
