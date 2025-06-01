<?php // forgot.php (forgot password Page) ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password</title>
  <link rel="stylesheet" href="styles.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form id="forgotForm">
      <h1 id="forgot-title"></h1>

      <div class="input-box">
        <input type="email" id="forgot-email" placeholder="Enter your email" required>
        <i class='bx bxs-envelope'></i>
      </div>

      <button type="submit" class="btn">Send Reset Link</button>

      <div class="register-link">
        <p>Remember your password? <a href="index.php">Login</a></p>
      </div>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>