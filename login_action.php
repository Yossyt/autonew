<?php
// login_action.php

include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Prepare statement with username
        $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                // Set session values
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                // Redirect to dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                // Incorrect password
                header("Location: index.php?error=Incorrect password");
                exit();
            }
        } else {
            // Username not found
            header("Location: index.php?error=Username not found");
            exit();
        }
    } else {
        // Missing input
        header("Location: index.php?error=Please fill in all fields");
        exit();
    }
} else {
    // Invalid request
    header("Location: index.php?error=Invalid request");
    exit();
}
?>
