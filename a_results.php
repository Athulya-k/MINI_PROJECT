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
			  width: 150px;
			  height: 150px;
			  border-radius: 50%;
			  border: 2px solid #F9DF4D;
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
			.cname{
			  text-align:center;
			  align:center;
			  font-weight:bold;
			  font-size:15px;
			  font-family:monospace;
			  padding: 10px;
			  border-radius: 20px;
			  resize: vertical;
			  background-color: #D8EAF3;
			}
			.winner{
			  text-align:center;
			  align:center;
			  font-weight:bold;
			  font-size:20px;
			  font-family:verdana;
			  padding: 10px;
			  
			  resize: vertical;
			  background-color: red;
			}
		</style>
	</head>
	<body>
		<ul>
			<li><a href="../../index.php">Home</a></li>
			<li><a href="../voter/v_login.php">Voter</a></li>
			<li><a href="a_results.php">Election Status & Results</a></li>
			<li><a href="../search.php">Electoral Roll Search</a></li>
			<li><a href="admin/admin.php">Admin</a></li>
		</ul>
		<br><br><br><br><br>
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
						  xhttp.open("GET", "a_untitled1.php?eid="+str, true);
						  xhttp.send();
						}
					</script>
					<br>
					<div id="list">
						<div class="msg">Election Results will be listed here...</div>
					</div>
		</center>
	</body>
</html>
