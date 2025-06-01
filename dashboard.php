<?php
// Start session and check if user is logged in
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit();
}

// Get username from session
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Webinar Portal - Programming Students</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="dashboard" style="text-align: center; background-image: url('img.jpg'); background-color: chocolate;">
    <h1>👩‍💻 Welcome, <?php echo $username; ?>!</h1>
    <br><br>
    <h2 style="color: darkgreen;background-color: beige;">Programming Languages Webinar Portal</h2>
    <br><br>
    <p style="text-align:center; margin: 20px 0; font-size: 1rem; color:black">
      <br><br>
      <br><br>
      Welcome to the Programming Languages Webinar Portal! 🌐<br><br>

      This platform is designed specifically for programming students eager to enhance their skills through live webinars. Whether you're a beginner or an advanced coder, our webinars cover a wide range of topics to help you excel in your programming journey. <br><br>
      Join us for interactive sessions where you can learn from industry experts, ask questions, and engage with fellow students. Our webinars are tailored to provide practical insights and hands-on experience in various programming languages. <br><br>
      Here, you'll find expert-led sessions covering Python, JavaScript, C++, and more. Each webinar is crafted to boost your coding confidence, project-building ability, and interview preparation. 💡<br><br>
      <strong>Upcoming Highlights:</strong><br>
      • Python for Automation (June 5)<br>
      • JavaScript Deep Dive (June 8)<br>
      • C++ STL Masterclass (June 12)<br><br>
      Join live sessions, ask questions, and build the future one line at a time. 🚀
    </p>
<br><br>
    <div style="text-align: center;">
      <a class="btn" href="profile.php">👤 View Profile</a>
      <a class="btn" href="about.php">📘 About Us</a>
      <br><br>
      <a class="btn" href="logout.php">🚪 Logout</a>
    </div>
  </div>
</body>
</html>
