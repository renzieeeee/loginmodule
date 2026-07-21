<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

$conn = new mysqli($servername, $username, $password, $dbname);

function isStrongPassword($pass) {
    if (strlen($pass) < 8) return false;
    if (!preg_match("/[A-Z]/", $pass)) return false;     // Uppercase
    if (!preg_match("/[a-z]/", $pass)) return false;     // Lowercase
    if (!preg_match("/[0-9]/", $pass)) return false;     // Number
    if (!preg_match("/[^A-Za-z0-9]/", $pass)) return false; // Special char
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    if (!isStrongPassword($pass)) {
        header("Location: register.php?error=weakpassword");
        exit();
    }

    $hashed = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed);

    if ($stmt->execute()) {
        header("Location: login.php?success=registered");
    } else {
        header("Location: register.php?error=duplicate");
    }
}
?>