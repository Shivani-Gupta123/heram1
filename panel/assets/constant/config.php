<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "herambs";

// $servername = "localhost";
// 	$username = "u338210723_usa";
// 	$password = "K&!Q2qA]^Pc8";
// 	$dbname = "u338210723_db";
date_default_timezone_set("Asia/Kolkata");

try {

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

	echo "Connection failed: " . $e->getMessage();
}
