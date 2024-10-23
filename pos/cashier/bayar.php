<?php  
session_start();
if(isset($_POST['save'])){
	$jmltotal=$_POST['jmltotal'];
	$bayar=$_POST['bayar'];
	$penid=$_SESSION['penid'];
	$UserID=$_SESSION['UserID'];
	$Username=$_SESSION['Username'];
	if($bayar<$jmltotal){
		echo "<script>alert('Jumlah Bayar Kurang dari $jmltotal !')</script>";
	}else{
	include "config/config.php";
	$sqls="update penjualan set total_harga='$jmltotal', bayar='$bayar', UserID='$UserID', Username='$Username' where penjualan_id='$penid'";
	$simpan=mysqli_query($mysqli,$sqls);
	$_SESSION['bayar']=$bayar;
	$_SESSION['jmltotal']=$jmltotal;
	}
}
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">