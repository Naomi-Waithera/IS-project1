<?php session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit; } ?>
<link rel="stylesheet" href="style.css">
<div class="card"><h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?></h2>
<a href="feedback.php">Feedback form</a> | <a href="logout.php">Logout</a></div>
