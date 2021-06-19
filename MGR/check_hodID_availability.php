<?php 
require_once("include/config.php");
if(!empty($_POST["id_num"])) {
	$id_num= $_POST["id_num"];
	
		$result =mysqli_query($con,"SELECT id_num FROM hod WHERE id_num='$id_num'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> ID already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> ID available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
