<?php

	// Connect to database
	include("../dbconnect.php");
	session_start();
	
	$id = $_SESSION["id"];
	$dept = $_SESSION["department"];
	// mysqli_connect("servername","username","password","database_name")

	// Get all the categories from category table
	$sql = "SELECT * FROM `tbl_candidate` where party= 'chairperson'";
	$all_chairperson = mysqli_query($conn,$sql);
	
	$sql2 = "SELECT * FROM `tbl_candidate` where party= 'pg representative' and department = '$dept'" ;
	$all_pg = mysqli_query($conn,$sql2);
	
	$sql3 = "SELECT * FROM `tbl_candidate` where party= 'UUC'";
	$all_uuc = mysqli_query($conn,$sql3);
	
	//$sql4 = "SELECT * FROM `tbl_candidate` where party= 'lady representative'";
	//$all_lady = mysqli_query($conn,$sql4);
	
	$sql5 = "SELECT * FROM `tbl_candidate` where party= 'vice chairperson'";
	$all_vc = mysqli_query($conn,$sql5);
	
	$sql6 = "SELECT * FROM `tbl_candidate` where party= 'general secretary'";
	$all_gs = mysqli_query($conn,$sql6);
	
	$sql7 = "SELECT * FROM `tbl_candidate` where party= 'arts secretary'";
	$all_as = mysqli_query($conn,$sql7);
	

	
	
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
		<link rel="stylesheet" href="../../css/style.css">
		
		
		
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
			  border: 0px solid black;
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
					font-size:15px;
					font-family:sans-serif;
			}
			select{
				min-width:500px;
				Border: none;
				height: 25px;
			}
			options{
				width:500px;
				Border: none;
				height: 25px;
			}
			submit
			{
			text-align:center;
			border:2px solid #2ecc71;
			padding:14px 40px;
			color:white;
			border-radius:24px;
			transition:0.25s;
			cursor:pointer;
			background:none;
			display:block;
			margin:20px auto;
			background: #2ecc71;
			}
			
		</style>	
</head>
<body>
	
	<ul>
			
			<li style="float:right;"><a href="v_logout.php">LOGOUT</a></li>
		</ul>
		<br><br><br><br>
		<center>
	<form method="POST">
		<table>
		<tr>
		<td>
		<label style="color:white;">CHAIRPERSON</label>
		</td>
		<td>
		<select name="chairperson">
			<option value="none" selected >select an option</option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($chairperson = mysqli_fetch_array(
						$all_chairperson,MYSQLI_ASSOC)):;
			?>
		
		
				<option value="<?php echo $chairperson["uname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $chairperson["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</td></tr>
		</select>
		<br>
		
		
		<tr>
		<td>
		<label style="color:white;">VICE CHAIRPERSON</label>
		</td>
		<td>
		<select name="vice_chairperson">
			<option value="none" selected >select an option</option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($vc = mysqli_fetch_array(
						$all_vc,MYSQLI_ASSOC)):;
			?>
		
		
				<option value="<?php echo $vc["uname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $vc["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</td></tr>
		</select>
		
		<br>
		
		
		<tr>
		<td>
		<label style="color:white;">GENERAL SECRETARY</label>
		</td>
		<td>
		<select name="general_secretary">
			<option value="none" selected >select an option</option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($gs = mysqli_fetch_array(
						$all_gs,MYSQLI_ASSOC)):;
			?>
		
		
				<option value="<?php echo $gs["uname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $gs["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</td></tr>
		</select>
		
		<br>
		
		<tr>
		<td>
		<label style="color:white;">ARTS SECRETARY</label>
		</td>
		<td>
		<select name="arts_secretary">
			<option value="none" selected >select an option</option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($as = mysqli_fetch_array(
						$all_as,MYSQLI_ASSOC)):;
			?>
		
		
				<option value="<?php echo $as["uname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $as["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</td></tr>
		</select>
		
		
		
		
		<tr><td>
		<label style="color:white;">PG REPRESENTATIVE</label>
		</td>
		<td>
		<select name="pg_representative">
			<option value="none" selected > select an option</option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($pg = mysqli_fetch_array(
						$all_pg,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $pg["uname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $pg["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</td></tr>
		</select>
		<br>
		<tr><td>
		<label style="color:white;">UUC</label>
		</td>
		<td>
		<select name="UUC">
			<option value="none" selected > select an option</option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($uuc = mysqli_fetch_array(
						$all_uuc,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $uuc["uname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $uuc["uname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</td></tr>
		</select>
		
		<br>
		
		
		</table>
		
		<br>
		<input type="submit" value="Submit" name="submit" onclick="vote()"
		style="text-align:center;
			border:2px solid #2ecc71;
			padding:14px 40px;
			color:white;
			border-radius:24px;
			transition:0.25s;
			cursor:pointer;
			background:none;
			display:block;
			margin:20px auto;
			background: #2ecc71;">
			
	</form>
	
	
	
	
	
	<?php
	if(isset($_POST['submit']))
	{
		
		$chairperson=$_POST['chairperson'];
		$pg_representative=$_POST['pg_representative'];
		//$lady_representative=$_POST['lady_representative'];
		$UUC=$_POST['UUC'];
		$as=$_POST['arts_secretary'];
		$gs=$_POST['general_secretary'];
		$vc=$_POST['vice_chairperson'];
		
		
		$sqll1="UPDATE tbl_candidate set votes = votes+1 where uname='$pg_representative'" ;
		$sqll="UPDATE tbl_candidate set votes = votes+1 where uname='$chairperson'" ;
		//$sqll2="UPDATE tbl_candidate set votes = votes+1 where uname='$lady_representative'" ;
		$sqll3="UPDATE tbl_candidate set votes = votes+1 where uname='$UUC'" ;
		$sqll5="UPDATE tbl_candidate set votes = votes+1 where uname='$as'" ;
		$sqll6="UPDATE tbl_candidate set votes = votes+1 where uname='$gs'" ;
		$sqll7="UPDATE tbl_candidate set votes = votes+1 where uname='$vc'" ;
		$sqll4="UPDATE tbl_voter set voted = 'Y' where id='$id'" ;
		$conn->query($sqll4); 
	 
		if($chairperson!='none')
		{
			$conn->query($sqll);
		}
		if($pg_representative!='none')
		{
			$conn->query($sqll1);
			
		}
		
		if($UUC!='none')
		{
			$conn->query($sqll3);
			
		}
		if($as!='none')
		{
			$conn->query($sqll5);
			
		}
		if($gs!='none')
		{
			$conn->query($sqll6);
			
		}
		if($vc!='none')
		{
			$conn->query($sqll7);
			
		}
		
		
		echo"<script>alert('voting is done Successfully');
				window.location.replace('../voter/v_login.php');</script>";
						

$conn->close();
}
?>
	
	
	
	
	
	
	
	
	
	</center>
	<br>
</body>
</html>
