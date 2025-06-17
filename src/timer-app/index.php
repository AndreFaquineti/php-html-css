<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Timer App</title>
  <style>
    body { font-family: Arial; margin: 40px; }
    #timer { font-size: 2em; margin: 20px 0; }
  </style>
</head>
<body>

<h2>⏱️ Timer Session</h2>

<form id="sessionForm">
  <input type="text" id="tag" name="tag" placeholder="Enter tag (e.g. reading)" required>
  <div id="timer">00:00:00</div>
  <button type="button" onclick="startTimer()">Start</button>
  <button type="button" onclick="stopTimer()">Stop</button>
</form>

<script>
let startTime, interval;

function formatTime(seconds) {
  const h = String(Math.floor(seconds / 3600)).padStart(2, '0');
  const m = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
  const s = String(seconds % 60).padStart(2, '0');
  return `${h}:${m}:${s}`;
}

function startTimer() {
  startTime = new Date();
  interval = setInterval(() => {
    const elapsed = Math.floor((new Date() - startTime) / 1000);
    document.getElementById("timer").textContent = formatTime(elapsed);
  }, 1000);
}

function stopTimer() {
  clearInterval(interval);
  const endTime = new Date();
  const duration = Math.floor((endTime - startTime) / 1000);
  const tag = document.getElementById("tag").value;

  fetch('save.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      tag,
      start_time: startTime.toISOString(),
      end_time: endTime.toISOString(),
      duration
    })
  }).then(() => {
    alert('Session saved!');
    location.reload();
  });
}
</script>

<hr>
<a href="sessions.php">📜 View Sessions</a> |
<a href="stats.php">📊 View Stats</a>

</body>
</html>