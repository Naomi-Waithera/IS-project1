<?php
require 'db.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username,email,full_name,password) VALUES (?,?,?,?)");
    try {
        $stmt->execute([$_POST['username'], $_POST['email'], $_POST['full_name'], $hash]);
        $msg = "Registration successful. <a href='login.php'>Login</a>";
    } catch (PDOException $e) { $msg = "Username already exists."; }
}
?>
<link rel="stylesheet" href="style.css">
<div class="card"><h2>Sign up</h2>
<form method="POST">
  <input name="full_name" placeholder="Full name" required>
  <input name="username" placeholder="Username" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Sign up</button>
</form>
<p><?= $msg ?></p><a href="login.php">Already registered? Login</a></div>
