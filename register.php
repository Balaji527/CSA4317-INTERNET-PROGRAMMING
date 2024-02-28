<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

$u = $_POST["name"];
$p = $_POST["password"]; // Corrected the square brackets

$stmt = $conn->prepare("INSERT INTO user (name, password) VALUES (?, ?)");
$stmt->bind_param("ss", $u, $p); // Corrected the variable names

$stmt->execute();
echo "Record inserted successfully";

$stmt->close();
$conn->close();

header("refresh: 3; url=home.html");
?>
