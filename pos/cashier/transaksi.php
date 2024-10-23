<?php
session_start();
include('config/config.php');
require_once('partials/_head.php');

if (!isset($_SESSION['penid'])) {
    // If not, generate a new penjualan_id and save it in the session
    $penid = uniqid();
    $_SESSION['penid'] = $penid;
} else {
    $penid = $_SESSION['penid'];
}
?>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>
    <?php
$UserID = $_SESSION['UserID'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  user  WHERE UserID = '$UserID'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_object()
?>
<?php
$Username = $_SESSION['Username'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  user  WHERE Username = '$Username'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_object()
?>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php require_once('partials/_topnav.php'); ?>
<main class="container border py-3">
<br><br><br>
<!-- pencarian -->
<div class="row">
    <div class="col-sm-8">
        <!-- kiri -->

                <div class="row pb-2">
                    <div class="col-sm-8">
                        Penjualan ID : <?= $_SESSION['penid'] ?><br>
                        Kasir : <?= $_SESSION['Username'] ?><br>
                    </div>
                    <div class="col-sm-4">
                        <?php  
                        if(isset($_SESSION['PelangganID'])){
                            include "config/config.php";
                            $ipel=$_SESSION['PelangganID'];
                            $sqlplg="select * from pelanggan where PelangganID='$ipel'";
                            $resplg=mysqli_query($mysqli,$sqlplg);
                            $dtlg=mysqli_fetch_array($resplg);
                            if ($dtlg) {
                                // Pelanggan data exists
                                ?>
                                Nama Pelanggan : <?= $dtlg['NamaPelanggan'] ?>
                                <?php
                            } else {
                                // Pelanggan data is null, set it to 'Guest'
                                ?>
                                Nama Pelanggan : Guest
                                <?php
                            }
                        } else {
                            ?>
                            <form class="d-flex" method="POST" action="pelanggan_simpan.php">
                                <input list="id_pelanggan" id="ip" name="ip" autocomplete="off" required placeholder="Pelanggan" class="form-control me-2" />
                                <datalist id="id_pelanggan">
                                    <option value="guest">Guest</option>
                                    <?php  
                                    include "config/config.php";
                                    $sqlpl="select * from pelanggan";
                                    $respl=mysqli_query($mysqli,$sqlpl);
                                    while($dtl=mysqli_fetch_array($respl)){
                                    ?>
                                    <option value="<?= $dtl['PelangganID'] ?>"><?= $dtl['kode_pelanggan'] ?> | <?= $dtl['NamaPelanggan'] ?> Hp. <?= $dtl['NomorTelepon'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                                <button class="btn btn-danger" type="submit" name="save">Simpan</button>
                            </form>
                        <?php
                        }
                        ?>
                            
                    </div>
                </div>

            <?php
            if(!isset($_SESSION['bayar'])){ 
            ?>
<!-- awal form transaksi -->

                <div class="row">
                    <div class="col-sm-8">
                        <form class="d-flex" method="POST" action="simpan.php">
                            <?php  
                            if(isset($_GET['kp'])){
                                $kp=$_GET['kp'];
                            ?>
                            <input class="form-control me-2" type="text" name="kp" value="<?= $kp ?>">
                            <?php
                            }else{
                            ?>
                            <input list="kode_produk" id="kp" name="kp" autocomplete="off" required placeholder="Kode Produk" class="form-control me-2" />
                            <datalist id="kode_produk">
                                <?php  
                                include "config/config.php";
                                $sqlp="select * from produk";
                                $resp=mysqli_query($mysqli,$sqlp);
                                while($dt=mysqli_fetch_array($resp)){
                                ?>
                                <option value="<?= $dt['kode_produk'] ?>"><?= $dt['NamaProduk'] ?> | <?= $dt['harga'] ?></option>
                                <?php
                                }
                                ?>
                            </datalist>

                            
                            <?php
                            }
                            ?> 
                    <input class="form-control me-2" type="number" placeholder="Jumlah" name="jp" value="1" style="width:100px">
                    <button class="btn btn-danger" type="submit" name="save">Simpan</button>
                </form>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-grid">
                            <a href="products.php" class="btn btn-success btn-block">Lihat Daftar Produk</a>
                        </div>
                    </div>
                </div>
<!-- akhir form transaksi -->
            <?php } ?>

        <div class="table-responsive-sm">
        <!-- Rest of the code remains the same -->
		<table class="table table-hover table-striped table-sm">
			<thead class="bg-danger text-white">
				<tr>
					<th class="py-2 px-3 rounded-start" width="55px">No.</th>
					<th class="py-2" width="100px">Kode</th>
					<th class="py-2">Nama Produk</th>
					<th class="py-2 text-end" width="100px">Harga</th>
					<th class="py-2 text-end" width="70px">Jumlah</th>
					<th class="py-2 text-end" width="120px">Total</th>
					<th class="py-2 text-center rounded-end" width="130px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				include "config/config.php";
				$penid=$_SESSION['penid'];
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
						<td class="px-3"><?= $no ?>.</td>
						<td><?= $data['kode_produk'] ?></td>
						<td><?= $data['NamaProduk'] ?></td>
						<td align="right"><?= $hp ?></td>
						<td align="right"><?= $jp ?></td>
						<td align="right"><?= $tot ?></td>
						<td align="right">
							<?php  
							if(isset($_SESSION['bayar'])){
							?>
							<!--<a href="" class="btn btn-success btn-sm disabled">Edit</a>-->
							<a class="btn btn-danger btn-sm disabled">Delete</a>
							<?php	
							}else{
							?>
							<!--<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?= $data['detail_id'] ?>">Edit</a>-->
							<a class="btn btn-warning btn-sm" href="delete.php?id=<?= $data['detail_id'] ?>" onclick="return confirm('Apakah Anda Yakin data penjualan produk <?= $data['NamaProduk'] ?> akan dihapus ?')" class="hapus">Delete</a>	
							<?php
							}
							?>
							
						</td>
				</tr>

		<!-- Modal Edit -->
		<div class="modal fade" id="modaledit<?= $data['detail_id'] ?>">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h3 class="modal-title">Edit Data Penjualan</h3>
		        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		      </div>
		      <form method="POST" action="update.php">
		      <!-- Modal body -->
		      <div class="modal-body">
		        <div class="row my-1">
		        	<div class="col-4">
		        		Kode Produk 
		        	</div>
		        	<div class="col-8">
		        		<input type="hidden" name="id" value="<?= $data['detail_id'] ?>">
		        		<input type="text" name="kp" class="form-control" value="<?= $data['kode_produk'] ?>" readonly>
		        	</div>
		        </div>
		        <div class="row my-1">
		        	<div class="col-4">
		        		Nama Produk 
		        	</div>
		        	<div class="col-8">
		        		<input type="text" name="np" class="form-control" value="<?= $data['NamaProduk'] ?>" readonly>
		        	</div>
		        </div>
		        <div class="row my-1">
		        	<div class="col-4">
		        		Harga 
		        	</div>
		        	<div class="col-8">
		        		<input type="text" name="hp" class="form-control" value="<?= $hp ?>" readonly>
		        	</div>
		        </div>
		        <div class="row my-1">
		        	<div class="col-4">
		        		Jumlah 
		        	</div>
		        	<div class="col-8">
		        		<input type="number" name="jp" class="form-control" value="<?= $data['jumlah'] ?>">
		        	</div>
		        </div>
		      </div>

		      <!-- Modal footer -->
		      	<div class="modal-footer">
		      	<button type="submit" class="btn btn-success" name="save">Simpan</button>
		        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
		      </div>
		    </form>
		    </div>
		  </div>
		</div>

		<!-- akhir modal Edit -->

				<?php  
				$no++;
				$jmltot=$jmltot+$total;
				$jmltotal=number_format($jmltot,0,",",".");
				}
				?>
			</tbody>
			<tfoot>
				<?php  
				if(isset($jmltotal)){
					$jmltotal=$jmltotal;
				}else{
					$jmltotal=0;
				}
				?>
				<tr>
					<td colspan="5" class="text-start py-2">Total</td>
					<td class="text-end"><b><?= $jmltotal ?></b></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		</div>
		</div>
		<!-- Modal Form -->
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog modal-lg modal-dialog-centered">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h3 class="modal-title">Daftar Produk</h3>
		        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		      </div>
		      <form method="POST" action="simpan.php?halaman=<?= $halaman ?>">
		      <!-- Modal body -->
		      <div class="modal-body modal-dialog-scrollable">
		        <div class="row my-1 p-2">
		        	<iframe src="produk.php" height="40px"></iframe>
		        </div>
		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		      </div>
		    </form>
		    </div>
		  </div>
		</div>

		<!-- akhir modal Form -->
	<div class="col-md-4">
		<div class="container border p-2 bg-secondary text-light rounded mb-2">
			<div class="row">
				<div class="col-4">Jumlah Total :</div>
				<div class="col-8">
					<h1 style="font-size:60px; text-align: right"><?= $jmltotal ?>,-</h1>
				</div>
			</div>
		</div>
		<?php  
		if(isset($_SESSION['bayar'])){
			$bayar=$_SESSION['bayar'];
			$kembali=$bayar-$jmltot;
			$byr=number_format($bayar,0,",",".");
			$kbl=number_format($kembali,0,",",".");
		?>
		<div class="container border p-2 bg-info text-light rounded mb-2">
			<div class="row">
				<div class="col-4">Bayar :</div>
				<div class="col-8">
					<h1 style="font-size:60px; text-align: right"><?= $byr ?>,-</h1>
				</div>
			</div>
		</div>
		<div class="container border p-2 bg-warning text-light rounded mb-2">
			<div class="row">
				<div class="col-4">Kembali :</div>
				<div class="col-8">
					<h1 style="font-size:60px; text-align: right"><?= $kbl ?>,-</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="d-grid">
			        <a href="selesai.php" class="btn btn-danger btn-block btn-lg">Selesai</a>
			    </div>
			</div>
			<div class="col">
				<div class="d-grid">
			        <a href="printbyr.php" target="cetak-nota" class="btn btn-secondary btn-block  btn-lg">Cetak</a>
			    </div>
			</div>
		</div>
		<div class="container p-2 rounded text-center my-0">
			<iframe name="cetak-nota" src="" width="100%" height="200px"></iframe>
		</div>
		
		<?php
		}else{
		?>
		<div class="container border p-2 bg-light text-dark rounded text-center my-1">
					<form class="d-flex" method="POST" action="bayar.php">
						<input type="hidden" name="jmltotal" value="<?= $jmltot ?>">
	        	<input class="form-control me-2" type="number" placeholder="Bayar" name="bayar">
	        	<button class="btn btn-danger" type="submit" name="save">Hitung</button>
      		</form>
		</div>
		<?php } ?>
	</div>

</main>

        <?php require_once('partials/_scripts.php'); ?>
    </div>
</body>
</html>