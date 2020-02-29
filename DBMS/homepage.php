<?php
	session_start();
	require_once('config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
		<h3><center><?php echo ( $_SESSION['name'] ) ?></center><h3>
		<center><h3>Welcome to my website</h3></center>
	</div>
</body>
</html>