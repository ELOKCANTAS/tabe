<?php  
if(isset($_POST['save'])){
    $kp = $_POST['kp'];
    $jml = $_POST['jml'];
    $tgl = date("Y-m-d H:i:s");
    include "config/config.php";

    // Insert the new stock into the tambah_stok table
    $sqls = "INSERT INTO tambah_stok (tanggal, kode_produk, jumlah) VALUES ('$tgl', '$kp', '$jml')";
    $simpan = mysqli_query($mysqli, $sqls);

    if($simpan){
        // Update the stock quantity in the produk table
        $sqlp = "SELECT stok FROM produk WHERE kode_produk = '$kp'";
        $resp = mysqli_query($mysqli, $sqlp);
        $row = mysqli_fetch_assoc($resp);
        $current_stok = $row['stok'];
        $new_stok = $current_stok + $jml;

        $sqlup = "UPDATE produk SET stok = '$new_stok' WHERE kode_produk = '$kp'";
        $update = mysqli_query($mysqli, $sqlup);

        if($update){
            echo "<script>alert('Data Berhasil Disimpan')</script>";
        }else{
            echo "<script>alert('Gagal memperbarui stok')</script>";
        }
    }else{
        echo "<script>alert('Data Gagal Disimpan')</script>";
    }
}
?>
<meta http-equiv="refresh" content="1;url=products.php">