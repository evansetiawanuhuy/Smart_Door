<?php 
    include "function.php";

    //baca nomor kartu dari NodeMCU
    // $nokartu = $_GET['nokartu'];

    $get_data = mysqli_query($conn, "SELECT * FROM devices WHERE namaruangan='Ruang Tidur'");
    $data = mysqli_fetch_array($get_data);

    if($data)
        echo $data['keypad_pass'];
    else
        echo "Gagal";
?>