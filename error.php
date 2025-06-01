<?php // error.php
include 'db.php';
session_start();
$error = $_GET['msg'] ?? 'An error occurred.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="center">
  <div class="message-box error">
    <h2>⚠️ Error</h2>
    <p><?= htmlspecialchars($error); ?></p>
    <a href="index.php" class="btn">Back to Login</a>
  </div>
</body>
</html>