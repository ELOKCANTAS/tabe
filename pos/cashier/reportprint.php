<?php  
session_start();
if(isset($_GET['tgl'])){
 $tgl=$_GET['tgl'];
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembayaran <?= date("Ymd-His") ?></title>
    <link rel="stylesheet" href="reportprint.css?time=<?= md5(time()) ?>">
</head>
<body class="struk" onload="printOut()">
<section class="sheet">
<center>
    <br>
    <h2 style="margin:0px">TABE MART</h2>
    Jl. Siliwangi No. 30 Kadipaten Majalengka<br>
    Telp. 088222333001 <br><br>
    <?php  
    if(isset($_GET['tgl'])){
        
        $tgl=$_GET['tgl'];
        $tg=substr($tgl,8,2);
        $bl=substr($tgl,5,2);
        $th=substr($tgl,0,4);
        $bul=number_format($bl);
        $bln=["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        if($tg==""){
            $tanggal="Bulan ".$bln[$bul]." ".$th;
        }else{
            $tanggal="Tanggal ".$tg." ".$bln[$bul]." ".$th;
        }
    }else{
        $tanggal="";
        
    }
    ?>
        <b>Laporan Penjualan <?= $tanggal ?></b>
        <?php 
       
        ?>
</center>
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<td colspan="8"><?php echo str_repeat("=", 130) ?></td>
		</tr>
		<tr>
			<th width="30px" style="padding-left: 10px;">No.</th>
			<th width="70px">Tanggal</th>
			<th width="70px">Kode</th>
			<th>Nama Produk</th>
			<th width="70px" align="right">Harga</th>
			<th width="40px" align="right">Jml</th>
			<th width="80px" align="right">Total</th>
			
		</tr>
		<tr>
			<td colspan="8"><?php echo str_repeat("-", 130) ?></td>
		</tr>
	</thead>
	<tbody>
		<?php  
		include "config/config.php";
		$sql="select penjualan.tanggal, penjualan.UserID, penjualan.Username, detail_penjualan.kode_produk, detail_penjualan.NamaProduk, detail_penjualan.harga, detail_penjualan.jumlah, detail_penjualan.harga*detail_penjualan.jumlah as tot from detail_penjualan, penjualan where penjualan.penjualan_id=detail_penjualan.penjualan_id and penjualan.tanggal like '$tgl%'";
		
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
				<td style="padding-left: 10px;"><?= $no ?>.</td>
				<td><?= substr($data['tanggal'],0,10) ?></td>
				<td><?= $data['kode_produk'] ?></td>
				<td><?= $data['NamaProduk'] ?></td>
				<td align="right"><?= $hp ?></td>
				<td align="right" class="px-3"><?= $jp ?></td>
				<td align="right" class="px-3"><?= $tot ?></td>
				
		</tr>

		<?php  
		$no++;
		$jmltot=$jmltot+$total;
		$jmltotal=number_format($jmltot,0,",",".");

		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="8"><?php echo str_repeat("-", 130) ?></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="5">
				<b>Total :</b>
			</td>
			<td align="right">
				<?php  
				if(empty($jmltotal)){
				$jmltotal=0;
				}
				?>
				<b><?= $jmltotal ?></b>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="8"><?php echo str_repeat("=", 130) ?></td>
		</tr>
	</tfoot>
</table>
<br>
<?php  
$tglskr=date("Y-m-d");
$tgs=substr($tglskr,8,2);
$bls=substr($tglskr,5,2);
$ths=substr($tglskr,0,4);
$buls=number_format($bls);
$buln=["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
$tglsekarang=$tgs." ".$buln[$buls]." ".$ths;
?>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px" align="center">
			<p>Majalengka, <?= $tglsekarang ?><br>
			Direktur,
			<br><br><br><br><br>
			_______________________
			</p>
		</td>
	</tr>
</table>

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
