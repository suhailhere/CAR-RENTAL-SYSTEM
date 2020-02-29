<?php
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="inner_container">
			
				<label><b>Name</b></label>
				<input type="text" placeholder="Enter Name" name="name" required>
				
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				
				<label><b>Age</b></label>
				<input type="text" placeholder="Enter age" name="age" required>
				
				<label><b>Phone No.</b></label>
				<input type="text" placeholder="Enter Phone No" name="pnumber" required>
				
				<label><b>Licence No.</b></label>
				<input type="text" placeholder="Enter Licence No" name="licenceno" required>
				
				<label><b>Email Id</b></label>
				<input type="text" placeholder="Enter Email Id" name="emailid" required>
				
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		<?php
		
		session_start();
			if(isset($_POST['register']))
			{
				$name=$_POST['name'];
				$username=$_POST['username'];
				$age=$_POST['age'];
				$pnumber=$_POST['pnumber'];
				$licenceno=$_POST['licenceno'];
				$emailid=$_POST['emailid'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from table1 where uname='$username'";
					
					$query_run = mysqli_query($con,$query);
				
				
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into table1 values('$name','$username','$age','$pnumber','$licenceno','$emailid','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Go to login page")</script>';
								$_SESSION['name'] = $name;
								$_SESSION['password'] = $password;
								header( "Location: homepage.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
		?>
		
		
	</div>
</body>
</html>