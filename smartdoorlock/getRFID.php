<?php 
    include "function.php";

    //baca isi tabel tmprfid
    $sql = mysqli_query($conn, "SELECT * FROM temporary");
    $data = mysqli_fetch_array($sql);

    //baca nokartu
    $nokartu = isset($data['uid']) ? $data['uid'] : '';
?>
<input type="text" name="uid" id="norfid" placeholder="UID" class="form-control" value="<?php echo $nokartu; ?>" required>