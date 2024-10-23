<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
 .gradient-custom-2 {
  background: white;
}

@media (min-width: 768px) {
  .gradient-form {
    /* Remove the height: 100vh !important; */
  }
} 

@media (min-width: 769px) {
  .gradient-custom-2 {
    border-top-right-radius: 0.3rem;
    border-bottom-right-radius: 0.3rem;
  }
}

.form-group {
  margin-bottom: 1.5rem;
}
  </style>
</head>
<body style=" background: #DA4F60;">
<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4" >

                <div class="text-center">
                  <img src="pos/admin/assets/img/brand/logo.jpg" class="mt-5 mb-3" style="width: 350px;" alt="logo">
                  
                </div>


              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-secondary px-3 py-4 p-md-5 mx-md-4">
                <form action='simpan2.php' method='post' class="container">
                  <h1>Form</h1>
                  <p>Isi Untuk Membuat Akun</p>
                  <div class="form-group">
                    <input type='text' placeholder="Enter Username" name='Username' />
                  </div>
                  <div class="form-group">
                    <input type='password' placeholder="Enter Password" name='Password' />
                  </div>
                  <div class="form-group">
                    <input type='email' placeholder="Enter email" name='Email' />
                  </div>
                  <div class="form-group">
                    <input type='text' placeholder="Enter full name" name='NamaLengkap' />
                  </div>
                  <div class="form-group">
                    <input type='text' placeholder="Enter Address" name='Alamat' />
                  </div>
                  <div class="form-group">
                    <label for="level">Level:</label>
                    <select id="level" name="level">
                      <option value="petugas">Petugas</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                  <input type='hidden' name='action' value='create' />
                  <input type='submit' value='Save' class="registerbtn" />
                  <div class="signin">
                    <p>Sudah ada akun? <a href='pos/admin/index.php'>Sign in</a>.</p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>