<?php 
    include "function.php";

    //baca nomor kartu dari NodeMCU
    $nokartu = $_GET['nokartu'];

    $get_data = mysqli_query($conn, "SELECT * FROM user WHERE uid='$nokartu'");
    $data = mysqli_fetch_array($get_data);
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d H:i:s");
    $username = $data['username'];

    // $simpan = mysqli_query($conn, "INSERT INTO accepted(uid, username, status, tanggal, namaruangan) VALUES ('$nokartu', '$username', '1', '$date', 'Ruangan Orang Tolol')");

    $get_status = mysqli_query($conn, "SELECT * FROM accepted WHERE uid='$nokartu'");
    $data_status = mysqli_fetch_array($get_status);
    $status = $data_status['status'];

          $simpan = mysqli_query($conn, "INSERT INTO accepted(uid, username, status, tanggal, namaruangan) VALUES ('$nokartu', '$username', '1', '$date', 'Ruangan Belajar')");

    // if($status == 0){
    //     $simpan = mysqli_query($conn, "INSERT INTO accepted(uid, username, status, tanggal, namaruangan) VALUES ('$nokartu', '$username', '1', '$date', 'Ruangan Belajar')");
    // }else{
    //     $simpan = mysqli_query($conn, "INSERT INTO accepted(uid, username, status, tanggal, namaruangan) VALUES ('$nokartu', '$username', '0', '$date', 'Ruangan Belajar')");
    // }
    
    if($simpan)
        echo "Berhasil";
    else
        echo "Gagal";
?>