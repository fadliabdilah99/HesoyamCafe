<?php

include "conect.php";
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order'])  : '';
$meja =  (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : '';
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan'])  : '';
$id =  (isset($_POST['id_list'])) ? htmlentities($_POST['id_list'])  : '';
var_dump($id);


// exit();
$query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order='$id'");
if (!$query) {
    $massage = '<script>alert("data gagal di hapus")
    window.history.back()
    </script>';
} else {
    $massage = '<script>alert("data gagal di hapus")
    window.history.back()
    </script>';
}
echo $massage;
