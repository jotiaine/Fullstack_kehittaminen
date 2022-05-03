<?php

$palvelin = 'localhost';
$tietokanta = 'datadrivers';
$dbUser = 'user';
$dbPassword = 'user'; //salasana on tässä sovelluksessa sama kuin k.tunnus.

// making connection 

$conn = new mysqli($palvelin, $dbUser, $dbPassword, $tietokanta);

// checking connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//print_r("<p> yhteys luotu </p>"); //printing connection confirm.

mysqli_set_charset($conn,'utf8');
?>
