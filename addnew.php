<?php 
	require('includes/dbh.inc.php');

	//check for submint
	if(isset($_POST['submit'])){
		//Get for submit
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$about = mysqli_real_escape_string($conn, $_POST['about']);
		$monday = mysqli_real_escape_string($conn, $_POST['monday']);
		$tuesday = mysqli_real_escape_string($conn, $_POST['tuesday']);
		$wednesday = mysqli_real_escape_string($conn, $_POST['wednesday']);
		$thursday = mysqli_real_escape_string($conn, $_POST['thursday']);
		$friday = mysqli_real_escape_string($conn, $_POST['friday']);

		$query = "INSERT INTO res_menu(name, about, monday, tuesday, wednesday, thursday, friday) VALUES ('$name', '$about', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday')";

		if(mysqli_query($conn, $query)){
			header('location: index.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}

	}

?>
	<?php include('header.php'); ?>
		<body>
			<div class="container">
				<h1>Add restaurant</h1>
				<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>About:</label>
						<textarea type="text" name="about" class="form-control"></textarea>
					<div class="form-group">
						<label>Monday:</label>
						<input type="text" name="monday" class="form-control">
					</div>	
					<div class="form-group">
						<label>Tuesday:</label>
						<input type="text" name="tuesday" class="form-control">
					</div>
					<div class="form-group">
						<label>Wednesday:</label>
						<input type="text" name="wednesday" class="form-control">
					</div>
					<div class="form-group">
						<label>Thursday:</label>
						<input type="text" name="thursday" class="form-control">
					</div>
					<div class="form-group">
						<label>Friday:</label>
						<input type="text" name="friday" class="form-control">
					</div>
						<input type="submit" name="submit" value="submit" class="btn btn-primary">
					</form>
				</div>
			</div>
		</body>
		<?php include('footer.php');?>