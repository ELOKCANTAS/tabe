<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

if (isset($_GET['penid'])) {
    $penid = $_GET['penid'];
    $npet = $_GET['npet'];
    $npel = $_GET['npel'];
    $tgl = $_GET['tgl'];
    $byr = $_GET['byr'];
    $kbl = $_GET['kbl'];
    $halaman = $_GET['halaman'];
?>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>

    <!-- Main content -->
    <main class="container border">
        <br><br><br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">Penjualan ID</div>
                            <div class="col-8">: <b><?= $penid ?></b></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Tanggal</div>
                            <div class="col-8">: <b><?= $tgl ?></b></div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-4 mb-3">
                        <div class="row">
                            <div class="col-8">Nama Petugas</div>
                            <div class="col-4">: <b><?= $npet ?></b></div>
                        </div>
                        <div class="row">
                            <div class="col-8">Nama Pelanggan</div>
                            <div class="col-4">: <b><?= $npel ?></b></div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-striped table-sm">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th class="py-2 px-3 rounded-start" width="55px">No.</th>
                            <th class="py-2 px-3" width="100px">Kode</th>
                            <th class="py-2">Nama Produk</th>
                            <th class="py-2 text-end" width="100px">Harga</th>
                            <th class="py-2 px-3 text-end" width="100px">Jumlah</th>
                            <th class="py-2 px-3 text-end rounded-end" width="100px">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config/config.php";
                        $penid = $_GET['penid'];
                        $sql = "select * from detail_penjualan where penjualan_id='$penid'";
                        $result = mysqli_query($mysqli, $sql);
                        $no = 1;
                        $jmltot = 0;
                        while ($data = mysqli_fetch_array($result)) {
                            $hp = number_format($data['harga'], 0, ",", ".");
                            $jp = number_format($data['jumlah'], 0, ",", ".");
                            $total = $data['harga'] * $data['jumlah'];
                            $tot = number_format($total, 0, ",", ".");
                        ?>
                            <tr>
                                <td class="px-3"><?= $no ?>.</td>
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
                            <td colspan="3" class="text-start py-1">
                                <a class="btn btn-secondary btn-sm" href="orders.php?halaman=<?= $halaman ?>">&laquo; Kembali</a>
                            </td>
                            <td class="text-start py-2">
                                Total :<br>
                                Bayar :<br>
                                Kembali :
                            </td>
                            <td colspan="2" class="text-end px-3">
                                <?= $jmltotal ?><br>
                                <?= $byr ?><br>
                                <?= $kbl ?><br>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>

    <?php require_once('partials/_scripts.php'); ?>
</body>
</html>
<?php } ?>