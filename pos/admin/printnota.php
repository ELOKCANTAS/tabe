<?php  
session_start();
if(isset($_GET['penid'])){
    $penid = $_GET['penid'];
    $kbl = $_GET['kbl'];
    include "config/config.php";
    $sqlpenjualan = "SELECT * FROM penjualan WHERE penjualan_id='$penid'";
    $respenjualan = mysqli_query($mysqli, $sqlpenjualan);
    $dtpenjualan = mysqli_fetch_array($respenjualan);
    $tgl = $dtpenjualan['tanggal'];
    $bayar = $dtpenjualan['bayar'];
    $nbayar = number_format($bayar, 0, ",", ".");
    $PelangganID = $dtpenjualan['PelangganID'];
    $sqlpelanggan = "SELECT * FROM pelanggan WHERE PelangganID='$PelangganID'";
    $respelanggan = mysqli_query($mysqli, $sqlpelanggan);
    $dtpelanggan = mysqli_fetch_array($respelanggan);
    $npel = isset($dtpelanggan['NamaPelanggan']) ? $dtpelanggan['NamaPelanggan'] : 'Guest';
    $UserID = $dtpenjualan['UserID'];
    $sqlpetugas = "SELECT * FROM user WHERE UserID='$UserID'";
    $respetugas = mysqli_query($mysqli, $sqlpetugas);
    $dtpetugas = mysqli_fetch_array($respetugas);
    $npet = $dtpetugas['Username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembayaran</title>
    <link rel="stylesheet" href="print.css?time=<?= md5(time()) ?>">
</head>
<body class="struk" onload="printOut()">
<section class="sheet">
<center>
    <br>
    <h2 style="margin:0px">TABE MART</h2>
    Jl. Siliwangi No. 30 Kadipaten Majalengka<br>
    Telp. 088222333001 <br>
</center>
<?= str_repeat("=", 37) ?>
<table width="100%" cellspacing="0">
    <tr>
        <td style="padding:2px 5px;">Tgl : <?= $tgl ?></td>
    </tr>
    <tr>
        <td style="padding:2px 5px;">Penjualan ID : <?= $penid ?></td>
    </tr>
    <tr>
        <td style="padding:2px 5px;">Pelanggan : <?= $npel ?></td>
    </tr>
    <tr>
        <td style="padding:2px 5px;">Kasir : <?= $npet ?></td>
    </tr>
</table>
<?= str_repeat("-", 29) ?>
<table width="100%" cellspacing="0">
    <?php 
    $sql = "SELECT * FROM detail_penjualan WHERE penjualan_id='$penid'";
    $result = mysqli_query($mysqli, $sql);
    $no = 1;
    $jmltot = 0;
    while($data = mysqli_fetch_array($result)){
        $hp = number_format($data['harga'], 0, ",", ".");
        $jp = number_format($data['jumlah'], 0, ",", ".");
        $total = $data['harga'] * $data['jumlah'];
        $tot = number_format($total, 0, ",", ".");
    ?>
        <tr>
            <td valign="top" style="padding:5px;">
                <?= $no ?>.
            </td>
            <td valign="top" style="padding:5px 2px; width:180px">
                <?= $jp ?> <?= $data['NamaProduk'] ?> @ <?= $hp ?>        
            </td>
            <td align="right" valign="top" style="padding:5px; width:60px"><?= $tot ?></td>
        </tr>
    <?php
    $no++;
    $jmltot += $total;
    }
    $jmltotal = number_format($jmltot, 0, ",", ".");
    ?>
</table>
<table width="100%" cellspacing="0">
    <tr>
        <td colspan="3">
            <?= str_repeat("-", 29) ?>
        </td>
    </tr>
    <tr>
        <td align="right" style="padding:5px 5px;">Total :</td>
        <th align="right" style="font-size:10pt; padding:2px 5px;"><?= $jmltotal ?></th>
    </tr>
    <tr>
        <td align="right" style="padding:5px 5px;">Bayar :</td>
        <td align="right" style="padding:5px 5px;"><?= $nbayar ?></td>
    </tr>
    <tr>
        <td align="right" style="padding:5px 5px;">Kembali :</td>
        <td align="right" style="padding:5px 5px;"><?= $kbl ?></td>
    </tr>
</table>
<?= str_repeat("-", 29) ?>
<br>
<center>
Terima Kasih atas Kunjungan Anda <br>
Semoga Berkenan
</center>
<br/><br/><br/><br/>
<p></p>
</section>
<script>
    var lama = 1000;
    t = null;
    function printOut(){
        window.print();
        t = setTimeout("self.close()", lama);
    }
</script>
<?php } ?>
</body>
</html>