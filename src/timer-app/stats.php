<?php
$db = new PDO("sqlite:db/database.sqlite");
$rows = $db->query("SELECT tag, COUNT(*) as count, SUM(duration) as total FROM sessions GROUP BY tag")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Session Stats</title>
  <style> table { border-collapse: collapse; width: 50%; } td, th { padding: 8px; border: 1px solid #ccc; }</style>
</head>
<body>
<h2>📊 Stats by Tag</h2>
<table>
  <tr>
    <th>Tag</th>
    <th>Sessions</th>
    <th>Total Time (sec)</th>
  </tr>
  <?php foreach ($rows as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['tag']) ?></td>
      <td><?= $row['count'] ?></td>
      <td><?= $row['total'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<a href="index.php">⬅ Back to Timer</a>
</body>
</html>