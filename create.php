  <html>
  <head>
    <title>MySQLi Create Record</title>
    <link rel="stylesheet" href="stylecreate.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  </head>
  <body>
    <form action='simpan2.php' method='post' border='0'>
      <div class="container">
        <h1>Form</h1> 
        <p>Isi form untuk membuat akun.</p>
        <hr>
        <input type='text' placeholder="Enter Username" name='Username' /><br><br>
        <input type='text' placeholder="Enter Password" name='Password' /><br><br>
        <input type='text' placeholder="Enter email" name='Email' /><br><br>
        <input type='text' placeholder="Enter nama lengkap" name='NamaLengkap' /><br><br>
        <input type='text' placeholder="Enter Alamat" name='Alamat' /><br><br>
        <label for="level">Level:</label><br>
        <select id="level" name="level">
          <option value="petugas">Petugas</option>
          <option value="admin">Admin</option>
        </select><br><br>
        <hr>
        <p>Dengan membuat akun, kalian sudah menyetujui syarat dan ketentuan <a href="#">zSyarat dan Ketentuan</a>.</p>
        <input type='hidden' name='action' value='create' />
        <input type='submit' value='Save' class="registerbtn" />
      </div>
      <div class="container signin">
        <p>Already have an account? <a href='index.html'>Sign in</a>.</p>
        <script src="bootstrap/js/bootstrap.min.js"></script>
      </div>
    </form>
  </body>
  </html> 