<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php require_once('partials/_topnav.php'); ?>

        <!-- Header -->
        <main class="container border py-3 table-responsive">
            <br><br><br>
            <!-- Pencarian -->
            <div class="row">
                <div class="col-sm-8"><h3>Penjualan Terbaru</h3></div>
                <div class="col-sm-4">
                    <form class="d-flex" method="GET" action="">
                        <input class="form-control me-2" type="date" name="tgl">
                        <button class="btn btn-danger" type="submit">Cari</button>
                    </form>
                </div>
            </div>
            <!-- Akhir pencarian -->

            <table class="table table-hover table-striped table-sm">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="py-2 px-3 rounded-start" width="55px">No.</th>
                        <th class="py-2" width="200px">Tanggal</th>
                        <th class="py-2 text-end" width="100px">Total Harga</th>
                        <th class="py-2 text-end" width="100px">Bayar</th>
                        <th class="py-2 text-end" width="100px">Kembali</th>
                        <th class="py-2 px-3" width="200px">Pelanggan</th>
                        <th class="py-2" width="200px">Petugas</th>
                        <th class="py-2 text-center rounded-end" width="130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "config/config.php";
                    $UserID = $_SESSION['UserID'];
                    $sqlUserInfo = "SELECT Username FROM user WHERE UserID = '$UserID'";
                    $resUserInfo = mysqli_query($mysqli, $sqlUserInfo);
                    $userInfo = mysqli_fetch_array($resUserInfo);
                    $Username = $userInfo['Username'];

                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;
                    $tglskr = date("Y-m-d");

                    if (isset($_GET['tgl'])) {
                        $tgl = $_GET['tgl'];
                        $sqldata = "SELECT * FROM penjualan WHERE tanggal LIKE '$tgl%' AND UserID='$UserID'";
                    } else {
                        $sqldata = "SELECT * FROM penjualan WHERE tanggal LIKE '$tglskr%' AND UserID='$UserID'";
                    }

                    $resdata = mysqli_query($mysqli, $sqldata);
                    $jumlah_data = mysqli_num_rows($resdata);
                    $total_halaman = ceil($jumlah_data / $batas);

                    if (isset($_GET['tgl'])) {
                        $tgl = $_GET['tgl'];
                        $sql = "SELECT * FROM penjualan WHERE tanggal LIKE '$tgl%' AND UserID='$UserID' LIMIT $halaman_awal, $batas";
                    } else {
                        $sql = "SELECT * FROM penjualan WHERE tanggal LIKE '$tglskr%' AND UserID='$UserID' LIMIT $halaman_awal, $batas";
                    }

                    $result = mysqli_query($mysqli, $sql);
                    $no = $halaman_awal + 1;

                    while ($data = mysqli_fetch_array($result)) {
                        $tohar = number_format($data['total_harga'], 0, ",", ".");
                        $byr = number_format($data['bayar'], 0, ",", ".");
                        $kembali = $data['bayar'] - $data['total_harga'];
                        $kbl = number_format($kembali, 0, ",", ".");
                        $PelangganID = $data['PelangganID'];
                        $UserID = $data['UserID'];

                        $sqlpetugas = "SELECT * FROM user WHERE UserID='$UserID'";
                        $respetugas = mysqli_query($mysqli, $sqlpetugas);
                        $dtpetugas = mysqli_fetch_array($respetugas);

                        $sqlpelanggan = "SELECT * FROM pelanggan WHERE PelangganID='$PelangganID'";
                        $respelanggan = mysqli_query($mysqli, $sqlpelanggan);
                        $dtpelanggan = mysqli_fetch_array($respelanggan);

                        // Check if $dtpelanggan is null
                        if ($dtpelanggan == null) {
                            $namaPelanggan = 'Guest';
                        } else {
                            $namaPelanggan = $dtpelanggan['NamaPelanggan'];
                        }
                    ?>
                        <tr>
                            <td class="px-3"><?= $no ?>.</td>
                            <td><?= $data['tanggal'] ?></td>
                            <td align="right"><?= $tohar ?></td>
                            <td align="right"><?= $byr ?></td>
                            <td align="right"><?= $kbl ?></td>
                            <td class="px-3"><?= $namaPelanggan ?></td>
                            <td><?= $dtpetugas['Username'] ?></td>
                            <td align="right">
                                <a href="printnota.php?penid=<?= $data['penjualan_id'] ?>&kbl=<?= $kbl ?>" target="blank" class="btn btn-secondary btn-sm">Cetak Nota</a>
                                <a href="detail_penjualan.php?penid=<?= $data['penjualan_id'] ?>&npet=<?= $dtpetugas['Username'] ?>&npel=<?= $namaPelanggan ?>&tgl=<?= $data['tanggal'] ?>&byr=<?= $byr ?>&kbl=<?= $kbl ?>&halaman=<?= $halaman ?>" class="btn btn-danger btn-sm">Detail</a>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modaledit<?= $data['penjualan_id'] ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Data Produk</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row my-1">
                                            <div class="col-12"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="save">Simpan</button>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir modal Edit -->

                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4 text-start py-3">
                                        <a class="btn btn-danger" href="penjualan_simpan.php">[+] Penjualan Baru</a>
                                    </div>
                                    <div class="col-8 text-end py-3">

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </main>

        <!-- Modal Form -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Input Data Produk</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="simpan.php?halaman=<?= $halaman ?>">
                        <div class="modal-body">
                            <div class="row my-1">
                                <div class="col-4">Kode Produk</div>
                                <div class="col-8"><input type="text" name="kp" class="form-control"></div>
                            </div>
                            <div class="row my-1">
                                <div class="col-4">Nama Produk</div>
                                <div class="col-8"><input type="text" name="np" class="form-control"></div>
                            </div>
                            <div class="row my-1">
                                <div class="col-4">Harga</div>
                                <div class="col-8"><input type="text" name="hp" class="form-control"></div>
                            </div>
                            <div class="row my-1">
                                <div class="col-4">Stok</div>
                                <div class="col-8"><input type="text" name="sp" class="form-control"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="save">Simpan</button>
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir modal Form -->

        <?php require_once('partials/_scripts.php'); ?>
    </div>
</body>
</html>