<?php
$servername = "mysql.pereanu.com";
$username = "sentence_user";
$password = "Abub22yy";
$dbName = "wayne_state_your_sentence";

$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
};
?>