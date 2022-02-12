<?php

	// Connect to database
	include("../dbconnect.php");
	session_start();
	
	// mysqli_connect("servername","username","password","database_name")

	// Get all the categories from category table
	$sql = "SELECT * FROM `tbl_candidate`";
	$all_categories = mysqli_query($conn,$sql);
	$sqll = "SELECT DISTINCT party FROM `tbl_candidate`";
	$all_positions = mysqli_query($conn,$sqll);

	
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="../../img/icon.jpg">
		<link rel="stylesheet" href="../../css/style2.css">
		
		
		
		<style>
			body,html{
				background:url(../../img/banner-bg.jpg) no-repeat;
				background-size:cover;
			}
			.avatar {
			  vertical-align: middle;
			  width: 70px;
			  height: 70px;
			  border-radius: 50%;
			}
			table {
			  border-collapse: collapse;
			  width: 98%;
			}

			table, th, td {
			  border: 1px solid black;
			}
			th {
				  background-color: black;
				  color: white;
					font-weight:bold;
					font-size:15px;
					font-family:sans-serif;
				}
			tr {
				  background-color: #BBC8BF;
				  color: #080808;
					font-weight:bold;
					font-size:15px;
					font-family:sans-serif;
				}
			th, td {
			  padding: 5px;
			  text-align: center;
			  
			}
			tr:hover {background-color: #F4F4F4}
			
			
			label{
				    font-weight:bold;
					font-size:25px;
					font-family:sans-serif;
			}
			
		</style>	
</head>
<body>
	<ul>
			<li><a href="v_home.php?fid=<?php echo $fid;?>">HOME</a></li>
			<li style="float:right;"><a href="v_logout.php">LOGOUT</a></li>
		</ul>
		<br><br><br><br>
		<center>
	<form method="POST">
		<label style="color:white;">Name of Position</label>
		<select name="position">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($position = mysqli_fetch_array(
						$all_positions,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $position["party"];
					// The value we usually set is the primary key
				?>">
					<?php echo $position["party"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
		<br>
		<label style="color:white;">Select a candidate</label>
		<select name="Category">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $category["id"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
		<br>
		<input type="submit" value="submit" name="submit">
	</form>
	</center>
	<br>
</body>
</html>
