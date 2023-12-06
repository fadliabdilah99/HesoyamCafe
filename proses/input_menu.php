<?php




include "conect.php";
$nama_menu =  (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu'])  : '';
$keterangan =  (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan'])  : '';
$kategori =  (isset($_POST['kategori'])) ? htmlentities($_POST['kategori'])  : '';
$harga =  (isset($_POST['harga'])) ? htmlentities($_POST['harga'])  : '';
$stok =  (isset($_POST['stok'])) ? htmlentities($_POST['stok'])  : '';
// $username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
// $level =  (isset($_POST['level'])) ? htmlentities($_POST['level'])  : '';
// $nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp'])  : '';
// $alamat =  (isset($_POST['alamat'])) ? htmlentities($_POST['alamat'])  : '';
// $password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : '';
$code_rand = rand(10000, 99999) . "-";
$target_dir = "../asset/img/" . $code_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imgType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['inputmenu'])) {
    var_dump($_POST);
    // cek gambar
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "ini bukan gambar";
        $statusupload = 0;
    } else {
        $statusupload = 1;
        if (file_exists($target_file)) {
            $message = 'file yang dimasukan telah ada';
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 5000000) { //500kb
                $message = "file terlalu besar";
                $statusupload = 0;
            } else {
                $imgType = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                if ($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif") {
                    $message = "hanya diperbolehkan gambar jpg, jpeg, png, dan gif";
                    $statusupload = 0;
                }
            }
        }
    }

    if ($statusupload == 0) {
        echo '<script>alert("' . $message . ', gambar upload gagal");</script>';
        echo '<script>window.location="../menu";</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_menu WHERE nama_menu = '$nama_menu' ");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("nama menu yang di masukan sudah ada");
            window.location="../menu";</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO tb_menu (foto, nama_menu, keterangan, kategori, harga, stok) values ('" . $code_rand . $_FILES['foto']['name'] . "','$nama_menu', '$keterangan','$kategori','$harga','$stok') ");
                if ($query) {
                    $message = '<script>alert("data berhasil dimasukan"); window.location="../menu";</script>';
                } else {
                    $message = '<script>alert("data gagal dimasukan"); window.location="../menu";</script>';
                }
            } else {
                $message = '<script>alert("maaf terjadi kesalahan file tidak dapat di upload"); window.location="../menu";</script>';
            }
        }
    }
}
echo $message;
