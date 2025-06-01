<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and sanitize input
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate required fields
    if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
        header("Location: error.php?msg=Please fill in all fields.");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: error.php?msg=Invalid email address.");
        exit();
    }

    // Check if email is already registered
    $checkSql = "SELECT id FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);
    if (!$checkStmt) {
        header("Location: error.php?msg=Database error (check).");
        exit();
    }
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        header("Location: error.php?msg=Email is already registered.");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $insertSql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    if (!$insertStmt) {
        header("Location: error.php?msg=Database error (insert).");
        exit();
    }
    $insertStmt->bind_param("ssss", $fullname, $username, $email, $hashedPassword);

    if ($insertStmt->execute()) {
        // Log the user in immediately
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Redirect to success page
        header("Location: success.php?msg=registered");
        exit();
    } else {
        header("Location: error.php?msg=Registration failed. Try again.");
        exit();
    }
} else {
    header("Location: error.php?msg=Invalid request method.");
    exit();
}
?>
