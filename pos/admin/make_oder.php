<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
include('config/code-generator.php');

// Function to generate a unique order code
function generate_code() {
    return 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999);
}

if (isset($_POST['place_order'])) {
    $kode_penjualan = generate_code();
    $totalHarga = $_POST['total_harga'];
    $pelangganID = $_POST['PelangganID'];

    // Fetch NamaPelanggan based on PelangganID
    $customer_query = "SELECT NamaPelanggan FROM pelanggan WHERE PelangganID = ?";
    $stmt = $mysqli->prepare($customer_query);
    $stmt->bind_param("s", $pelangganID);
    $stmt->execute();
    $stmt->bind_result($namaPelanggan);
    $stmt->fetch();
    $stmt->close();

    // Check if NamaPelanggan was retrieved
    if (!$namaPelanggan) {
        echo "<script>alert('Customer not found. Please select a valid customer.');</script>";
        exit;
    }

    $tanggalPenjualan = date('Y-m-d');

    // Insert into penjualan table
    $stmt = $mysqli->prepare("INSERT INTO penjualan (kode_penjualan, TanggalPenjualan, TotalHarga, PelangganID, NamaPelanggan) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssdis", $kode_penjualan, $tanggalPenjualan, $totalHarga, $pelangganID, $namaPelanggan);
        if ($stmt->execute()) {
            // Clear the cart after placing the order
            unset($_SESSION['cart']);
            echo "<script>alert('Order placed successfully!'); window.location='orders.php';</script>";
        } else {
            echo "<script>alert('Error placing order. Please try again.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Database error. Please try again.');</script>";
    }
}
?>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php require_once('partials/_topnav.php'); ?>
        
        <!-- Page content -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-5">Confirm Your Order</h2>

                    <form method="POST" action="">
                        <table class='table table-bordered table-striped'>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $total = 0;
                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $value) {
                                    $item_total = intval(str_replace('RP ', '', $value['Harga'])) * $value['quantity'];
                                    $total += $item_total;
                                    echo "
                                    <tr>
                                        <td>{$value['NamaProduk']}</td>
                                        <td>{$value['Harga']}</td>
                                        <td>{$value['quantity']}</td>
                                        <td>RP " . number_format($item_total, 0, '.', ',') . "</td>
                                    </tr>
                                    ";
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="3"><strong>Total Harga</strong></td>
                                <td><strong>RP <?php echo number_format($total, 0); ?></strong></td>
                            </tr>
                        </table>

                        <input type="hidden" name="total_harga" value="<?php echo $total; ?>">
                        
                        <div class="form-group">
                            <label for="PelangganID">Select Customer:</label>
                            <select name="PelangganID" id="PelangganID" class="form-control" required>
                                <option value="">Select Customer</option>
                                <?php
                                $customer_query = "SELECT PelangganID, NamaPelanggan FROM pelanggan";
                                $customer_result = $mysqli->query($customer_query);
                                while ($customer = $customer_result->fetch_object()) {
                                    echo "<option value='{$customer->PelangganID}'>{$customer->NamaPelanggan}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="place_order" class="btn btn-success">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once('partials/_scripts.php');
    ?>
</body>
</html>