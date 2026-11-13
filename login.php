<?php
session_start();
require 'db.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php"); exit;
    }
    $msg = "Invalid username or password.";
}
?>
<link rel="stylesheet" href="style.css">
<div class="card"><h2>Login</h2>
<form method="POST">
  <input name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>
<p><?= $msg ?></p><a href="signup.php">Create an account</a></div>
