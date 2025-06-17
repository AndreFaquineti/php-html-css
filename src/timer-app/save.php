<?php
$dbFile = __DIR__ . '/db/database.sqlite';
$db = new PDO("sqlite:$dbFile");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS sessions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tag TEXT,
    start_time TEXT,
    end_time TEXT,
    duration INTEGER
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tag = $_POST['tag'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
    $duration = intval($_POST['duration']);

    $stmt = $db->prepare("INSERT INTO sessions (tag, start_time, end_time, duration) VALUES (?, ?, ?, ?)");
    $stmt->execute([$tag, $start, $end, $duration]);
}
?>