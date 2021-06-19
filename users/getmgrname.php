<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $dept=$_POST['catid'];

  echo "string".$dept;
 $stmt = mysqli_query($con,"SELECT mgrName FROM manager WHERE mgrDept ='$dept'");

 ?>
 <?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['mgrName']); ?>"><?php echo htmlentities($row['mgrName']);?></option>
 
<!--  <input type="text" name="hodname" id="hodname" required="required" value="<?php echo htmlentities($row['hodName']);?>" class="form-control" readonly> -->



  <?php
 

}
}
?>




