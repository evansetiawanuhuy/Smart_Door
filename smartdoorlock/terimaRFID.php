<?php 
    include "function.php";

    //baca nomor kartu dari NodeMCU
    $nokartu = $_GET['nokartu'];

    //kosongkan tabel tmprfid
    mysqli_query($conn, "DELETE FROM temporary");

    //simpan nomor kartu yang baru ke tabel tmprfid
    $simpan = mysqli_query($conn, "INSERT INTO temporary(uid) VALUES ('$nokartu')");
    if($simpan)
        echo "Berhasil";
    else
        echo "Gagal";
?>