<?php

include "conect.php";
$id =  (isset($_POST['id_order'])) ? htmlentities($_POST['id_order'])  : '';

$query = mysqli_query($conn, "DELETE FROM tb_order WHERE id_order='$id'");
if (!$query) {
    $massage = '<script>alert("data gagal di hapus")</script>';
    header('location:../order');
} else {
    $massage =
        header('location:../order');
}
echo $massage;
