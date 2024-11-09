<?php  
session_start();
if(isset($_SESSION['penid'])){
$Username=$_SESSION['Username'];
$penid=$_SESSION['penid'];
$tgl=$_SESSION['tgl'];
include "config/config.php";
$sqlpenjualan="select * from penjualan where penjualan_id='$penid'";
$respenjualan=mysqli_query($mysqli,$sqlpenjualan);
$dtpenjualan=mysqli_fetch_array($respenjualan);
$PelangganID=$dtpenjualan['PelangganID'];
if ($PelangganID == null || $PelangganID == '') {
    $npel = 'Guest';
} else {
    $sqlpelanggan="select * from pelanggan where PelangganID='$PelangganID'";
    $respelanggan=mysqli_query($mysqli,$sqlpelanggan);
    $dtpelanggan=mysqli_fetch_array($respelanggan);
    if ($dtpelanggan) {
        $npel=$dtpelanggan['NamaPelanggan'];
    } else {
        $npel = 'Guest';
    }
}
$UserID=$dtpenjualan['UserID'];
$sqlpetugas="select * from user where UserID='$UserID'";
$respetugas=mysqli_query($mysqli,$sqlpetugas);
$dtpetugas=mysqli_fetch_array($respetugas);
$npet=$dtpetugas['Username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembayaran</title>
    <!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->
    <link rel="stylesheet" href="print.css?time=<?= md5(time()) ?>">
</head>
<body class="struk" onload="printOut()">
<section class="sheet">
<center>
    <br>
    <h2 style="margin:0px">TABE MART</h2>
    SMKN 1 KADIPATEN<br>
    Telp. 088222333001 <br>
</center>
<?php echo str_repeat("=", 37) ?>
<table width="100%" cellspacing="0">
    <tr>
        <td style="padding:2px 5px;">Tgl : <?= $tgl ?></td>
    </tr>
    <tr>
        <td  style="padding:2px 5px;">Penjualan ID : <?= $penid ?></td>
    </tr>
    <tr>
        <td  style="padding:2px 5px;">Pelanggan : <?= $npel ?></td>
    </tr>
    <tr>
        <td  style="padding:2px 5px;">Kasir : <?= $npet ?></td>
    </tr>
</table>
<?php echo str_repeat("-", 29) ?>
<table width="100%" cellspacing="0">
    <?php 
    include "config/config.php";
    $sql="select * from detail_penjualan where penjualan_id='$penid'";
    $result=mysqli_query($mysqli,$sql);
    $no= 1;
    $jmltot=0;
    while($data=mysqli_fetch_array($result)){
        $hp=number_format($data['harga'],0,",",".");
        $jp=number_format($data['jumlah'],0,",",".");
        $total=$data['harga']*$data['jumlah'];
        $tot=number_format($total,0,",",".");
    ?>
        <tr>
            <td  valign="top" style="padding:5px;">
                <?= $no ?>.
            </td>
            <td valign="top" style="padding:5px 2px; width:180px">
                <?= $jp ?> <?= $data['NamaProduk'] ?> @ <?= $hp ?>        
            </td>
            <td align="right" valign="top" style="padding:5px; width:60px"><?= $tot ?></td>
        </tr>
    <?php
    $no++;
    $jmltot=$jmltot+$total;
    $jmltotal=number_format($jmltot,0,",",".");
    }
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
        <?php  
        if(isset($_SESSION['bayar'])){
            $bayar=$_SESSION['bayar'];
            $nbayar=number_format($bayar,"0",",",".");
            $kembali=$bayar-$jmltot;
            $nkembali=number_format($kembali,"0",",",".");
            ?>
        <tr>
            <td align="right" style="padding:5px 5px;">Bayar :</td>
            <td align="right" style="padding:5px 5px;"><?= $nbayar ?></td>
        </tr>
        <tr>
            <td align="right" style="padding:5px 5px;">Kembali :</td>
            <td align="right" style="padding:5px 5px;"><?= $nkembali ?></td>
        </tr>
            <?php
        }
        ?>
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
        t = setTimeout("self.close()",lama);
    }
</script>
<?php }else{} ?>
</body>
</html>