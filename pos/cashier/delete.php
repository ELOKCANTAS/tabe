<?php  
	$id=$_GET['id'];
	include "config/config.php";
	$sqld="delete from detail_penjualan where detail_id='$id'";
	$hapus=mysqli_query($mysqli,$sqld);
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">