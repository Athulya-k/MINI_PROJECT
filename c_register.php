<?php
	include("../dbconnect.php");
	session_start();
?>
<html>
	<head>
		<title>Online Voting System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../css/style1.css">
		<link rel="icon" href="../../img/icon.jpg">
		<script>	
	
		function validate()
		{
			var name1= /^[a-z A-Z]+$/; //pattern allowed alphabet a-z or A-Z 
			//var party1= /^[a-z A-Z]+$/; //pattern allowed alphabet a-z or A-Z 
			//var ph= /^[0-9]{10}$/; 
                        //var email_valid= /^[\w\d\.]+\@[a-zA-Z\.]+\.[A-Za-z]{1,4}$/; //pattern valid email validation
			//var password_valid=/^[A-Z a-z 0-9 !@#$%&*()<>]{6,12}$/; //pattern password allowed A to Z, a to z, 0-9, !@#$%&*()<> character 
			
			var name = document.getElementById("name"); //textbox id fname
           // var party = document.getElementById("party"); //textbox id lname
            //var email = document.getElementById("email"); //textbox id email
            //var phone= document.getElementById("phone"); 
           // var password = document.getElementById("password"); //textbox id password
            var age= document.getElementById("age");
			
			if(!name1.test(name.value) || name.value=='') 
            {
				alert("Enter Name Alphabets Only....!");
                name.focus();
                name.style.background = '#f08080';
                return false;                    
            }
			
           
			
             //if(!ph.test(phone.value) || phone.value=='') 
            //{
				//alert("Enter Valid phone number....!");
                //phone.focus();
                //phone.style.background = '#f08080';
               // return false;                    
           // }
            if(age.value<18||age.value>150|| age.value=='') 
            {
				//alert("Cannot register!Age invalid....!");
                age.focus();
                age.style.background = '#f08080';
                return false;                    
            }
				

			//if(!password_valid.test(password.value) || password.value=='') 
           // {
				//alert("Alphanumeric Password Must Be 6 to 12 characters long.Special characters !@#$%&*()<> allowed....!");
               // password.focus();
               // password.style.background = '#f08080';
               // return false;                    
            //}
		}
		
                
		function setAge()
		{
			var dob = document.getElementById("dob"); //textbox id fname
                         
                        var today=new Date();
                        var dob1=new Date(dob.value);
                        var d=Math.abs(dob1.getTime()-today.getTime());
                         var age1=Math.floor(d/(1000*60*60*24*365));
                         (document.getElementById("age")).value=age1;
                       
		}

	</script>	
	</head>
	<body>
		<ul>
			<li><a href="../admin/a_home.php">HOME</a></li>
			<li style="float:right;"><a href="../admin/a_logout.php">LOGOUT</a></li>
		</ul>
		<form action="" method="POST" class="box" onSubmit="return validate();" enctype="multipart/form-data"> 
			<h1>CANDIDATE REGISTRATION</h1> 
			<table align="center">
				<tr>
					<th>NAME</th>
					<td><input type="text" id="name" name="username" class="inp" required></td>
				</tr>
				
				<tr>
					<th>DATE OF BIRTH:</th>
					<td><input type="date" id="dob" name="dob" class="inp" onChange="setAge();" required> </td>
				</tr>
				<tr>
					<th>AGE:</th>
					<td><input type="text" name="age" id="age" class="inp" readonly required></td>
				</tr>
				<tr>
					<th>GENDER:</th>
					<td><input type="radio" name="gender" value="Male" >Male&nbsp;
					<input type="radio" name="gender" value="Female">Female&nbsp;
					<input type="radio" name="gender" value="Others">Others</td>
				</tr>
				

				
				<tr>
					<th>DEPARTMENT:</th>
					<td><input type="department" id="department" name="department" class="inp" required></td>
				</tr>
				<tr>
					<th>ADMISSION NO:</th>
					<td><input type="admission" id="admission" name="admission" class="inp" required></td>
				</tr>
				<tr>
					<th>NAME OF POST:</th>
					<td><input type="position" id="position" name="position" class="inp" required></td>
				</tr>
				
				
				
				
				
				<tr>
					<td><input type="reset" value="reset" name="r" class="reset"></td>
					<td><input type="submit" value="submit" name="submit"class="submit"></td>
				</tr>
			</table>
		</form>
		
		<?php
			if(isset($_POST['submit']))
			{
				$uname=$_POST['username'];

				$dob=$_POST['dob'];
				$age=$_POST['age'];
				$gender=$_POST['gender'];
				//$mob=$_POST['mobile'];
				//$pass=$_POST['password'];
				$dept=$_POST['department'];
				$adno=$_POST['admission'];
				$post=$_POST['position'];
				
				//***********************IMAGE DETAILS*************************
				//$fileName = $_FILES['file']['name'];
				//$fileSize = $_FILES['file']['size'];
				//$fileTmpName  = $_FILES['file']['tmp_name'];
				//$fileType = $_FILES['file']['type'];
				//***********************IMAGE EXTENTION***********************
				//$fileExtension = strtolower(end(explode('.',$fileName)));
				//***********************NEW IMAGE NAME************************
				//$photo=$uname.".".$fileExtension; 
				
		
				
				$sql="INSERT INTO tbl_candidate
				values(id,'".$uname."','".$dob."','".$age."','".$gender."','".$dept."','".$adno."','".$post."',CURRENT_TIMESTAMP())";
				if ($conn->query($sql) === TRUE)
				{
					//if(move_uploaded_file($fileTmpName, "../uploads/".$photo))
					
					
							
						
							$_SESSION["cname"] = $uname;
							echo"<script>alert('Registration is done Successfully');
							window.location.replace('../admin/a_home.php');</script>";
						
					
				} 
				else 
				{
				echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
			}
		?>
	</body>
</html>
