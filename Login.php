<?php
$servername = "localhost";
$username = "root";
$password = ""; // <-- Removed unnecessary single quote
$dbname = "library";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

echo 'Connected successfully<br/>';

$u = $_POST["username"]; // <-- Corrected case of $_POST
$p = $_POST["password"]; // <-- Corrected case of $_POST

$sql = "SELECT name, password FROM user WHERE name = '{$u}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["name"] == $u && $row["password"] == $p) {
            echo "You have been successfully validated";
        } else {
            echo "Credentials wrong, try again";
        }
    }
} else {
    echo "Username given does not exist";
}

$conn->close();
header("refresh:2; url=home.html");
?>
