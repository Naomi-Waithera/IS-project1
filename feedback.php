<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo->prepare("INSERT INTO feedback (name,email,message) VALUES (?,?,?)")
        ->execute([$_POST['name'], $_POST['email'], $_POST['message']]);
}
$rows = $pdo->query("SELECT * FROM feedback ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="style.css">
<div class="card"><h2>Feedback</h2>
<form method="POST">
  <input name="name" placeholder="Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <textarea name="message" placeholder="Message" required></textarea>
  <button type="submit">Submit</button>
</form>
<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Time</th></tr>
<?php foreach ($rows as $r): ?>
<tr><td><?= $r['id'] ?></td><td><?= htmlspecialchars($r['name']) ?></td>
<td><?= htmlspecialchars($r['email']) ?></td><td><?= htmlspecialchars($r['message']) ?></td>
<td><?= $r['submitted_at'] ?></td></tr>
<?php endforeach; ?>
</table></div>
