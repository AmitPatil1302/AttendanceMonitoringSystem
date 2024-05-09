<?php
session_start();

// Simulating user authentication
$username = "admin";
$password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $username && $input_password === $password) {
        // Authentication successful, start session
        $_SESSION['username'] = $username;
        echo json_encode(['success' => true]);
    } else {
        // Authentication failed
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} else {
    // Redirect to login page if accessed directly
    header("Location: index.html");
    exit;
}
?>
