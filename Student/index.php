<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1"></meta>
	<!--bootstrap css-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		#add
		{
			display: block;
		}
		#add input
		{
			display: block;
		}
	</style>
</head>
<body>
	<div class="container">
		<button type="button" onclick="view()" class="btn btn-hide">View Records</button>
		<button type="button" onclick="add()" class="btn btn-hide">Add Record</button>
		<button type="button" onclick="del()" class="btn btn-hide">Delete Record</button>
		<form id="add" action="index2.php" method="post">
			<label for="roll">Roll No</label>
			<input type="number" name="roll" min="1" max="120" maxlength="3" minlength="1" required id="roll"></input>
			<label for="name">Name</label>
			<input type="text" name="name" required id="name"></input>
			<label for="class">Class</label>
			<input type="text" name="class" required id="class"></input>
			<label for="m1">Marks1</label>
			<input type="number" name="m1" min="1" max="100" required="" id="m1"></input>
			<label for="m2">Marks2</label>
			<input type="number" name="m2" min="1" max="100" required="" id="m2"></input>
			<label for="m3">Marks3</label>
			<input type="number" name="m3" min="1" max="100" required="" id="m3"></input>
			<input type="submit" name="add"/>
		</form>

		<form id="del" action="index2.php" method="post">
			<label for="rolltbd">Roll No</label>
			<input type="number" name="rolltbd" min="1" max="120" maxlength="3" minlength="1" required id="rolltbd"></input>
			<input type="submit" name="del"/>
		</form>

		<div id="view">
			<form action="#" method="post">
				<button type="submit" name="asc">Ascending</button>
			<button type="submit" name="desc">Descending</button>
			</form>
			<?php
			$server='localhost';
			$user='root';
			$pwd='';
			$db='student_db';
			$conn=mysqli_connect($server,$user,$pwd,$db);
			if(!$conn)
			{
				die("Connection failed");
			}
			if(isset($_POST['asc']))
			{
				$sql3='SELECT * from student_info order by rollno ASC';
				$res3=mysqli_query($conn,$sql3);
				$rows3=mysqli_num_rows($res3);
				echo '<div>
						<table>
							<tr>
								<th>Roll Number</th>
								<th>Name</th>
							</tr>';
				
			
				for($i=0;$i<$rows3;$i++)
				{
					$t = mysqli_fetch_assoc($res3);
					echo '<tr>
								<td>'.$t['rollno'].'</td>
								<td>'.$t['name'].'</td>
							</tr>';
				}
				echo "</table>
					</div>";

			}

			if(isset($_POST['desc']))
			{
				$sql3='SELECT * from student_info order by rollno DESC';
				$res3=mysqli_query($conn,$sql3);
				$rows3=mysqli_num_rows($res3);
				echo '<div>
						<table>
							<tr>
								<th>Roll Number</th>
								<th>Name</th>
							</tr>';
							
				for($i=0;$i<$rows3;$i++)
				{
					$t = mysqli_fetch_assoc($res3);
					echo '<tr>
								<td>'.$t['rollno'].'</td>
								<td>'.$t['name'].'</td>
							</tr>';
				}
				echo "</table>
					</div>";

			}

		?>
		</div>

		
	</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	window.onload
	{
		document.getElementById("view").style.display = "none";
		document.getElementById("add").style.display = "none";
		document.getElementById("del").style.display = "none";

	}
	function view()
	{
		document.getElementById("view").style.display = "block";
		document.getElementById("add").style.display = "none";
		document.getElementById("del").style.display = "none";

	}
	function add()
	{
		document.getElementById("add").style.display = "block";
		document.getElementById("view").style.display = "none";
		document.getElementById("del").style.display = "none";

	}

	function del()
	{
		document.getElementById("del").style.display = "block";
		document.getElementById("view").style.display = "none";
		document.getElementById("add").style.display = "none";

	}
</script>
</body>
</html>
