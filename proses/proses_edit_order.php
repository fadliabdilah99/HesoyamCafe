<?php
include "conect.php";
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order'])  : '';
$meja =  (isset($_POST['meja'])) ? htmlentities($_POST['meja'])  : '';
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : '';
$catatan =  (isset($_POST['catatan'])) ? htmlentities($_POST['catatan'])  : '';




if (!empty($_POST['inputorder'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE meja = '$meja' ");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>
        alert("meja yang telah penuh")
        window.history.back()
        </script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_order SET meja='$meja', pelanggan='$pelanggan', catatan='$catatan' WHERE id_order='$kode_order'");
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
