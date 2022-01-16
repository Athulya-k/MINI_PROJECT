<?php
	session_start();
	$fid=$_GET["fid"];
	if($_SESSION["username"] == NULL)
	{
		header("Location: ../../index.php");
	}
	else
	{
?>
<html>
	<head>
		<title>Online Voting System</title>
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
			
		</style>
	</head>
	<body>
		<ul>
			<li><a href="a_home.php">HOME</a></li>
			<li style="float:right;"><a href="a_logout.php">LOGOUT</a></li>
		</ul>
		<br><br><br>
		<center>		
			<table border="1" >
				<tr style="height:50px"><th colspan="13"><h2>Candidate List</h2></th></tr>
				<tr style="height:50px">
					<th>S/No.</th>
					<th>Photo</th>
					<th>ID</th>
					<th>Name</th>
					<th>DOB</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Mob No.</th>
					<th>Party</th>
					<th>Symbol</th>
					<th>Election ID</th>
					<th>Address</th>
					<th>Timestamp</th>
				</tr>
				<?php
					include("../dbconnect.php");
					$sql = "SELECT * FROM tbl_candidate";
					$result = $conn->query($sql);
					$c=0;
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{	$c++;
						echo"<tr>
						<td>".$c."</td>
						<td><img src='../uploads/".$row["photo"]."' alt='".$row["uname"]."' class='avatar'></td>
						<td>".$row["id"]."</td>
						<td>".$row["uname"]."</td>
						<td>".$row["dob"]."</td>
						<td>".$row["age"]."</td>
						<td>".$row["gender"]."</td>
						<td>".$row["mobile"]."</td>
						<td>".$row["party"]."</td>
						<td><img src='../uploads/symbol/".$row["symbol"]."' alt='".$row["party"]."' class='avatar'></td>
						<td>".$row["election_id"]."</td>
						<td>".$row["address"]."</td>
						<td>".$row["timestamp"]."</td>
						</tr>";
						}
					}
					else
					{
						echo"<tr style='height:50px'><td colspan='13'>NO DATA</td></tr>";
					}
				?>
			</table>
		</center>
	</body>
</html>
<?php
	}
?>
