<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

// Fetch the latest orders by default
$sql = "SELECT penjualan.tanggal, penjualan.UserID, penjualan.Username, detail_penjualan.kode_produk, detail_penjualan.NamaProduk, detail_penjualan.harga, detail_penjualan.jumlah, detail_penjualan.harga*detail_penjualan.jumlah AS tot 
        FROM detail_penjualan 
        JOIN penjualan ON penjualan.penjualan_id = detail_penjualan.penjualan_id
        ORDER BY penjualan.tanggal DESC
        LIMIT 20";
$result = mysqli_query($mysqli, $sql);
$no = 1;
$jmltot = 0;
?>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>

    <br><br><br>
    <main class="container border py-2 mt-2 custom-margin table-responsive">
        
      

        <!-- pencarian -->

        <div class="row">
            <?php
            if (isset($_POST['tgl'])) {
               
                $tgl = $_POST['tgl'];
                $tg = substr($tgl, 8, 2);
                $bl = substr($tgl, 5, 2);
                $th = substr($tgl, 0, 4);
                // Check if the $bl variable is empty and assign a default value
                if (empty($bl)) {
                    $bul = 0;
                } else {
                    $bul = intval($bl);
                }
                $bln = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                if ($tg == "") {
                    $tanggal = "Bulan " . $bln[$bul] . " " . $th;
                } else {
                    $tanggal = "Tanggal " . $tg . " " . $bln[$bul] . " " . $th;
                }

                // Fetch the orders based on the selected date or month
                $sql = "SELECT penjualan.tanggal, penjualan.UserID, penjualan.Username, detail_penjualan.kode_produk, detail_penjualan.NamaProduk, detail_penjualan.harga, detail_penjualan.jumlah, detail_penjualan.harga*detail_penjualan.jumlah AS tot 
                        FROM detail_penjualan 
                        JOIN penjualan ON penjualan.penjualan_id = detail_penjualan.penjualan_id
                        WHERE penjualan.tanggal LIKE '$tgl%' 
                        ORDER BY penjualan.tanggal DESC";
                $result = mysqli_query($mysqli, $sql);
                $no = 1;
                $jmltot = 0;
            } else {
                $tanggal = "";
                
            }
            ?>
            <div class="col-sm-8"><h5>Laporan Penjualan Terbaru <?= $tanggal ?></h5></div>
            <?php
            
            ?>

        </div>

        <!-- akhir pencarian -->
  <div class="row">
            <div class="col">
                <div class="border p-3 my-3 bg-danger text-light rounded">
                    <h4 class="text-light">Laporan Harian</h4>
                    <form class="d-flex" method="POST" action="">
                        <input class="form-control me-2 mx-2" type="date" name="tgl">
                        
                       
                        <button class="btn btn-light" type="submit">Tampilkan</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="border p-3 my-3 bg-danger text-light rounded">
                    <h4 class="text-light">Laporan Bulanan</h4>
                    <form class="d-flex" method="POST" action="">
                          <input class="form-control me-2 mx-2" type="month" name="tgl">
                       
                        <button class="btn btn-light" type="submit">Tampilkan</button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-hover table-striped table-sm">

            <thead class="bg-danger text-white">
                <tr>
                    <th class="py-2 px-3 rounded-start" width="55px">No.</th>
                    <th class="py-2" width="100px">Tanggal</th>
                    <th class="py-2" width="100px">Kode</th>
                    <th class="py-2">Nama Produk</th>
                    <th class="py-2 text-end" width="100px">Harga</th>
                    <th class="py-2 px-3 text-end" width="100px">Jumlah</th>
                    <th class="py-2 px-3 text-end" width="100px">Total</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                    $hp = number_format($data['harga'], 0, ",", ".");
                    $jp = number_format($data['jumlah'], 0, ",", ".");
                    $total = $data['harga'] * $data['jumlah'];
                    $tot = number_format($total, 0, ",", ".");
                ?>
                    <tr>
                        <td class="px-3"><?= $no ?>.</td>
                        <td><?= substr($data['tanggal'], 0, 10) ?></td>
                        <td><?= $data['kode_produk'] ?></td>
                        <td><?= $data['NamaProduk'] ?></td>
                        <td align="right"><?= $hp ?></td>
                        <td align="right" class="px-3"><?= $jp ?></td>
                        <td align="right" class="px-3"><?= $tot ?></td>
                        
                    </tr>

                <?php
                    $no++;
                    $jmltot = $jmltot + $total;
                    $jmltotal = number_format($jmltot, 0, ",", ".");
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td colspan="5" class="text-start py-2">
                        <b>Total :</b>
                    </td>
                    <td class="text-end px-3">
                        <?php
                        if (empty($jmltotal)) {
                            $jmltotal = 0;
                        }
                        ?>
                        <b><?= $jmltotal ?></b>
                    </td>
                    <td></td>
                </tr>

            </tfoot>
        </table>
        <a href="reportprint.php?tgl=<?= $tgl ?>" target="blank" class="btn btn-danger">Cetak Laporan</a>
        <br>
        </div>
    </main>
    <style>
        .custom-margin {
            margin-right: 0px;
            /* Adjust the value as needed */
        }
    </style>
    <br><br>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <?php require_once('partials/_scripts.php'); ?>
</body>
</html>