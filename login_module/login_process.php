<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed.");
}

// Initialize attempts
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = trim($_POST['username']);
    $pass = $_POST['password'];

    if (empty($user_input) || empty($pass)) {
        header("Location: login.php?error=empty");
        exit();
    }

    // Check if locked
    if ($_SESSION['login_attempts'] >= 5) {
        header("Location: login.php?error=locked");
        exit();
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $user_input, $user_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            // Success - reset attempts
            $_SESSION['login_attempts'] = 0;
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user_input;
            header("Location: dashb.php");
            exit();
        }
    }

    // Failed attempt
    $_SESSION['login_attempts']++;
    header("Location: login.php?error=invalid");
    exit();
}
?>