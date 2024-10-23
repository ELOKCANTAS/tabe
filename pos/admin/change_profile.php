<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Update Profile
if (isset($_POST['ChangeProfile'])) {
  $UserID = $_SESSION['UserID'];
  $Username = $_POST['Username'];
  $Email = $_POST['Email'];
  $Qry = "UPDATE user SET Username =?, Email =? WHERE UserID =?";
  $postStmt = $mysqli->prepare($Qry);
  //bind paramaters
  $rc = $postStmt->bind_param('sss', $Username, $Email, $UserID);
  $postStmt->execute();
  //declare a varible which will be passed to alert function
  if ($postStmt) {
    $success = "Akun Diperbarui" && header("refresh:1; url=dashboard.php");
  } else {
    $err = "Coba Lagi Nanti";
  }
}
if (isset($_POST['changePassword'])) {
    // Change Password
    $error = 0;
    if (empty($_POST['old_password'])) {
        $error = 1;
        $err = "Old Password Cannot Be Empty";
    } else {
        $old_password = mysqli_real_escape_string($mysqli, $_POST['old_password']);
    }

    if (empty($_POST['new_password'])) {
        $error = 1;
        $err = "New Password Cannot Be Empty";
    } else {
        $new_password = mysqli_real_escape_string($mysqli, $_POST['new_password']);
    }

    if (empty($_POST['confirm_password'])) {
        $error = 1;
        $err = "Password confirmation cannot be empty";
    } else {
        $confirm_password = mysqli_real_escape_string($mysqli, $_POST['confirm_password']);
    }

    if (!$error) {
        $UserID = $_SESSION['UserID'];
        $sql = "SELECT * FROM user WHERE UserID = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $UserID);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if (!password_verify($old_password, $row['Password'])) {
                $err = "Incorrect old password";
            } elseif ($new_password != $confirm_password) {
                $err = "Passwords do not match";
            } else {
                // Hash the new password before updating
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query = "UPDATE user SET Password = ? WHERE UserID = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param('ss', $hashed_new_password, $UserID);
                $stmt->execute();

                if ($stmt) {
                    $success = "Password updated successfully";
                    header("refresh:1; url=dashboard.php");
                } else {
                    $err = "Try again later";
                }
            }
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
    $UserID = $_SESSION['UserID'];
    //$login_id = $_SESSION['login_id'];
    $ret = "SELECT * FROM  user  WHERE UserID = '$UserID'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($admin = $res->fetch_object()) {
    ?>
      <!-- Header -->
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/restro00.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-white">Halo <?php echo $admin->Username; ?></h1>
              <p class="text-white mt-0 mb-5">Ini adalah halaman profil, kamu bisa mengkostumisasi profil dan mengganti password.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--8">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="assets/img/theme/user-a-min.png" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                      </div>
                      <div>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                    <?php echo $admin->Username; ?></span>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i><?php echo $admin->Email; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Akun ku</h3>
                  </div>
                  <div class="col-4 text-right">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Nama Pengguna</label>
                          <input type="text" name="Username" value="<?php echo $admin->Username; ?>" id="input-username" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class=" col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Email</label>
                            <input type="email" id="input-email" value="<?php echo $admin->Email; ?>" name="Email" class="form-control form-control-alternative">
                          </div>
                        </div>

                        <div class="col-lg-12">
                          <div class="form-group">
                            <input type="submit" id="input-email" name="ChangeProfile" class="btn btn-success form-control-alternative" value="Kirim">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <hr>
              <form method ="post">
                            <h6 class="heading-small text-muted mb-4">Ganti Password</h6>
                            <div class="pl-lg-4">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Password lama</label>
                                    <input type="password" name="old_password" id="input-username" class="form-control form-control-alternative">
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">Password baru</label>
                                    <input type="password" name="new_password" class="form-control form-control-alternative">
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">Konfirmasi Password</label>
                                    <input type="password" name="confirm_password" class="form-control form-control-alternative">
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <input type="submit" id="input-email" name="changePassword" class="btn btn-success form-control-alternative" value="Ganti Password">
                                  </div>
                                </div>
                              </div>
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
  require_once('partials/_sidebar.php');
  ?>
</body>

</html>