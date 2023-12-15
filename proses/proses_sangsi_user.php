<?php
include "conect.php";
session_start();
$poin =  (isset($_POST['poin'])) ? htmlentities($_POST['poin'])  : '';
$karyawan =  (isset($_POST['karyawan'])) ? htmlentities($_POST['karyawan']) : '';
$keterangan =  (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan'])  : '';

var_dump($poin);
var_dump($karyawan);
var_dump($keterangan);



if (!empty($_POST['pelanggaran'])) {

    $select = mysqli_query($conn, "SELECT * FROM tb_pelanggaran");
    $query = mysqli_query($conn, "INSERT INTO tb_pelanggaran (id_pelanggaran,skor_pelanggaran,keterangan_pelanggaran) values ('$karyawan','$poin','$keterangan')");
    if ($query) {
        $massage = '<script>alert("databerhasil")
        window.history.back()
        </script>';
    } else {
        $massage = '<script>alert("datagagal")
        window.history.back()
        </script>';
    }

    echo $massage;
}
