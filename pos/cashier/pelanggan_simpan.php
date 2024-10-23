<?php  
session_start();
if(isset($_POST['save'])){
	$penid=$_SESSION['penid'];
	$PelangganID=$_POST['ip'];
	include "config/config.php";
	$sqls="update penjualan set PelangganID='$PelangganID' where penjualan_id='$penid'";
	$simpan=mysqli_query($mysqli,$sqls);
	$_SESSION['PelangganID']=$PelangganID;
}
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">