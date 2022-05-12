<?php

// Nämä muuttujat constanteiksi?
$dbHost = 'localhost';
$dbUser = 'datadrivers_v2';
$dbPass = 'datadrivers_v2';
$dbName = 'datadrivers_v2';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn,'utf8');
?>



