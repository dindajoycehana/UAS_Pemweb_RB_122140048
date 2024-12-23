<?php
session_start();

$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "Datasiswa";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Query untuk memeriksa admin
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = $username AND email = $email AND password = $password");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Data admin ditemukan
        $_SESSION['admin'] = $username;
        echo "<script>alert('Login berhasil!'); window.location.href = 'index.php';</script>";
    } else {
        // Data admin tidak ditemukan
        echo "<script>alert('Username atau password salah!'); window.location.href = 'login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>  