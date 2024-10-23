<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>

<body>
    <!-- Sidenav -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('partials/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            Pemesanan
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">Kode</th>
                                        <th scope="col">Pelanggan</th>
                                        <th scope="col">Total Harga</th>
                                        <th scop="col">Status</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM  penjualan ORDER BY `DibuatPada` DESC  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($order = $res->fetch_object()) {
                                

                                    ?>
                                        <tr>
                                            <th class="text-success" scope="row"><?php echo $order->kode_penjualan; ?></th>
                                            <td><?php echo $order->NamaPelanggan; ?></td>
                                            <td>RP <?php echo number_format($order->TotalHarga, 0, '.', ','); ?></td>
                                            <td><?php if ($order->status == '') {
                                                    echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                                                } else {
                                                    echo "<span class='badge badge-success'>$order->status</span>";
                                                } ?></td>
                                            <td><?php echo date('d/M/Y g:i', strtotime($order->DibuatPada)); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>