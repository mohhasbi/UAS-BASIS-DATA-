<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "toko_buku";

    $conn = mysqli_connect($host,$user,$pass,$db);
    if ($conn == false) {
        echo "connetion failed.";
        die();
    } else #echo "koneksi berhasil
?>