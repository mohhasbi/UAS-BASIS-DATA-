<?php include("config.php");

    $insert = mysqli_query($conn,"INSERT INTO transaksi VALUES('','$_POST[nama_pembeli]','$_POST[nama_produk]','$_POST[tgl_bayar]','$_POST[total_harga]')");
    
    if($insert) {
        echo"transaction added successfully. <a href='index.php'>View Users</a>";
    }
    else{
        echo"transaction failed try again!!!";
    }
?>