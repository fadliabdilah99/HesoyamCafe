<?php

include "conect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';

$query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
if (!$query) {
    $massage = '<script>alert("data gagal di hapus")</script>';
} else {
    $massage =
        header('location:../user');
}
echo $massage;
