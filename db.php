<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ihtiyac_fazlasi_sistemi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
