<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restoranai";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// check conn
	if(mysqli_connect_errno()){
		//connection failed
		echo 'failed to connect' . mysqli_connect_errno();
	}

 ?>