<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";

$dbname = "datasiswa";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $Nama = trim($_POST['Nama']);
    $NIS = trim($_POST['NIS']);
    $TTL = trim($_POST['TTL']);
    $Kelas = (int)($_POST['Kelas']);

    $sql = "UPDATE siswa SET Nama = ?, NIS = ?, TTL = ?, Kelas = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $Nama, $NIS, $TTL, $Kelas);
    $stmt->execute();
    header("Location: rekapdatasiswa.php");

}