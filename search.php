<?php
	session_start();
	//$fid=$_GET["fid"];
	
	
?>
<html>
	<head>
		<title>Online Voting System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/style2.css">
		<link rel="icon" href="img/icon.jpg">
		<style>
			body,html{
				background:url(../img/banner-bg.jpg) no-repeat;
				background-size:cover;
			}
		</style>
	</head>
	<body>
		<ul>
			
			<li style="float:right;"><a href="../index.php">LOGOUT</a></li>
		</ul>
		<br>
		<table align="right" cellspacing="29">
			<!--<tr><th><a href="../candidate/c_register.php"><input type="button" class="button4" value="REGISTER NEW CANDIDATE"></a></th></tr>-->
			<!--<tr><th><a href="../voter/v_register.php"><input type="button" class="button4" value="REGISTER NEW VOTER"></a></th></tr>-->
			<tr><th><a href="admin/sear_cand.php"><input type="button" class="button4" value="VIEW CANDIDATE LIST"></a></th></tr>
			<!--<tr><th><a href="admin/dep_list.php"><input type="button" class="button4" value="VIEW VOTER LIST"></a></th></tr>-->
			<!--<tr><th><a href="a_ballot_list.php"><input type="button" class="button4" value="VIEW BALLOT LIST"></a></th></tr>-->
		</table>
	</body>
</html>
<?php
	
?>
