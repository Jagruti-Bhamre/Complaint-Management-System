<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	echo "welcome Manager";
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
	echo $password;
	
	$ret=mysqli_query($con,"SELECT * FROM manager WHERE id_num='$username' and mgr_pass='$password'");
	// id_num is password
	//$ret=mysqli_query($con,"SELECT * FROM hod WHERE id_num='$username' and hod_pass='$password'");
	
$num=mysqli_fetch_array($ret);
echo "welcome Manager";
echo $num;
if($num>0)
{
	echo "welcome Manager";
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	echo $password;
// $_SESSION['errmsg']=$password+"Invalid username or password";
	$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ACR | Manager login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body style="background-image:url('http://localhost/cms/img/login-bg.jpg');">

	
			<div class="container">
				
				<br>
				<br>
			  	<a href="index.html" style="color: white">
			  		<h2 style="color: white">ACR | Manager</h2>
			  	</a>

				
				
					<ul class="nav pull-right">

						<li><a href="http://localhost/cms/" style="color: white">
						<h3 style="color: white">Back to Portal</h3>
						
						</a></li>

						

						
					</ul>
				
			</div>
		



	
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="post">
						<div class="module-head"style="background-color: LightBlue">
							<center><h2>Manager Login</h2></center>
						</div>
						<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="username" placeholder="Enter Manager Id">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
						<input class="span12" type="password" id="inputPassword" name="password" placeholder="Enter password">
								</div>
							</div>
						</div>
						<div class="module-foot"style="background-color: LightBlue">
							<div class="control-group">
								<div class="controls clearfix">
									<center>
									<button type="submit" class="btn btn-primary" name="submit">Login</button>
									</center>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>
			 <br>

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2021 CMS </b> All rights reserved.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>