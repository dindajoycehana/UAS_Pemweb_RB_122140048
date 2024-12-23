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

$id = $_GET['id'];
$sql = "SELECT * FROM siswa WHERE id = {$id}";
$result = $conn->query($sql);
// Check if a row was returned
if ($result->num_rows > 0) {
    // Fetch the first row as an associative array
    $row = $result->fetch_assoc();

    // Output the data 
    echo "ID: " . htmlspecialchars($row['id']) . "<br>";
    echo "Nama: " . htmlspecialchars($row['Nama']) . "<br>";
    echo "NIS: " . htmlspecialchars($row['NIS']) . "<br>";
    echo "Tempat, Tanggal Lahir: " . htmlspecialchars($row['TTL']) . "<br>";
    echo "Kelas: " . htmlspecialchars($row['Kelas']) . "<br>";
} else {
    echo "No record found for the provided ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<div class="container">
        <form action="update.php" method="post" id="siswaForm">
            <h2>EDIT DATA SISWA</h2>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" id="Nama" name="Nama" required value="<?php echo $row['Nama'] ?>">
            </div>
            <div class="form-group">
                <label for="NIS">NIS</label>
                <input type="text" id="NIS" name="NIS" required value="<?php echo $row['NIS'] ?>">
            </div>
            <div class="form-group">
                <label for="TTL">Tempat, Tanggal Lahir</label>
                <input type="text" name="TTL" id="TTL" autocomplete="off" required value="<?php echo $row['TTL'] ?>">
            </div>
            <div>
                <label for="Kelas">Kelas</label>
                <input type="numeric" id="Kelas" name="Kelas" required value="<?php echo $row['Kelas'] ?>">
            </div>
            <div class="form-group">
                <button type="submit">Ubah</button>
            </div>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>