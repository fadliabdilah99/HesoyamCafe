<?php
include "conect.php";
session_start();
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id'])  : '';
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order'])  : '';
$meja =  (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : '';
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan'])  : '';
$total =  (isset($_POST['total'])) ? htmlentities($_POST['total'])  : '';
$uang =  (isset($_POST['uang'])) ? htmlentities($_POST['uang'])  : '';
$kembalian = $uang - $total;


// var_dump($kode_order,  $meja, $pelanggan, $total, $uang, $kembalian);
// var_dump($id);
// exit();
if (!empty($_POST['bayar'])) {
    if ($kembalian < 0) {
        $massage = '<script>alert("Uang tidak cukup")
        window.history.back()
        </script>';
    } else {

        $query = mysqli_query($conn, "INSERT INTO tb_bayar values ($kode_order, $uang, $total, '') ");
        $query2 = mysqli_query($conn, "UPDATE tb_list_order SET status = 0 WHERE id_list_order = '$id'");
        if ($query && $query2) {
            $massage = '<script>alert("Pembayaran Berhasil \n kembalian Rp.= ' . $kembalian . '");
            window.location="../?x=orderitem&order=' . $kode_order . '&meja=' . $meja . '&pelanggan=' . $pelanggan . '"
            </script>';
        } else {
            $massage = '<script>alert("pembayaran gagal");
            window.history.back()

        </script>';
        }
    }

    echo $massage;
}
