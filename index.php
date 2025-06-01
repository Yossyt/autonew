<?php // index.php (Login Page) ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form id="loginform" method="POST" action="login_action.php">
      <h1 id="login-title">Login</h1>

      <div class="input-box">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>

      <div class="input-box">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' id="togglePassword" style="cursor: pointer;"></i>
      </div>

      <div class="remember-forgot">
        <label><input type="checkbox" id="rememberMe" name="remember"> Remember me</label>
        <a href="forgot.php">Forgot password?</a>
      </div>

      <button type="submit" class="btn">Login</button>

      <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>