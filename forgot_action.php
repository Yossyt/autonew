<?php
// forgot_action.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit;
  }

  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "Password reset link sent (mock).";
    // TODO: Add actual reset email functionality
  } else {
    echo "Email not found.";
  }
} else {
  echo "Invalid request method.";
}
?>