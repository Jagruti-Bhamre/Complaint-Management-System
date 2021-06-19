<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $dept=$_POST['catid'];

  echo "string".$dept;
 $stmt = mysqli_query($con,"update complaints set alert=1  WHERE complaintNumber ='$dept'");
$row=mysqli_fetch_array($stmt);
 
 

}
}
?>




