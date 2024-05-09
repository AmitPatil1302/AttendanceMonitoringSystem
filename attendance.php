<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Database configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseId = $_POST['courseId'];
    // Mark attendance for the selected course (you need to implement this logic)
    // Example: $sql = "INSERT INTO attendance (student_id, course_id, date, status) VALUES (1, $courseId, NOW(), 'Present')";
    // if ($conn->query($sql) === TRUE) {
    //     echo json_encode(['success' => true]);
    // } else {
    //     echo json_encode(['success' => false, 'message' => $conn->error]);
    // }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

$conn->close();
?>
