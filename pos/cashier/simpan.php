<?php  
session_start();
if(isset($_POST['save'])){
	$kp=$_POST['kp'];
	$jp=$_POST['jp'];
	$penid=$_SESSION['penid'];
	// $halaman=$_GET['halaman'];
	include "config/config.php";
	$sqlpr="select * from produk where kode_produk='$kp'";
	$respr=mysqli_query($mysqli,$sqlpr);
	$data=mysqli_fetch_array($respr);
	$stokawal=$data['stok'];
	$sqlst="select * from detail_penjualan where kode_produk='$kp'";
	$resst=mysqli_query($mysqli,$sqlst);
	$jmlst=0;
	while($dtst=mysqli_fetch_array($resst)){
		$jml=$dtst['jumlah'];
		$jmlst=$jmlst+$jml;
	}
	$sqltp="select * from tambah_stok where kode_produk='$kp'";
	$restp=mysqli_query($mysqli,$sqltp);
	$jmltp=0;
	while($dttp=mysqli_fetch_array($restp)){
		$jml=$dttp['jumlah'];
		$jmltp=$jmltp+$jml;
	}
	$stokakhir=$stokawal-$jmlst+$jmltp;
	$sp=number_format($stokakhir,0,",",".");
	if($jp>$stokakhir){
		echo "<script>alert('Stok Produk tinggal $sp ! jumlah penjualan tidak boleh lebih dari $sp')</script>";
	}
	else if($jp<=0){
		echo "<script>alert('Jumlah Penjualan tidak boleh kurang dari 1')</script>";
	}
	else{

	$sql="select * from produk where kode_produk='$kp'";
	$result=mysqli_query($mysqli,$sql);
	$dt=mysqli_fetch_array($result);
	$np=$dt['NamaProduk'];
	$hp=$dt['harga'];
	$sqls="insert into detail_penjualan (kode_produk, NamaProduk, harga, jumlah, penjualan_id) values ('$kp', '$np', '$hp','$jp','$penid')";
	$simpan=mysqli_query($mysqli,$sqls);
	}
}
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">