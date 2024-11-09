<?php
session_start();
include('config/config.php');

//login 
if (isset($_POST['login'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password']; // Password yang dimasukkan oleh pengguna

    $stmt = $mysqli->prepare("SELECT Email, Password, UserID, level FROM user WHERE Email = ?");
    $stmt->bind_param('s', $Email);
    $stmt->execute();
    $stmt->bind_result($Email, $hashedPassword, $UserID, $level);
    $stmt->fetch();

    if (password_verify($Password, $hashedPassword)) {
        // Login berhasil
        $_SESSION['UserID'] = $UserID;
        $_SESSION['level'] = $level;

        // Redirect user based on their level
        if ($level == 'admin') {
            header("location:dashboard.php");
        } elseif ($level == 'petugas') {
            header("location:../cashier/dashboard.php");
        }
    } else {
        $err = "Kombinasi Email dan Password tidak valid.";
    }

    $stmt->close();
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
              <h1 class="text-white">TABE MART</h1>
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
                  
                  <div class="bg-secondary mt-3">
                  <a href="../../index.php">Kembali</a>
                </div>
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