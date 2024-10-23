<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

//Add Staff
if (isset($_POST['addStaff'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["Username"]) || empty($_POST["NamaLengkap"]) || empty($_POST['Email']) || empty($_POST["Alamat"]) || empty($_POST['Password'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $Username = $_POST['Username'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Email = $_POST['Email'];
    $Alamat = $_POST['Alamat'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $level = 'petugas'; // Set level to 'petugas'

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO user (Username, NamaLengkap, Email, Alamat, Password, level) VALUES(?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind parameters
    $rc = $postStmt->bind_param('ssssss', $Username, $NamaLengkap, $Email, $Alamat, $Password, $level);
    $postStmt->execute();

    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Staff Added" && header("refresh:1; url=hrm.php");
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
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Username</label>
                    <input type="text" name="Username" class="form-control" value=" ">
                  </div>
                  <div class="col-md-6">
                    <label>Nama Lengkap</label>
                    <input type="text" name="NamaLengkap" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" name="Password" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Alamat</label>
                    <input type="text" name="Alamat" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addStaff" value="Add Staff" class="btn btn-success" value="">
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