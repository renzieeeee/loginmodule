<?php
if (!isset($_GET['email'])) {
    header("Location: forgot_password.php");
    exit();
}
$email = htmlspecialchars($_GET['email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center py-4">
                        <img src="https://assets.football-logos.cc/logos/spain/1500x1500/barcelona.af4e5453.png" alt="FC Barcelona" style="width: 100px; height: auto;">
                        <h5 class="mt-2">Create New Password</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="reset_process.php" method="POST">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" required minlength="8">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">UPDATE PASSWORD</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php" class="text-dark fw-bold">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>