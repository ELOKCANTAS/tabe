<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['addProduct'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["NamaProduk"]) || empty($_POST['harga']) || empty($_POST['stok']) || empty($_POST["kode_produk"]) || empty($_POST['kategori'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $ProdukID = $_POST['ProdukID'];
    $kode_produk = $_POST['kode_produk'];
    $NamaProduk = $_POST['NamaProduk'];
    $ProdukImg = $_FILES['ProdukImg']['name'];
    move_uploaded_file($_FILES["ProdukImg"]["tmp_name"], "assets/img/products/" . $_FILES["ProdukImg"]["name"]);
    $stok = $_POST['stok'];
    $Harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO produk (ProdukID, kode_produk, NamaProduk, ProdukImg, stok, harga, kategori) VALUES(?, ?, ?, ?, ?, ?, ?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind parameters
    $rc = $postStmt->bind_param('sssssss', $ProdukID, $kode_produk, $NamaProduk, $ProdukImg, $stok, $Harga, $kategori);
    $postStmt->execute();
    //declare a variable which will be passed to alert function
    if ($postStmt) {
      $success = "Product Added" && header("refresh:1; url=add_product.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
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
              <h3>Silahkan Isi Semua Kolom</h3>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Nama Produk</label>
                    <input type="text" name="NamaProduk" class="form-control">
                    <input type="hidden" name="ProdukID" value="<?php echo $ProdukID; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Kode Produk</label>
                    <input type="text" name="kode_produk" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Harga Produk</label>
                    <input type="text" name="harga" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Foto Produk</label>
                    <input type="file" name="ProdukImg" class="btn btn-outline-success form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                      <option value="">Pilih Kategori</option>
                      <option value="makanan">Makanan</option>
                      <option value="minuman">Minuman</option>
                      <option value="snack">Snack</option>
                      <option value="perlengkapan rumah">Perlengkapan Rumah</option>
                    </select>
                  </div>
                </div>
                <hr>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addProduct" value="Tambah Produk" class="btn btn-success mt-4" value="">
                  </div>
                </div>
              </form>
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