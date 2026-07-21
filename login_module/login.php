<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #004d98 0%, #a50044 100%);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .card-header {
            background: #a50044 !important;
            color: white;
        }
        .btn-primary {
            background: #004d98;
            border: none;
        }
        .btn-primary:hover {
            background: #003366;
        }
        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffd700;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-lg-4">
                <div class="card">
                    <div class="card-header text-center py-4">
                        <img src="https://assets.football-logos.cc/logos/spain/1500x1500/barcelona.af4e5453.png" alt="FC Barcelona" style="width: 120px; height: auto;">
                        <h5 class="mt-2 text-white">Login System</h5>
                    </div>
                    <div class="card-body p-4">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">
                                <?php 
                                    switch ($_GET['error']) {
                                        case 'invalid': echo "Invalid username or password."; break;
                                        case 'locked': echo "Your account has been locked due to multiple failed attempts."; break;
                                        case 'empty': echo "Please enter both username and password."; break;
                                        case 'session_expired': echo "Session expired. Please log in again."; break;
                                    }
                                ?>
                            </div>
                        <?php endif; ?>

                        <form action="login_process.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Username or Email</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">LOGIN</button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="forgot_password.php" class="text-warning fw-bold">Forgot Password?</a>
                        </div>
                        <div class="text-center mt-2">
                            <a href="register.php" class="text-warning fw-bold">Don't have an account? Register Now</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>