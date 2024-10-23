<?php  
if(isset($_POST['save'])){
	$kp=$_POST['kp'];
	$jp=$_POST['jp'];
	$id=$_POST['id'];
	include "config/config.php";
	$sqltr="select * from detail_penjualan where detail_id='$id'";
	$restr=mysqli_query($mysqli,$sqltr);
	$dtr=mysqli_fetch_array($restr);
	$jmbr=$dtr['jumlah'];

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
	$stokakhir=$stokawal-$jmlst+$jmltp+$jmbr;
	$sp=number_format($stokakhir,0,",",".");
	if($jp>$stokakhir){
		echo "<script>alert('Stok Produk tinggal $sp ! jumlah penjualan tidak boleh lebih dari $sp')</script>";
	}
	else if($jp<=0){
		echo "<script>alert('Jumlah Penjualan tidak boleh kurang dari 1')</script>";
	}
	else{
	$sqle="update detail_penjualan set jumlah='$jp' where detail_id='$id'";
	$simpan=mysqli_query($mysqli,$sqle);
	}
}
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">