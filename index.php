<?php 
	require('includes/dbh.inc.php');

	$query = 'SELECT * FROM res_menu ORDER BY name DESC';

	//get results

	$result = mysqli_query($conn, $query);


	// fetch data
	$res_menu = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// checking 
	//var_dump($restoranai);

	//free result
	mysqli_free_result($result);


	// close conn
	mysqli_close($conn);

?>

<?php include_once 'header.php';?>
		
<body>
	<div class=container>
		<h1>Restaurants</h1>
		<div class="row">
				<?php foreach ($res_menu as $rest): ?>
					<div class="col-sm-4">
						<h3><?php echo $rest['name']; ?></h3>
						<p><?php echo $rest['about'] ?></p>
						<p>Todays daily meal: <strong><?php 
						$day = date('l');
							if ($day == 'Monday'){
								echo $rest['monday'];
							} elseif ($day == 'Tuesday'){
								echo $rest['tuesday'];
							} elseif ($day == 'Wednesday'){
								echo $rest['wednesday'];
							} elseif ($day == 'Thursday'){
								echo $rest['thursday'];
							} elseif ($day == 'Friday'){
								echo $rest['friday'];
							} else {
								echo 'today is not your lucky day';
							}
						?></strong></p>	
						<?php if (isset($_SESSION['u_id'])){
						$restaur = $rest['id'];
						echo '<a class="btn btn-default" href="rest.php?id='.$restaur.'">Daugiau</a>';};?>
					</div>		
				<?php endforeach; ?>
			</div>	
		</div>
	</body>
<?php include_once 'footer.php';?>
