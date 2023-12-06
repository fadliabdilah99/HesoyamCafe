<?php
include "conect.php";
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order'])  : '';
$meja =  (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : '';
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan'])  : '';
$keterangan =  (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan'])  : '';
$menu =  (isset($_POST['menu'])) ? htmlentities($_POST['menu'])  : '';
$jumlah =  (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah'])  : '';
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';


var_dump($menu);
// var_dump($jumlah);
// var_dump($id);

// exit();
if (!empty($_POST['editlistorder'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE menu = '$menu' ");
    if (mysqli_num_rows($select) > 1) {
        $massage = '<script>
        alert("meja yang telah penuh")
        window.history.back()
        </script>';
    } else {
        // $query = mysqli_query($conn, "INSERT INTO tb_list_order values ('',$menu,$kode_order,$jumlah,'$keterangan' )");
        $query = mysqli_query($conn, "UPDATE tb_list_order SET menu = $menu, keterangan_list = '$keterangan', jumlah = $jumlah WHERE id_list_order = '$id'");

        // $query = mysqli_ query($conn, "UPDATE tb_list_order SET menu= $menu, jumlahh= $jumlah WHERE id_list_order='$id'");
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
