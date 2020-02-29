<?php
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Login Form</h2></center>
		<form action="login.php" method="post">
		
			<div class="inner_container">
				
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				
				
				<label><b>Password</b></label>
				<input type="text" placeholder="Enter Password" name="password" required>
				
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
			</div>
		</form>
		
		<?php
		session_start();
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$query = "select name from table1 where uname = '$username' and password = '$password' ";
			
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					while ($row = mysqli_fetch_array($query_run)) {
						//echo $row["name"];
						$_SESSION['name'] = $row["name"];
						header( "Location: homepage.php");
					}
					
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
		?>
		
	</div>
</body>
</html>