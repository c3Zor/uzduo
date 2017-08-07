<?php 
	require('includes/dbh.inc.php');

	//check for submint
	if(isset($_POST['delete'])){
		//Get for submit
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM res_menu WHERE id = {$delete_id}";

		//die($query);

		if(mysqli_query($conn, $query)){
			header('location: index.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}

	}

	//get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	$query = 'SELECT * FROM res_menu WHERE id = '.$id;

	//get results

	$result = mysqli_query($conn, $query);

	// fetch data
	$rest = mysqli_fetch_assoc($result);

	// checking 
	//var_dump($restoranai);

	//free result
	mysqli_free_result($result);

	// close conn
	mysqli_close($conn);

?>

	<?php include('header.php'); ?>
		<body>
			<div class="container">
				<a href="index.php" class="btn btn-default">Back</a>
				<h1>Restaurant</h1>
						<h2><?php echo $rest['name']; ?></h2>
						<p><?php echo $rest['about'] ?></p>

				<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="delete_id" value="<?php echo $rest['id'];?>">
					<input type="submit" name="delete" value="delete" class="btn btn-danger">
				</form>
				<a href="edit.php?id=<?php echo $rest['id']; ?>" class="btn btn-default">Edit</a>		
			</div>
		</body>
	<?php include('footer.php');?>