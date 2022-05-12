<?php

// DB assoc array
// $db['db_host'] = 'localhost';
// $db['db_user'] = 'fullstack';
// $db['db_pass'] = 'fullstack';
// $db['db_name'] = 'datadrivers';

// // Looping db strtoupper
// foreach($db as $key => $value) {
//   define(strtoupper($key), $value);
// }

// // making connection 

// Miksi jökittää consteilla, kun incluudataan useammin?
// $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
