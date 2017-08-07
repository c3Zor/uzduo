<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restoranai";

$response = array();
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
		$response["MESSAGE"] = "INTERNAL SERVER ERROR";
		$response["STATUS"] = 500;
	} else {
		$jsonData = file_get_contents('php://input');
		$jsonDecode = json_decode($jsonData,true);
		if (is_array($jsonDecode)) {
			foreach ($jsonDecode as $key => $value) {
				$_POST[$key] = $value;			
			}
		}
		if (@$_POST['name'] && @$_POST['about'] && @$_POST['monday'] && @$_POST['tuesday'] && @$_POST['wednesday'] && @$_POST['thursday'] && @$_POST['friday']) {
			$sql = "INSERT INTO res_menu(name, about, monday, tuesday, wednesday, thursday, friday) VALUES ('{$_POST['name']}', '{$_POST['about']}', '{$_POST['monday']}' , '{$_POST['tuesday']}', '{$_POST['wednesday']}', '{$_POST['thursday']}', '{$_POST['friday']}')";
			if($conn->query($sql)) {
				$response['MESSAGE'] = "SAVE DATA SUCCED";
				$response['STATUS'] = 200;
			} else {
				$response['MESSAGE'] = "SAVE DATA FAILED";
				$response['STATUS'] = 500;
			} 
		} else {
			$response['MESSAGE'] = "INVALID REQUEST";
			$response['STATUS'] = 400;
		}
	}
echo json_encode($response);