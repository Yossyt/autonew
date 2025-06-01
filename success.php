<?php //success.php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Success</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="center">
  <div class="message-box success">
    <h2>🎉 Success!</h2>
    <p>Your action was completed successfully.</p>
    <a href="dashboard.php" class="btn">Go to Dashboard</a>
  </div>
</body>
</html>