<?php
session_start();
include "conect.php";
$username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
$password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : '';


if (!empty($_POST['sumbit'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $hasil['level'];
        $_SESSION['id_decafe'] = $hasil['id'];
        header('location:../home');
    } else { ?>
        <script>
            alert('username atau password salah')
            window.location = '../login'
        </script>
<?php

    }
}
?>