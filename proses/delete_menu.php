<?php

include "conect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';
$foto =  (isset($_POST['foto'])) ? htmlentities($_POST['foto'])  : '';


$query = mysqli_query($conn, "DELETE FROM tb_menu WHERE id='$id'");
if ($query) {
    unlink("../asset/img/$foto");
    $massage =
        header('location:../menu');
} else {
    $massage = '<script>alert("data gagal di hapus")</script>';
}
echo $massage;
