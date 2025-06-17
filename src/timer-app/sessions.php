<?php
$db = new PDO("sqlite:db/database.sqlite");
$sessions = $db->query("SELECT * FROM sessions ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Sessions</title>
  <style> table { border-collapse: collapse; width: 100%; } td, th { padding: 8px; border: 1px solid #ccc; }</style>
</head>
<body>
<h2>📜 Session History</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Tag</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Duration (sec)</th>
  </tr>
  <?php foreach ($sessions as $s): ?>
    <tr>
      <td><?= $s['id'] ?></td>
      <td><?= htmlspecialchars($s['tag']) ?></td>
      <td><?= $s['start_time'] ?></td>
      <td><?= $s['end_time'] ?></td>
      <td><?= $s['duration'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<a href="index.php">⬅ Back to Timer</a>
</body>
</html>