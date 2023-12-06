 <!-- $conn = mysqli_connect("localhost","root","","db_hesoyam");
if(!$conn){
 echo "gagal";
} -->

 <?php
    $host = "localhost";
    $username = "username";
    $password = "password";
    $database = "db_hesoyam";

    $conn = mysqli_connect("localhost", "root", "", "db_hesoyam");

    if (!$conn) {
        //apabila gagal akan ditampilkan kesahalan eror
        die("koneksi gagal:" . mysqli_connect_error());
    }
