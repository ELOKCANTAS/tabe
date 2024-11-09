<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $adn = "DELETE FROM  produk WHERE  ProdukID = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=products.php");
  } else {
    $err = "Try Again Later";
  }
}

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
    <div style="background-image: url(assets/img/theme/bg5.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-1"></span>
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
              <a href="add_product.php" class="btn btn-outline-danger">
                [+] Tambah Produk
              </a>
              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tambahstok">[+] Stok</button>

              <!-- Search bar -->
              <form method="GET" class="form-inline my-2 my-lg-0 float-right">
                <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk" aria-label="Search" name="search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cari</button>
              </form>

              <!-- Kategori dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Kategori
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="?kategori=makanan">Makanan</a></li>
                  <li><a class="dropdown-item" href="?kategori=minuman">Minuman</a></li>
                  <li><a class="dropdown-item" href="?kategori=snack">Snack</a></li>
                  <li><a class="dropdown-item" href="?kategori=perlengkapan rumah">Perlengkapan Rumah</a></li>
                  <li><a class="dropdown-item" href="products.php">Semua Kategori</a></li>
                </ul>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
                  $search = isset($_GET['search']) ? $_GET['search'] : '';
                  $ret = "SELECT * FROM  produk";
                  if ($kategori != '') {
                    $ret .= " WHERE kategori = '$kategori'";
                  }
                  if ($search != '') {
                    $ret .= " WHERE NamaProduk LIKE '%$search%'";
                  }
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td>
                        <?php
                        if ($prod->ProdukImg) {
                          echo "<img src='assets/img/products/$prod->ProdukImg' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }
                        ?>
                      </td>
                      <td><?php echo $prod->kode_produk; ?></td>
                      <td><?php echo $prod->NamaProduk; ?></td>
                      <td><?php echo $prod->kategori; ?></td>
                      <td>RP <?php echo number_format($prod->harga, 0, '.', ','); ?></td>
                      <td><?php echo $prod->stok; ?></td>
                      <td>
                        <a href="products.php?delete=<?php echo $prod->ProdukID; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Hapus
                          </button>
                        </a>

                        <a href="update_product.php?update=<?php echo $prod->ProdukID; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="tambahstok">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title">Tambah Stok</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="tambah_stok_simpan.php">
              <!-- Modal body -->
              <div class="modal-body">
                <div class="row my-1">
                  <div class="col-4">
                    Kode Produk
                  </div>
                  <div class="col-8">
                    <input list="kode_produk" id="kp" name="kp" autocomplete="off" placeholder="Kode Produk" class="form-control me-2" />
                    <datalist id="kode_produk">
                      <?php
                      include "config/config.php";
                      $sqlp = "select * from produk";
                      $resp = mysqli_query($mysqli, $sqlp);
                      while ($dtp = mysqli_fetch_array($resp)) {
                      ?>
                        <option value="<?= $dtp['kode_produk'] ?>"><?= $dtp['NamaProduk'] ?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>

                <div class="row my-1">
                  <div class="col-4">
                    Jumlah
                  </div>
                  <div class="col-8">
                    <input type="number" name="jml" class="form-control">
                  </div>
                </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="save">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
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

  <!-- Add this script at the end of the file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>