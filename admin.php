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
			<li><a href="../admin/a_results.php">Election Status & Results</a></li>
			<li><a href="../search.php">Electoral Roll Search</a></li>
			<li><a href="admin/admin.php">Admin</a></li>
		</ul>


<form action="" method="POST" class="box">  
			<h2 style="color:white;">Admin Login</h2>
			<input type="text" name="user" class="inp" placeholder="Enter your Username"><br>
			<input type="password" name="password" class="inp" placeholder="Enter your Password"><br>
			<input type="submit" value="LOGIN" name="submit" class="submit">
		</form>
		<?php
			include("../dbconnect.php");
			$flag=0;
			if(isset($_POST['submit']))
			{
				$q=$_POST['user'];
				$a=$_POST['password'];

				$sql = "SELECT * FROM tbl_admin";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
				{
					// output data of each row
					while($row = $result->fetch_assoc())
					{
						if($q===$row["username"] && $a===$row["password"])
						{
							$_SESSION["username"] = $row["username"];
						$flag=1;
						break;
						}
					}
				}
				else
				{
					echo "0 results";
				}
				if($flag==1)
				{
					header("Location: a_home.php");
				}
				else
				{
					echo "Wrong login details";
				}
			}
		?>
</body>
</html>
		
