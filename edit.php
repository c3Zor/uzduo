<?php 
	require('includes/dbh.inc.php');

	//check for submint
	if(isset($_POST['submit'])){
		//Get for submit
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$about = mysqli_real_escape_string($conn, $_POST['about']);
		$monday = mysqli_real_escape_string($conn, $_POST['monday']);
		$tuesday = mysqli_real_escape_string($conn, $_POST['tuesday']);
		$wednesday = mysqli_real_escape_string($conn, $_POST['wednesday']);
		$thursday = mysqli_real_escape_string($conn, $_POST['thursday']);
		$friday = mysqli_real_escape_string($conn, $_POST['friday']);


		$query = "UPDATE res_menu SET
			name='$name',
			about='$about',
			monday='$monday',
			tuesday='$tuesday',
			wednesday='$wednesday',
			thursday='$thursday',
			friday='$friday'

			WHERE id = {$update_id}";

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
				<h1>Edit Restaurant</h1>
				<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" value="<?php echo $rest['name'];?>">
					</div>
					<div class="form-group">
						<label>About:</label>
						<textarea type="body" name="about" class="form-control"><?php echo $rest['about'];?></textarea>
					</div>
					<div class="form-group">
						<label>Monday:</label>
						<input type="text" name="monday" class="form-control" value="<?php echo $rest['monday'];?>">
					</div>	
					<div class="form-group">
						<label>Tuesday:</label>
						<input type="text" name="tuesday" class="form-control" value="<?php echo $rest['tuesday'];?>">
					</div>
					<div class="form-group">
						<label>Wednesday:</label>
						<input type="text" name="wednesday" class="form-control" value="<?php echo $rest['wednesday'];?>">
					</div>
					<div class="form-group">
						<label>Thursday:</label>
						<input type="text" name="thursday" class="form-control" value="<?php echo $rest['thursday'];?>">
					</div>
					<div class="form-group">
						<label>Friday:</label>
						<input type="text" name="friday" class="form-control" value="<?php echo $rest['friday'];?>">
					</div>
					<div>
						<input type="hidden" name="update_id" value="<?php echo $rest['id'];?>">
						<input type="submit" name="submit" value="submit" class="btn btn-primary">
					</div>
				</form>
			</div>
		</body>
		<?php include('footer.php');?>