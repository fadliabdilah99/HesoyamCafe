<?php
// include "conect.php";
// $name =  (isset($_POST['name'])) ? htmlentities($_POST['name'])  : '';
// $username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
// $level =  (isset($_POST['level'])) ? htmlentities($_POST['level'])  : '';
// $nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp'])  : '';
// $alamat =  (isset($_POST['alamat'])) ? htmlentities($_POST['alamat'])  : '';
// $password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : '';

// if (!empty($_POST['sumbituser'])) {
//     $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,notelepon,alamat,password) values ('$name','$username','$level','$nohp','$alamat','$password') ");
//     if (!$query) {
//         $massage = '<script>alert("databerhasil)</script>';
//     } else {
//         $massage = '<script>alert("datagagal)</script>';
//     }
//     echo $massage;
// }




include "conect.php";
session_start();
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order'])  : '';
$meja =  (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : '';
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan'])  : '';
$catatan =  (isset($_POST['catatan'])) ? htmlentities($_POST['catatan'])  : '';

if (!empty($_POST['inputorder'])) {
    // cek gambar/bukann




    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order' ");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>alert("order yang dimasukan telah ada")
        window.history.back()
        </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_order (id_order,meja,pelanggan,catatan,pelayan) values ('$kode_order','$meja','$pelanggan','$catatan','$_SESSION[id_decafe]') ");
        if ($query) {
            $massage = '<script>alert("databerhasil");
            window.location="../?x=orderitem&order='.$kode_order.'&meja='.$meja.'&pelanggan='.$pelanggan.'"
            </script>';
        } else {
            $massage = '<script>alert("datagagal");
            window.history.back()

        </script>';
        }
    }
    echo $massage;
}
