<?php
$servername = "localhost";
$username = "root";
$password = "1000";
$dbname = "mox";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>