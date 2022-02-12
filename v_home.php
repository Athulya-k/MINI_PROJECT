<?php
	session_start();
	
	$vote=$approval=NULL;
	if($_SESSION["username"] == NULL && $_SESSION["id"]==NULL)
	{
		header("Location: v_login.php");
	}
	else
	{
		include("../dbconnect.php");
		
		$sql2 = "SELECT * FROM tbl_voting_details where voter_id='".$_SESSION["id"]."'AND status='Active'";
		$result = $conn->query($sql2);

		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$id=$row["id"];
				$vote=$row["vote"];
				$approval=$row["approval"];
			}
		}
?>
<html>
	<head>
		<title>voter home</title>
		<style>
			
		.avatar {
		  vertical-align: middle;
		  width: 100px;
		  height: 100px;
		  border-radius: 50%;
		}
		ul {

		list-style-type: none;
		margin: 0px;
		padding: 10px;
		overflow: hidden;
		background-color: #7f8c8d;
		position: fixed;
		width: 100%;
		}
		li
		{float:left;
		}
		li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-weight:bold;
		background-color: #7f8c8d;

		}
		li a:link
		{
		color:white;
		display: block;
		width:120px;
		text-align:center;
		font-weight:bold;
		padding: 5px 16px;
		text-decoration: none;
		background-color: #2c3e50;
		}

		/* Change the link color on hover */
		li a:hover {
		background-color: #2c3e50;
		}

		li a:active{
		background-color: #2c3e50;
		color: white;
		}

		body
		{background-color:#ecf0f1;}
		
			table {
			  border-collapse: collapse;
			  width: 60%;
			  height: 300px;
			}
			th, td {
			  padding: 15px;
			  text-align: center;
			}
			
		div.polaroid {
		  width: 80%;
		  background-color: white;
		  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		  margin-bottom: 25px;
		}

		
			.container {
			  position: relative;
			  width: 50%;
			}

			.image {
			  opacity: 1;
			  display: block;
			  width: 100%;
			  height: auto;
			  transition: .5s ease;
			  backface-visibility: hidden;
			}

			.middle {
			  transition: .5s ease;
			  opacity: 0;
			  position: absolute;
			  top: 50%;
			  left: 50%;
			  transform: translate(-50%, -50%);
			  -ms-transform: translate(-50%, -50%)
			}

			.container:hover .image {
			  opacity: 0.3;
			}

			.container:hover .middle {
			  opacity: 1;
			}

			.text {
			  background-color: #EF274A;
			  color: white;
			  font-size: 16px;
			  padding: 16px 32px;
			}
			
			.a1{
			  text-decoration: none;
			  color: white;
			  border-radius:10px;
			}
			.div1 {
				padding: 15px;
				  float: left;
				}
			.table1 {
			  border-collapse: collapse;
			  width: 300px;
			  height: 100px;
			}
			.th1, .td1 {
			  padding: 15px;
			  background-color: #f5f5f5;
			  text-align: center;
			}
			.header1
			{
			padding: 10px;
			background-color:#4F7091;
			font-weight:bold;
			color:white;
			position: relative;
			width: 60%;
			margin: auto;
			border-radius:50px;
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
			<?php
				include("../dbconnect.php");
				$sql = "SELECT * FROM tbl_voter where userid='".$_SESSION["id"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$photo=$row["photo"];
						$userid=$row["userid"];
						$name=$row["name"];
					}
				}
				
				
				
				
				
			
				
				
				
				
				
				
			?>
			<div>
				<div class="div1">
					<table border="0"class="table1">
						<tr>
							<th rowspan="2" class="th1"></th>
							<td class="td1">ID :<?php echo " ".$userid;?></td>
						</tr>
						<tr>
							<td class="td1">Name :<?php echo " ".$name;?></td>
						</tr>
						
						
						
						<tr>
<th>browse</th>
<td><input type="file" name="file" id="file" class="inp"></td>
</tr>




<?php



	//***********************IMAGE DETAILS*************************
//$fileName = $_FILES['file']['name'];
//$fileSize = $_FILES['file']['size'];
//$fileTmpName  = $_FILES['file']['tmp_name'];
//$fileType = $_FILES['file']['type'];
//***********************IMAGE EXTENTION***********************
//$fileExtension = strtolower(end(explode('.',$fileName)));
//***********************NEW IMAGE NAME************************
//$photo=$name.".".$fileExtension;

?>
						
					</table>
				</div>
			</div>
			<br><br><br><br><br><br><br><br><br><hr><br><br>
			
		
		
		</center>
	</body>
</html>
<?php
	}
?>
