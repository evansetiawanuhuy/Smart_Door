<?php 
    include "function.php";

    //baca nomor kartu dari NodeMCU
    $nokartu = $_GET['nokartu'];

    $get_data = mysqli_query($conn, "SELECT * FROM user WHERE uid='$nokartu'");
    $data = mysqli_fetch_array($get_data);
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d H:i:s");

    $simpan = mysqli_query($conn, "INSERT INTO rejected(uid, tanggal, namaruangan) VALUES ('$nokartu', '$date', 'Ruang Tidur')");
    if($simpan)
        echo "Berhasil";
    else
        echo "Gagal";
?>