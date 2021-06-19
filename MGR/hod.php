
<?php
session_start();
include('include/config.php');


function display()
{
// 	define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'cms');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    echo "hello all hod";
    $department=$_POST['department'];
	echo "department is".$department;
    $result =mysqli_query($con,"SELECT hodDept FROM hod WHERE hodDept='$department'");
    echo "hello all hod22222";
		$count=mysqli_num_rows($result);
		echo "Count is".$count;
		if($count>0 )
		{
		 // echo "<span style='color:red'> Department already exists .</span>";
		 // echo "<script>$('#submit').prop('disabled',true);</script>";
    $_SESSION['msg']="Department already exists !!";
		 return 0;
		} 
		else
		{
	
		 echo "<span style='color:green'> Department available for Registration .</span>";
		 echo "<script>$('#submit').prop('disabled',false);</script>";
		 return 1;
		}
}

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$flag = display();
	$name=$_POST['name'];
	$id_num=$_POST['id_num'];
	$department=$_POST['department'];
	$gender=$_POST['gender'];
	//$EncryptPassword = md5("HD".$id_num);
	$EncryptPassword = md5($id_num);
	//$EncryptPassword = $id_num;
	echo $EncryptPassword;
	if($flag==1)
	{
$sql=mysqli_query($con,"insert into hod(hodName,hodDept,id_num,gender,hod_pass) values('$name','$department','$id_num','$gender','$EncryptPassword')");
$_SESSION['msg']="Welldone....HOD added Successfully !!";
}
else
{
	echo "<span style='color:green'> HOD already exists with the Department .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from hod where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="HOD deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| HOD</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

<script>
function hod_ID_Availability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_hodID_availability.php",
data:'id_num='+$("#id_num").val(),
type: "POST",
success:function(data){
$("#hod-ID-Availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>

</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>HOD</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="HOD" method="post" >
									
<div class="control-group">
<label class="control-label" for="basicinput">Name</label>
<div class="controls">
<input type="text" placeholder="Enter HOD Name"  name="name" class="span8 tip" required>
</div>
</div>




<div class="control-group">
<label class="control-label" for="basicinput">Identification Number</label>
<div class="controls">
<!-- <input type="text"  name="id_num" class="span8 tip" required>

 <input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span> -->

 <input type="text" class="form-control" placeholder="Enter Identification Number" id="id_num" onBlur="hod_ID_Availability()" name="id_num" required="required">

<span id="hod-ID-Availability-status1" style="font-size:12px;"></span>
</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Department</label>
	
	<div class="controls">
	<!-- <select name="category" class="span8 tip" required>	
	<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($catname=$row['categoryName']);?></option>
	<!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <?
	// php $ret=mysqli_query($con,"select * from category");
	// while($result=mysqli_fetch_array($ret))
	// {
	// 	$cat=$result['categoryName'];
	// if($catname=$cat)
	// {
	// continue;
	// }
	// else{
	?> --> 
	<!--<option value="<?php echo $result['id'];?>">
		<?php echo $result['categoryName'];?></option>
	<?php 
//} 
//}
?>
</select> -->
<select name="department" class="span8 tip" required>
		<option value="Information Technology">Information Technology</option>
		<option value="Mechanical">Mechanical</option>
		<option value="Computer">Computer</option>
		<option value="Electronic and Telecommunication">Electronic and Telecommunication</option>
		<option value="Civil">Civil</option>
	</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Gender</label>
<div class="controls">
<!-- <input type="text" placeholder="Enter ID"  name="subcategory" value="<?php echo  htmlentities($row['subcategory']);?>" class="span8 tip" required> -->
        <input type="radio" name="gender" value="Male"> Male
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value="Female"> Female
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<!-- <button type="submit" name="submit" class="btn">Create</button> -->

												 <button class="btn btn-theme btn-block"  type="submit" name="submit" id="submit"> Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Manage HOD</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Department</th>
											<th>HOD ID</th>
											<th>Creation date</th>
											<th>Last Updated</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from hod");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['hodName']);?></td>
											<td><?php echo htmlentities($row['hodDept']);?></td>
											<td><?php echo htmlentities($row['id_num']);?></td>
											<td> <?php echo htmlentities($row['postingDate']);?></td>
											<td><?php echo htmlentities($row['updationDate']);?></td>
											<td>
											<a href="edit-hod.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											<a href="hod.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>