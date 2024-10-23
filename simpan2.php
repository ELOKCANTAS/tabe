<?php
if (isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Email']) && isset($_POST['NamaLengkap']) && isset($_POST['Alamat']) && isset($_POST['level'])) {
    $Username = $_POST['Username'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $Email = $_POST['Email'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];
    $level = $_POST['level'];
    $connect= mysqli_connect("localhost:3306", "root", "", "kasirproject");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO user (Username, Password, Email, NamaLengkap, Alamat, level) VALUES ('$Username', '$Password','$Email','$NamaLengkap','$Alamat','$level')";
    $simpan = mysqli_query($connect, $sql);
    if ($simpan) {
        echo "<script>alert('Data Berhasil Disimpan')</script>" && header("refresh:1; url=index.php");
    } else {
        echo "<script>alert('Data Gagal Disimpan')</script>";
    }
}
?>