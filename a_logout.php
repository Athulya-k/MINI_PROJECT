<?php
	session_start();
	session_unset();
	session_destroy();
?>
<html>
	<head>
		<title>Online Voting System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="../../img/icon.jpg">
		<style>
			html,body{
			font-family:Verdana,sans-serif;
			font-size:15px;
			line-height:1.5;
			margin:0;
			padding:0;
			font-family:sans-serif;
			background:url(../../img/banner-bg.jpg) no-repeat;
			background-size:cover;
			}
			html{overflow-x:hidden}
			h1{font-size:36px;
			font-weight:bold;

			}h2{font-size:30px}h3{font-size:24px}h4{font-size:20px}h5{font-size:18px}h6{font-size:16px}
			h1,h2,h3,h4,h5,h6{font-family:"Segoe UI",Arial,sans-serif;font-weight:400;margin:10px 0}


			.header
			{margin: 0;
			padding: 10px;
			overflow: hidden;
			background-color: #2c3e50;
			font-weight:bold;
			color:white;
			position: fixed;
			top: 0;
			width: 100%;
			}
			.header1
			{
			padding: 10px;
			background-color:#4F7091;
			font-weight:bold;
			color:white;
			position: relative;
			top: 200px;
			width: 80%;
			margin: auto;
			border-radius:50px;
			}

		</style>
	<body>
		<br><br><br>
		<center>
			<div class="header1"><h1>User has Successfully Logged Out from Current Session</h1></div>
		</center>
	</body>
</html>
<?php
	header('Refresh: 2; URL=../../index.php');
?>
