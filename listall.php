<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restoranai";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// check conn
	if ($conn->connect_error){
		//connection failed
		$response["MESSAGE"] = "INTERNAL SERVER ERROR";
		$response["STATUS"] = 500;
	} else {
		$data = array();
		$sql = "SELECT * FROM res_menu";
		$table_data = $conn->query($sql);	
		while ($row = $table_data->fetch_array(MYSQLI_ASSOC)) {
		 $data[] = $row;
		}
		if(count($data) > 0) {
			$response["DATA"] = $data;
			$response["MESSAGE"] = "DATA FOUND";
			$response["STATUS"] = 200;
			$response["ROW"] = count($data);
			} else {
				$response["MESSAGE"] = "DATA NOT FOUND";
				$response["STATUS"] = 404;
		}
	}
	echo json_encode($response);
 ?>