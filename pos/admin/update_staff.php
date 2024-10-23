<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Udpate Staff
if (isset($_POST['UpdateStaff'])) {
  //Prevent Posting Blank Values
 if (empty($_POST["Username"]) || empty($_POST["NamaLengkap"]) || empty($_POST['Email']) || empty($_POST["Alamat"]) || empty($_POST['Password'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $Username = $_POST['Username'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Email = $_POST['Email'];
    $Alamat = $_POST['Alamat'];
    $Password = sha1(md5($_POST['Password']));
    $level = 'petugas';
    $update = $_GET['update'];
    //Insert Captured information to a database table
    $postQuery = "UPDATE user SET  Username =?, NamaLengkap =?, Email =?, Alamat =?, Password =? WHERE UserID =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssssi', $Username, $NamaLengkap, $Email, $Alamat, $Password, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Staff Updated" && header("refresh:1; url=hrm.php");
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
    $ret = "SELECT * FROM  user WHERE UserID = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($staff = $res->fetch_object()) {
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
                <h3>Please Fill All Fields</h3>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Username</label>
                      <input type="text" name="Username" class="form-control" value="<?php echo $staff->Username; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>NamaLengkap</label>
                      <input type="text" name="NamaLengkap" class="form-control" value="<?php echo $staff->NamaLengkap; ?>">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Email</label>
                      <input type="email" name="Email" class="form-control" value="<?php echo $staff->Email; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Alamat</label>
                      <input type="text" name="Alamat" class="form-control" value="<?php echo $staff->Alamat; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Password</label>
                      <input type="password" name="Password" class="form-control" value="">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateStaff" value="Update Staff" class="btn btn-success" value="">
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