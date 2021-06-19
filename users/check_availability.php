<?php 
require_once("includes/config.php");
if(!empty($_POST["user_id"])) {
	$user_id= $_POST["user_id"];
	
		$result1 =mysqli_query($con,"SELECT user_id FROM user WHERE user_id='$user_id'");
		$count1=mysqli_num_rows($result1);
if($count1>0)
{
echo "<span style='color:red'> User ID already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> User ID available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
else if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	
		$result =mysqli_query($con,"SELECT userEmail FROM user WHERE userEmail='$email'");
		$count2=mysqli_num_rows($result);
if($count2>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}



?>
