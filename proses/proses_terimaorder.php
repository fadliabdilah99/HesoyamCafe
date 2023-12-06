<?php
include "conect.php";

$keterangan =  (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan'])  : '';
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';


var_dump($menu);
// var_dump($jumlah);
// var_dump($id);

// exit();
if (!empty($_POST['terima'])) {

    // $query = mysqli_query($conn, "INSERT INTO tb_list_order values ('',$menu,$kode_order,$jumlah,'$keterangan' )");
    $query = mysqli_query($conn, "UPDATE tb_list_order SET keterangan_list = '$keterangan', status=1 WHERE id_list_order = '$id'");

    // $query = mysqli_ query($conn, "UPDATE tb_list_order SET menu= $menu, jumlahh= $jumlah WHERE id_list_order='$id'");
    if ($query) {
        $massage = '<script>alert("data di terima")
            window.history.back()</script>';
    } else {
        $massage = '<script>alert("datagagal")
            window.history.back()
        </script>';
    }

    echo $massage;
}
