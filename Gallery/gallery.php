<?php
	$server="localhost";
	$username="root";
	$password="";
	$db="gallery";
	$conn=mysqli_connect($server,$username,$password,$db);
	if(!$conn)
	{
		die ("connection failed ".mysqli_connect_error());
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<meta name="viewport" content="width=device-width,initial-scale=1"></meta>
	<meta charset="UTF-8">
	<!--bootstrap css-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		.img
		{
			width:100%;
			height: auto;
			margin-top: 10%;
		}

		@media screen and (max-width: 500px)
		{
			.col-3
			{
				flex: 0 0 100%;
				max-width: 100%;
			}
			form
			{
				max-width: 90%;
				margin: auto;
			}
			input
			{
				margin: 2%;
			}
		} 

		@media screen and (max-width: 1000px) and (min-width: 500px)
		{
			.col-3
			{
				flex: 0 0 50%;
				max-width: 50%;
			}
		} 
	</style>
</head>
<body>
	<div class="container">

		<div class="row">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Upload Images</legend>
					<label for="imgUpload">Choose images: </label>
					<input id="imgUpload" type="file" name="imgSrc"/> 
					<input type="submit" style="display: block;" name="upload"/>
				</fieldset>
			</form>
		</div>
		
		<div class="row">
			<div class="col-3 box">
				<img class="img" src="images/Agra.jpg" alt="Agra" title="x">
			</div>
			<div class="col-3 box">
				<img class="img" src="images/Agra.jpg" alt="Agra">
			</div>
			<div class="col-3 box">
				<img class="img" src="images/Agra.jpg" alt="Agra">
			</div>
			<div class="col-3 box">
				<img class="img" src="images/Agra.jpg" alt="Agra">
			</div>
			<div class="col-3 box">
				<img class="img" src="images/Agra.jpg" alt="Agra">
			</div>
			<div class="col-3 box">
				<img class="img" src="images/Agra.jpg" alt="Agra">
			</div>

			<?php

				$sql = 'SELECT * from images';
				$result = mysqli_query($conn,$sql);
				$rows = mysqli_num_rows($result);
				for($j=0;$j<$rows;$j++)
				{
					$t = mysqli_fetch_assoc($result);
					$x = $t['path'];
					$src="images/".$x;
					echo '<div class="col-3 box">
					<img class="img" src="'.$src.'">
					</div>';
				}
				
			?>
			
		</div>

	</div>


<!--bootstrap js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
