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
			  width: 100px;
			  height: 100px;
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
					font-size:20px;
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
			
			.list{
			  width: 50%;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  resize: vertical;
			}
			.submit{
			  background-color: #2E8BBE;
			  color: white;
			  padding: 12px 20px;
			  border: none;
			  border-radius: 20px;
			  cursor: pointer;
			  width:80%;
			  font-weight:bold;
			  font-family:monospace;
			  font-size:20px;}
			  
			 .submit:hover{
			background-color: #05A545;
			}
			.cancel{
			  background-color: #FE9454;
			  color: white;
			  padding: 12px 20px;
			  border: none;
			  border-radius: 20px;
			  cursor: pointer;
			  width:80%;
			  font-weight:bold;
			  font-family:monospace;
			  font-size:20px;}
			  
			 .cancel:hover{
			background-color: #EC2306;
			}
			
			hr{
				border: 2px solid #104A6D;
				}
			h3{
			  font-size:30px;
			  color: white;
			  font-weight:bold;
			  font-family:monospace;
				}
			.h3{
			background-color: #3E7DA4;
			}
			.h3:hover{
			background-color: #3E7DA4;
			}
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
				<tr style="height:50px"><th colspan="7"><h2>Voters Approval</h2></th></tr>
				<tr style="height:50px">
					<th>S/No.</th>
					<th>Photo</th>
					<th>ID</th>
					<th>Name</th>
					<th>Finger ID</th>
					<th>Election</th>
					<th>Approval</th>
				</tr>
				<tr style="height:50px" class="h3">
					<td colspan="7"><h3>APPROVED ONE</h3></td>
				</tr>
				<?php
					include("../dbconnect.php");
					
/*===========================================================================================================================================
*****************************DISPLAYING APPROVED ONE**************************************************************************************
===========================================================================================================================================*/
					$sql6 = "SELECT v.userid,v.photo,v.name,v.fingerid,a.election_id FROM tbl_voter v,tbl_voter_approval a where v.userid=a.voter_id and approval='Y'";
					$result = $conn->query($sql6);
					$c=0;
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{	$c++;
						echo"<form method='post'>
							<tr>
							<td>".$c."</td>
							<td><img src='../uploads/".$row["photo"]."' alt='".$row["name"]."' class='avatar'></td>
							<td>".$row["userid"]."<input type='hidden' name='vid' value='".$row["userid"]."'></td>
							<td>".$row["name"]."</td>
							<td>".$row["fingerid"]."</td>
							<td>".$row["election_id"]."</td>
							<td><input type='submit' value='Cancel' name='cancel' class='cancel'></td>
							</tr>
							</form>";
						}
					}
					else
					{
						echo"<tr style='height:50px'><td colspan='7'>NO DATA</td></tr>";
					}
				?>
<!--===========================================================================================================================================
//*****************************FORM SUBMISSION OF CANCEL***************************************************************************
//============================================================================================================================================-->
				<?php	
					if(isset($_POST['cancel']))
					{
						$vid=$_POST['vid'];
						$eid=$_POST['eid'];
						
						$sql2="UPDATE `tbl_voter_approval` SET election_id='',approval='N', timestamp=CURRENT_TIMESTAMP() where voter_id='".$vid."'";
						if ($conn->query($sql2) === TRUE)
						{
							$sql3 = "SELECT id FROM `tbl_voting_details` WHERE voter_id='".$vid."'AND approval='Y' AND vote='N' AND status='Active'";
							$result = $conn->query($sql3);
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{	
									$aid=$row["id"];
								}
							} 
							else 
							{
								echo"<script>alert('ERROR !!!, Try Again...1');
								window.location.replace('a_voter_approval.php');</script>";
							}
							
							$sql2="UPDATE `tbl_voting_details` SET  approval='N', status='Inactive' where id=".$aid."";
							if ($conn->query($sql2) === TRUE)
							{
								echo"<script>alert('Cancelled Successfully');
								window.location.replace('a_voter_approval.php');</script>";
							} 
							else 
							{
								echo"<script>alert('ERROR !!!, Try Again..2');
								window.location.replace('a_voter_approval.php');</script>";
							}
						} 
						else 
						{
							echo"<script>alert('ERROR !!!, Try Again.');
							window.location.replace('a_voter_approval.php');</script>";
						}
					}
				?>
					
					<tr style="height:50px">
						<td colspan="7"><hr></td>
					</tr>
					<tr style="height:50px" class="h3">
						<td colspan="7"><h3>FOR APPROVAL</h3></td>
					</tr>
<!--===========================================================================================================================================
//*****************************APPROVAL OPTION*********************************************************************************************
//===========================================================================================================================================-->	
				<?php
				
					$sql1 = "SELECT * FROM tbl_election where status='Active'";
					$result = $conn->query($sql1);
					echo"<datalist id='election'>";
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{	
							echo"<option value='".$row["e_id"]."'>";
						}
					}
					echo"</datalist>";
					
					$sql = "SELECT * FROM tbl_voter v,tbl_voter_approval a where v.userid=a.voter_id and approval='N'";
					$result = $conn->query($sql);
					$c=0;
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{	$c++;
						echo"<form method='post'>
							<tr>
							<td>".$c."</td>
							<td><img src='../uploads/".$row["photo"]."' alt='".$row["name"]."' class='avatar'></td>
							<td>".$row["userid"]."<input type='hidden' name='vid' value='".$row["userid"]."'></td>
							<td>".$row["name"]."</td>
							<td>".$row["fingerid"]."</td>
							<td><input class='list' list='election' name='eid' required placeholder='Select the Election ID'></td>
							<td><input type='submit' value='Approve' name='approve' class='submit'></td>
							</tr>
							</form>";
						}
					}
					else
					{
						echo"<tr style='height:50px'><td colspan='7'>NO DATA</td></tr>";
					}
				?>
<!--===========================================================================================================================================
//*****************************FORM SUBMISSION OF APPROVAL OPTION***************************************************************************
//===========================================================================================================================================-->
				<?php	
					if(isset($_POST['approve']))
					{
						$vid=$_POST['vid'];
						$eid=$_POST['eid'];
						
						$sql2="UPDATE `tbl_voter_approval` SET election_id='".$eid."',approval='Y', timestamp=CURRENT_TIMESTAMP() where voter_id='".$vid."'";
						if ($conn->query($sql2) === TRUE)
						{
							$sql3 = "SELECT * FROM tbl_election where e_id='".$eid."'";
							$result = $conn->query($sql3);
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{	
									$ename=$row["e_name"];
								}
							} 
							else 
							{
								echo"<script>alert('ERROR !!!, Try Again...');
								window.location.replace('a_voter_approval.php');</script>";
							}
							
							$sql2="INSERT INTO `tbl_voting_details`(`id`, `election_name`, `election_id`, `voter_id`,`approval`, `vote`, `status`, `timestamp`)
							VALUES(id,'".$ename."','".$eid."','".$vid."','Y','N','Active',CURRENT_TIMESTAMP())";
							if ($conn->query($sql2) === TRUE)
							{
								echo"<script>alert('Approved Successfully');
								window.location.replace('a_voter_approval.php');</script>";
							} 
							else 
							{
								echo"<script>alert('ERROR !!!, Try Again..');
								window.location.replace('a_voter_approval.php');</script>";
							}
						} 
						else 
						{
							echo"<script>alert('ERROR !!!, Try Again.');
							window.location.replace('a_voter_approval.php');</script>";
						}
					}
				?>
			</table>
		</center>
	</body>
</html>
<?php
	}
?>
