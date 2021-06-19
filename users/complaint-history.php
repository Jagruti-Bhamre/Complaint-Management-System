<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ACR | Complaint History</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your Complaint Hstory</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">Complaint Number</th>
                                  <th style="text-align: center">Reg Date</th>
                                  <th style="text-align: center">last Updation date</th>
                                  <th style="text-align: center">Status</th>
                                  <th style="text-align: center">Action</th>
                                  <th style="text-align: center">Alert</th>
                                   <th style="text-align: center">No. of Alert</th>
                                                                      <!-- <th style="text-align: center">DEmo</th> -->
                                  
                              </tr>
                              </thead>
                              <tbody>
  <?php $query=mysqli_query($con,"select * from complaints where userId='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row['complaintNumber']);?></td>
                                  <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                                 <td align="center"><?php echo  htmlentities($row['lastUpdationDate']);?></td>

                                  <td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <button type="button" class="btn btn-theme04">Not Process Yet</button>
                                   <?php }
 if($status=="in process"){ ?>
<button type="button" class="btn btn-warning">In Process</button>
<?php }
if($status=="closed") {
?>
<button type="button" class="btn btn-success">Closed</button>
<?php } ?></td>
                                   <td align="center">
                                   <a href="complaint-info.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
<button type="button" class="btn btn-primary">View Details</button></a>
                                   </td>
                                     <td align="center">

<a href="generate_alert.php?cid=<?php echo htmlentities($row['complaintNumber']);?>&&action=alert" title="Alert" onClick="return confirm('Do you really want to generate Alert')"> 

 <!--  <a href="complaint-history.php?cid=<?php echo htmlentities($row['complaintNumber']);?>&&action=alert" title="Alert" onClick="return confirm('Do you really want to generate Alert')">  --> 

<button type="button" class="btn btn-primary">Alert</button></a>
                                   </td>

<td align="center"><?php 
                                    $alert=$row['alert'];
                                    if($alert== 0 )
                                    { ?>
                                      <button type="button" class="btn btn-theme04">0</button>
                                   <?php }
 if($alert== 1 ){ ?>
<button type="button" class="btn btn-warning">1</button>
<?php }
 if($alert== 2 ) {
?>
<button type="button" class="btn btn-success">2</button>
<?php } 
    if($alert== 3 ) {
?>
<button type="button" class="btn btn-success">3</button>
<?php } 

?></td>








<!-- <td>
<p>Click "Try it" to call a function with arguments</p>

<button onclick="myFunction("<?php echo $row['complaintNumber'];?>")">Try it"<?php echo $row['complaintNumber'];?>"</button>

<p id="demo"></p>
</td> -->
<script>
function myFunction(name) {
   document.getElementById("demo").innerHTML = "Welcome " + name + ", the " + name + ".";

<?php
//include('includes/config.php');

$comp_id=$_GET['name'];
$query1=mysqli_query($con,"select status,alert from complaints  WHERE complaintNumber ='$comp_id'");
  while($row=mysqli_fetch_array($query1))
  {
      $status=$row['status'];
      $alert=$row['alert'];
    
  }

  if($status=='in process' && $alert=='0')
        {
        $query=mysqli_query($con,"update complaints set alert=1 WHERE complaintNumber ='$comp_id'");
        }
  if($status=='in process' && $alert=='1')
        {
        $query=mysqli_query($con,"update complaints set alert=2 WHERE complaintNumber ='$comp_id'");
        }
  if($status=='in process' && $alert=='2')
        {
        $query=mysqli_query($con,"update complaints set alert=3 WHERE complaintNumber ='$comp_id'");
        }
     
?>

}
</script>





                                </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
<?php } ?>
