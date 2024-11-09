<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
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
    <div style="background-image: url(assets/img/theme/bg5.jpg); background-size: cover; background-position: 50% 30%;" class="header pb-6 pt-5 pt-md-7">
      <span class="mask bg-gradient-dark opacity-1"></span>

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <a href="customes.php">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0" hr>Pelanggan</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo $customers; ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-4 col-lg-6">
              <?php
              $ret = "SELECT COUNT(*) AS total_orders FROM penjualan";
              $stmt = $mysqli->prepare($ret);
              $stmt->execute();
              $res = $stmt->get_result();
              if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $orders = $row['total_orders'];
              } else {
                $orders = 0;
              }
              ?>
              <div class="card card-stats mb-4 mb-xl-0">
                <a href="products.php">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Produk</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo $products; ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="ni ni-bullet-list-67 text-white"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <a href="orders.php">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Transaksi</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo $orders; ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--7">
      
      <!-- Grafik Pendapatan and Produk Terlaris -->
      <div class="row mt-5">
        <div class="col-xl-6 mb-5 mb-xl-0">
          <div class="card shadow" style="height: 280px;">
            <div class="card-header border-0 pb-0">
              <h4 class="mb-0">Grafik Pendapatan</h4>
            </div>
            <div class="card-body">
              <canvas id="salesChart" style="height: 160px;"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-5 mb-xl-0">
          <div class="card shadow" style="height: 280px;">
            <div class="card-header border-0 pb-0">
              <h4 class="mb-0">Produk Terlaris</h4>
            </div>
            <div class="card-body">
              <canvas id="productChart" style="height: 160px;"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Penjualan Terbaru -->
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Penjualan Terbaru</h3>
                </div>
                <div class="col text-right">
                  <a href="orders.php" class="btn btn-sm btn-danger">Lihat Semua</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th class="py-2" width="200px">Tanggal</th>
                    <th class="py-2 text-end" width="100px">Total Harga</th>
                    <th class="py-2 px-3" width="200px">Pelanggan</th>
                    <th class="py-2" width="200px">Petugas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "config/config.php";
                  $batas = 5;
                  $sqldata = "SELECT p.*, u.Username, pe.NamaPelanggan 
                              FROM penjualan p
                              JOIN user u ON p.UserID = u.UserID
                              JOIN pelanggan pe ON p.PelangganID = pe.PelangganID
                              ORDER BY p.tanggal DESC
                              LIMIT $batas";
                  $resdata = mysqli_query($mysqli, $sqldata);
                  $no = 1;
                  while ($data = mysqli_fetch_array($resdata)) {
                    $tohar = number_format($data['total_harga'], 0, ",", ".");
                  ?>
                    <tr>
                      <td><?= $data['tanggal'] ?></td>
                      <td>RP <?= $tohar ?></td>
                      <td class="px-3"><?= $data['NamaPelanggan'] ?></td>
                      <td><?= $data['Username'] ?></td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php
      // Fetch the data for the last 6 months
      $currentMonth = date('m');
      $currentYear = date('Y');

      $months = array();
      $sales = array();

      for ($i = 0; $i < 6; $i++) {
        $month = $currentMonth - $i;
        $year = $currentYear;

        if ($month < 1) {
          $month += 12;
          $year--;
        }

        $monthName = date('M', mktime(0, 0, 0, $month, 1, $year));
        $sqlSales = "SELECT SUM(total_harga) AS total_sales 
                     FROM penjualan 
                     WHERE MONTH(tanggal) = '$month' 
                       AND YEAR(tanggal) = '$year'";
        $resSales = mysqli_query($mysqli, $sqlSales);
        $rowSales = mysqli_fetch_assoc($resSales);
        $totalSales = $rowSales['total_sales'] ?: 0;

        $months[] = $monthName;
        $sales[] = $totalSales;
      }

      // Fetch the data for the most sold products in the last month
      $sqlProducts = "SELECT dp.NamaProduk, SUM(dp.jumlah) AS total_sold 
                      FROM detail_penjualan dp
                      INNER JOIN penjualan p ON dp.penjualan_id = p.penjualan_id
                      WHERE DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= p.tanggal
                      GROUP BY dp.NamaProduk
                      ORDER BY total_sold DESC
                      LIMIT 5";
      $resProducts = mysqli_query($mysqli, $sqlProducts);
      $productData = array();
      $productLabels = array();
      while ($row = mysqli_fetch_assoc($resProducts)) {
        $productLabels[] = $row['NamaProduk'];
        $productData[] = $row['total_sold'];
      }
      ?>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
              label: 'Penjualan',
              data: <?php echo json_encode($sales); ?>,
              backgroundColor: [
                '#d85e5e',
                '#fb7b7b',
                '#ff988c',
                '#ffa98c',
                '#ffb88c',
                '#ffc8ab'
              ],
              borderColor: [
                '#d85e5e',
                '#fb7b7b',
                '#ff988c',
                '#ffa98c',
                '#ffb88c',
                '#ffc8ab'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            responsive: true,
            maintainAspectRatio: false
          }
        });

        var ctx2 = document.getElementById('productChart').getContext('2d');
        var productChart = new Chart(ctx2, {
          type: 'pie',
          data: {
            labels: <?php echo json_encode($productLabels); ?>,
            datasets: [{
              label: 'Produk Terlaris',
              data: <?php echo json_encode($productData); ?>,
              backgroundColor: [
                '#d85e5e',
                '#fb7b7b',
                '#ff988c',
                '#ffa98c',
                '#ffb88c'
              ],
              borderColor: [
                '#d85e5e',
                '#fb7b7b',
                '#ff988c',
                '#ffa98c',
                '#ffb88c'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });
      </script>

      <!-- Footer -->
      <?php require_once('partials/_footer.php'); ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>