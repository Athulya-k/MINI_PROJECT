<html>
	<head>
		<title>Online Voting System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="../img/icon.jpg">
		<link rel="stylesheet" href="../css/style2.css">
		<style>
			body,html{
				background:url(../img/banner-bg.jpg) no-repeat;
				background-size:cover;
			}
			table {
			  border-collapse: collapse;
			  width: 98%;
			}

			}
			th {
				  
					font-weight:bold;
					font-size:15px;
					font-family:sans-serif;
				}
			tr {
				  
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
			.search{
			  text-align:center;
			  align:center;
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
			  width: 50%;
			  font-weight:bold;
			  font-size:15px;
			  font-family:sans-serif;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 20px;
			  resize: vertical;
			  background-color: #F4F4F4;
			}
			.h3{
			  text-align:center;
			  align:center;
			  color:#33A217;
			  font-weight:bold;
			  font-family:sans-serif;
			  padding: 12px;
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
			.avatar {
			  vertical-align: middle;
			  width: 70px;
			  height: 70px;
			  border-radius: 50%;
			}
		</style>
		<script>
			function searching()
			{
				var str = document.getElementById("search").value;
				var xhttp;    
			  if (str == "") {
				document.getElementById("result").innerHTML = "";
				return;
			  }
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("result").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("GET", "search1.php?search="+str, true);
			  xhttp.send();
			}
		</script>
	</head>
	<body>
		<ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="voter/v_login.php">Voter</a></li>
			<li><a href="admin/a_results.php">Election Status & Results</a></li>
			<li><a href="search.php">Electoral Roll Search</a></li>
			<li><a href="admin/admin.php">Admin</a></li>
		</ul>
		<br><br><br><br><br>
		<center>
				
				
				<form>
					<input class="list" type="text" id ="search" oninput="searching();" placeholder="Search">
				</form>
					
					<br>
					<div id="result"class="msg">
						Search Results will be display here...
					</div>
		</center>
	</body>
</html>

