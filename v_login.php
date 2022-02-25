<?php
	session_start();
?>
<html>
	<head>
		<title>Online Voting System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="icon" href="../../img/icon.jpg">
	</head>
	<body>
		<ul>
			<li><a href="../../index.php">Home</a></li>
			<li><a href="v_login.php">Voter</a></li>
			<!--<li><a href="../admin/a_results.php">Election Status & Results</a></li>-->
			<!--<li><a href="../search.php">Electoral Roll Search</a></li>-->
			<!--<li><a href="php/admin/admin.php">Admin</a></li>-->
		</ul>
		<form action="" method="POST" class="box">
			<h2 style="color:white;">Voter Login</h2>
			<input type="text" name="userid" class="inp" placeholder="Enter your UserID"><br>
			<input type="password" name="password" class="inp" placeholder="Enter your Password"><br>
			<input type="submit" value="LOGIN" name="submit" class="submit">
			<!--<a href="v_fingerid.php" class="aa">Register</a>-->
		</form>
		
		<?php
			include("../dbconnect.php");
			$flag=0;
			if(isset($_POST['submit']))
			{
				$q=$_POST['userid'];
				$a=$_POST['password'];
				
				$sql = "SELECT * FROM tbl_voter";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
				{
				// output data of each row
					while($row = $result->fetch_assoc())
					{
						if($q===$row["userid"] && $a===$row["password"] && $row["voted"]=="N" && $row["gender"]=="Female" )
						{
							$_SESSION["username"] = $row["name"];
							$_SESSION["id"] = $row["id"];
							$_SESSION["userid"] = $row["userid"];
							$_SESSION["department"] = $row["department"];
							$fid=$row["fingerid"];
							$flag=1;
							break;
						}
						if($q===$row["userid"] && $a===$row["password"] && $row["voted"]=="N" && $row["gender"]=="Male" )
						{
							$_SESSION["username"] = $row["name"];
							$_SESSION["id"] = $row["id"];
							$_SESSION["department"] = $row["department"];
							$fid=$row["fingerid"];
							$flag=2;
							break;
						}
							
							
						
						
						else if($q===$row["userid"] && $a===$row["password"] && $row["voted"]=="Y" )
						{
							
							echo"<script>alert('already voted');
							window.location.replace('../voter/v_login.php');</script>";
						}
					}
				}
				else
				{
					echo "0 results";
				}
				if($flag==1)
				{
						echo"<script>alert('Login Successfully');</script>";
						header("Location: v_candlist.php?fid=".$fid."");
				}
				elseif($flag==2)
				{
						echo"<script>alert('Login Successfully');</script>";
						header("Location: v_candlist2.php?fid=".$fid."");
				}
				
				
				
				
				
				else
				{
					echo"<script>alert('wrong details');
				window.location.replace('../voter/v_login.php');</script>";
				}
			}
		?>
	</body>
</html>
