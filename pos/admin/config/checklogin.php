<?php
function check_login()
{
    if (strlen($_SESSION['UserID']) == 0) {
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php";
        $_SESSION["UserID"] = "";
        $_SESSION["Username"] = ""; // Initialize the Username session variable
        header("Location: http://$host$uri/$extra");
    } else {
        // Retrieve the username and store it in the session
        include 'config/config.php';
        $UserID = $_SESSION['UserID'];
        $sql = "SELECT Username FROM user WHERE UserID = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $UserID);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $_SESSION['Username'] = $user['Username'];
    }
}
?>