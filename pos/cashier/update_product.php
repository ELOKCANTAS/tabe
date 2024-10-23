<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['UpdateProduct'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["NamaProduk"]) || empty($_POST['harga']) || empty($_POST['stok']) || empty($_POST["kode_produk"])) {
        $err = "Blank Values Not Accepted";
    } else {
        $update = $_GET['update'];
        $kode_produk = $_POST['kode_produk'];
        $NamaProduk = $_POST['NamaProduk'];
        $ProdukImg = $_FILES['ProdukImg']['name'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];

        // Check if a new image was uploaded
        if (empty($ProdukImg)) {
            // If no new image was uploaded, get the existing image name
            $sql = "SELECT ProdukImg FROM produk WHERE ProdukId = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('s', $update);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $ProdukImg = $row['ProdukImg'];
        } else {
            // If a new image was uploaded, move it to the assets/img/products directory
            move_uploaded_file($_FILES["ProdukImg"]["tmp_name"], "assets/img/products/" . $_FILES["ProdukImg"]["name"]);
        }

        //Insert Captured information to a database table
        $postQuery = "UPDATE produk SET kode_produk =?, NamaProduk =?, ProdukImg =?, stok =?, harga =? WHERE ProdukId = ?";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('ssssss', $kode_produk, $NamaProduk, $ProdukImg, $stok, $harga, $update);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Product Updated" && header("refresh:1; url=products.php");
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
        $update = $_GET['update'];
        $ret = "SELECT * FROM  produk WHERE ProdukId = ?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('s', $update);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($prod = $res->fetch_object()) {
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
                                <h3>Update</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label>Nama Produk</label>
                                            <input type="text" value="<?php echo $prod->NamaProduk; ?>" name="NamaProduk" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Kode produk</label>
                                            <input type="text" name="kode_produk" value="<?php echo $prod->kode_produk; ?>" class="form-control" value="">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label>Foto Produk</label>
                                            <input type="file" name="ProdukImg" class="btn btn-outline-success form-control">
                                            <p>Current image: <?php echo $prod->ProdukImg; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Harga</label>
                                            <input type="text" name="harga" class="form-control" value="<?php echo $prod->harga; ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label>Stok</label>
                                            <input type="text" name="stok" class="form-control" value="<?php echo $prod->stok; ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <input type="submit" name="UpdateProduct" value="Update Product" class="btn btn-success" value="">
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
        }
        ?>
            </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>