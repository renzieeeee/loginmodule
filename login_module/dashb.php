<?php
session_start();

$timeout = 15 * 60;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    session_destroy();
    header("Location: login.php?error=session_expired");
    exit();
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #004d98 0%, #a50044 100%); color: white; }
        .navbar { background: #a50044 !important; }
        .card { background: rgba(255,255,255,0.1); border: none; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container">
             <img src="https://assets.football-logos.cc/logos/spain/1500x1500/barcelona.af4e5453.png" alt="FC Barcelona" style="width: 60px; height: auto;">
            <div>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php" class="btn btn-outline-light ms-3">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card p-5 text-center">
            <h2 style="color: #ffd700;">Welcome to the Dashboard</h2>
            <p class="lead" style="color: #ffd700;">You have successfully logged in.</p>
            <div class="alert alert-info">Session will expire after 15 minutes of inactivity.</div>
        </div>
    </div>
</body>
</html>