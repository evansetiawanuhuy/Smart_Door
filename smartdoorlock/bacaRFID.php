<?php 
    include "function.php";

    //baca nomor kartu dari NodeMCU
    $nokartu = $_GET['nokartu'];

    $get_data = mysqli_query($conn, "SELECT * FROM user WHERE uid='$nokartu'");
    $data = mysqli_fetch_array($get_data);
            
    if($data)
    {
        echo "VALID";
    }
    else
    {
        echo "Tidak Ditemukan";
    }
?>