<?php
session_start();
include('config.php');

//login 
if (isset($_POST['login'])) {
  $Email = $_POST['Email'];
  $Password = sha1(md5($_POST['Password'])); //double encrypt to increase security
  $stmt = $mysqli->prepare("SELECT Email, Password, UserID, level FROM user WHERE (Email =? AND Password =?)"); //sql to log in user
  $stmt->bind_param('ss', $Email, $Password); //bind fetched parameters
  $stmt->execute(); //execute bind 
  $stmt->bind_result($Email, $Password, $UserID, $level); //bind result
  $rs = $stmt->fetch();
  $_SESSION['UserID'] = $UserID;
  $_SESSION['level'] = $level;

  if ($rs) {
    // Redirect user based on their level
    if ($level == 'admin') {
      header("location:pos/admin/dashboard.php");
    } elseif ($level == 'petugas') {
      header("location:pos/cashier/dashboard.php");
    } else {
      $err = "Akun Anda tidak terdaftar atau tidak aktif.";
    }
  } else {
    $err = "Kombinasi Email dan Password tidak valid.";
  }
}

require_once('partials/_head.php');
?>
<body  class="bg-dark">
  <div class="main-content">
    <div class="header bg-gradient-primar py-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Kasir BD_MART</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" required name="Email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required name="Password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                  <span class="text-muted">Remember Me</span><br>
                  <a href="register.php">Or Register here</a>

                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary my-4">Log In</button>
                </div>
              </form>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <a href="forgot_pwd.php" class="text-light"><small>Forgot password?</small></a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
  require_once('partials/_footer.php');
  ?>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>