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
			
			.list,option{
			  text-align:center;
			  align:center;
			  width: 30%;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 20px;
			  resize: vertical;
			  font-weight:bold;
			  font-size:15px;
			  font-family:sans-serif;
			}
			
			.msg{
			  text-align:center;
			  align:center;
			  width: 25%;
			  font-weight:bold;
			  font-size:15px;
			  font-family:sans-serif;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 20px;
			  resize: vertical;
			  background-color: #F4F4F4;
			}
		</style>
	</head>
	<body>
		<ul>
			<li><a href="a_home.php">HOME</a></li>
			<li style="float:right;"><a href="a_logout.php">LOGOUT</a></li>
		</ul>
		<br>
		<center>
				<?php
					include("../dbconnect.php");
					
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
					else
					{
						echo"<option value='NO DATA'>";
					}
					echo"</datalist>";
				?>
				<form>
					<input class="list" list="election" name="eid"  oninput="election(this.value)" required placeholder="Select the Election ID">
				</form>
					<script>
						function election(str) {
						  var xhttp;    
						  if (str == "") {
							document.getElementById("list").innerHTML = "";
							return;
						  }
						  xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
							  document.getElementById("list").innerHTML = this.responseText;
							}
						  };
						  xhttp.open("GET", "a_ballot.php?eid="+str, true);
						  xhttp.send();
						}
					</script>
					<br>
					<div id="list">
						<div class="msg">Ballot List will be listed here...</div>
					</div>
		</center>
	</body>
</html>
<?php
	}
?>
