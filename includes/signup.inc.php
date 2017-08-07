<?php
	if (isset($_POST['submit'])) {
		include_once 'dbh.inc.php';
		$first = mysqli_real_escape_string($conn, $_POST['first']);
		$last = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		//Error handlers
		//Check for empty fields
		if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
			header("location: ../signup.php?signup=empty");
			exit();
		} else {
			//check if input chars are valid
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("location: ../signup.php?signup=invalid");
			exit();
			} else {
				//check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("location: ../signup.php?signup=invalidEmail");
				exit();
				} else {
					$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
					$result	= mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						header("Location: ../signup.php?signup.php?signup=usertaken");
						exit();
					} else {
						//Hashing the pass
						$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
						// Insert the User into the DataBase
						$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pass) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
						$resultInsert = mysqli_query($conn, $sql);
						header("Location: ../signup.php?signup.php?signup=success");
						exit();
					}
				}
			}
		}

	} else {
		header("location: ../signup.php");
		exit();
	}
  ?>