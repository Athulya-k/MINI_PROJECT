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
		<link rel="stylesheet" href="../../css/style2.css">
		<link rel="icon" href="../../img/icon.jpg">
		<style>
			body,html{
				background:url(../../img/banner-bg.jpg) no-repeat;
				background-size:cover;
			}
		</style>
	</head>
	<body>
		<ul>
			<li><a href="a_home.php">HOME</a></li>
			<li style="float:right;"><a href="a_logout.php">LOGOUT</a></li>
		</ul>
		<br>
		<table align="right" cellspacing="20">
			<tr><th><a href="../candidate/c_register.php"><input type="button" class="button4" value="REGISTER NEW CANDIDATE"></a></th></tr>
			<!--<tr><th><a href="../voter/v_register.php"><input type="button" class="button4" value="REGISTER NEW VOTER"></a></th></tr>-->
			<tr><th><a href="a_candidates_list.php"><input type="button" class="button4" value="VIEW CANDIDATE LIST"></a></th></tr>
			<tr><th><a href="a_voters_list.php"><input type="button" class="button4" value="VIEW VOTER LIST"></a></th></tr>
			<tr><th><a href="a_ballot_list.php"><input type="button" class="button4" value="VIEW BALLOT LIST"></a></th></tr>
		</table>
	</body>
</html>
<?php
	}
?>
