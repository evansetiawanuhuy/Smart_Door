<?php
session_start();

//Koneksi ke database
$conn = mysqli_connect("localhost","root","","smartdoorlock");

//Tambah user
if(isset($_POST['addnewuser'])){
    $username = $_POST['username'];
    $uid = $_POST['uid'];

    $addtotable = mysqli_query($conn, "INSERT INTO user (username, uid) values('$username','$uid')");
    if($addtotable){
        header('location:user.php');
    }else{
        echo "Gagal";
        header('location:user.php');
    }
}


//Update Info User
if(isset($_POST['updateuser'])){
    $iduser = $_POST['iduser'];
    $username = $_POST['username'];
    $uid = $_POST['uid'];

    $update = mysqli_query($conn, "UPDATE user SET username='$username', uid='$uid' WHERE iduser='$iduser'");
    if($update){
        header('location:user.php');
    }else{
        echo 'Gagal';
        header('location:user.php');
    }
}

//Menghapus User
if(isset($_POST['hapususer'])){
    $iduser = $_POST['iduser'];

    $hapus = mysqli_query($conn, "DELETE FROM user WHERE iduser='$iduser'");
    if($hapus){
        header('location:user.php');
    }else{
        echo 'Gagal';
        header('location:user.php');
    }
}



//Tambah Admin
if(isset($_POST['addnewadmin'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nomorhp = $_POST['nomorhp'];
    $password = $_POST['password'];

    $addtotable = mysqli_query($conn, "INSERT INTO admin (name, email, nomorhp, password) values('$name','$email','$nomorhp','$password')");
    if($addtotable){
        header('location:admin.php');
    }else{
        echo "Gagal";
        header('location:admin.php');
    }
}

//Update Info Admin
if(isset($_POST['updateadmin'])){
    $idadmin = $_POST['idadmin'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nomorhp = $_POST['nomorhp'];
    $password = $_POST['password'];

    $update = mysqli_query($conn, "UPDATE admin SET name='$name', email='$email', nomorhp='$nomorhp', password='$password' WHERE idadmin='$idadmin'");
    if($update){
        header('location:admin.php');
    }else{
        echo 'Gagal';
        header('location:admin.php');
    }
}

//Menghapus Admin
if(isset($_POST['hapusadmin'])){
    $idadmin = $_POST['idadmin'];

    $hapus = mysqli_query($conn, "DELETE FROM admin WHERE idadmin='$idadmin'");
    if($hapus){
        header('location:admin.php');
    }else{
        echo 'Gagal';
        header('location:admin.php');
    }
}






//Tambah Device
if(isset($_POST['addnewdevices'])){
    $namaperangkat = $_POST['namaperangkat'];
    $namaruangan = $_POST['namaruangan'];
    $tipe = $_POST['tipe'];
    $keypad_pass = $_POST['keypad_pass'];
    $durasi = $_POST['durasi'];

    $addtotable = mysqli_query($conn, "INSERT INTO devices (namaruangan, namaperangkat, tipe, keypad_pass, durasi) values('$namaruangan','$namaperangkat','$tipe','$keypad_pass','$durasi')");
    if($addtotable){
        header('location:devices.php');
    }else{
        echo "Gagal";
        header('location:devices.php');
    }
}

//Update Info Admin
if(isset($_POST['updatedevice'])){
    $idd = $_POST['idd'];
    $namaperangkat = $_POST['namaperangkat'];
    $namaruangan = $_POST['namaruangan'];
    $tipe = $_POST['tipe'];
    $keypad_pass = $_POST['keypad_pass'];
    $durasi = $_POST['durasi'];

    $update = mysqli_query($conn, "UPDATE devices SET namaruangan='$namaruangan', namaperangkat='$namaperangkat', tipe='$tipe', keypad_pass='$keypad_pass', durasi='$durasi' WHERE idd='$idd'");
    if($update){
        header('location:devices.php');
    }else{
        echo 'Gagal';
        header('location:devices.php');
    }
}

//Menghapus Admin
if(isset($_POST['hapusdevice'])){
    $idd = $_POST['idd'];

    $hapus = mysqli_query($conn, "DELETE FROM devices WHERE idd='$idd'");
    if($hapus){
        header('location:devices.php');
    }else{
        echo 'Gagal';
        header('location:devices.php');
    }
}

?>