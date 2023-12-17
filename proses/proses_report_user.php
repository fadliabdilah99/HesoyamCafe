<?php
include "conect.php";
session_start();
$karyawan = (isset($_POST['karyawan'])) ? htmlentities($_POST['karyawan']) : '';
$keluhan =  (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : '';

// var_dump($keluhan);

if (empty($_POST['report'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_report");
    $query = mysqli_query($conn, "INSERT INTO tb_report (keluhan,nama) values ('$keluhan','$karyawan')");
    if ($query) {
        $massage = '<script>alert("Report telah dikirim")
        window.history.back()
        </script>';
    } else {
        $massage = '<script>alert("datagagal")
        window.history.back()
        </script>';
    }

    echo $massage;
}
