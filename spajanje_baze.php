<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
// $userName = 'iwa_2016';
// $password = 'foi2016';
$dbName = 'iwa_2016_zb_projekt';


	$conn = mysqli_connect($serverName, $userName, $password , $dbName);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";






?>