<?php
session_start();

$ADMIN_EMAIL = 'admin@puzzlediplomats.com';
$ADMIN_PASSWORD = 'Admin@123';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === $ADMIN_EMAIL && $password === $ADMIN_PASSWORD) {
        $_SESSION['is_admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Puzzle Diplomats - Admin Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Sofia+Pro:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Volkgarie:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="./assets/css/style.css" rel="stylesheet">
  <style>
    body { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0b1f23; }
    .login-wrapper { max-width: 420px; width: 100%; background: #ffffff; border-radius: 16px; padding: 32px 28px; box-shadow: 0 18px 45px rgba(0,0,0,0.25); }
    .login-logo img { height: 60px; }
    .login-title { font-weight: 700; color: #0b1f23; }
    .login-subtitle { font-size: 0.9rem; color: #6c757d; }
    .form-control { border-radius: 10px; padding: 10px 12px; }
    .login-btn { width: 100%; border-radius: 999px; padding: 10px 0; font-weight: 600; background: #f05454; border: none; }
    .login-btn:hover { background: #d94343; }
    .login-footer { font-size: 0.85rem; color: #adb5bd; text-align: center; margin-top: 16px; }
    .error-text { font-size: 0.85rem; color: #d9534f; <?php echo $error ? '' : 'display:none;'; ?> }
  </style>
</head>
<body>
  <div class="login-wrapper">
    <div class="login-logo text-center mb-3">
      <img src="./assets/images/logo.png" alt="Puzzle Diplomats">
    </div>
    <h4 class="login-title text-center mb-1">Admin Login</h4>
    <p class="login-subtitle text-center mb-4">Access your blog dashboard to manage posts and content.</p>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Admin Email</label>
        <input type="email" name="email" class="form-control" placeholder="admin@puzzlediplomats.com" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <div class="mb-3"><span class="error-text"><?php echo htmlspecialchars($error); ?></span></div>
      <button type="submit" class="btn btn-primary login-btn">Login</button>
    </form>

    <div class="login-footer">
      <span>Back to <a href="index.html">Home</a> | <a href="blog.php">Blog</a></span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
