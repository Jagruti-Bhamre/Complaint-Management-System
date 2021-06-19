<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];


$query1=mysqli_query($con,"SELECT category FROM `user` WHERE id='$uid'");

   while ($row1 = mysqli_fetch_array($query1)) 
   {
    $u_category = $row1['category'];
   

   }
   

$category=$_POST['category'];

if($category == 'CEO')
{
$mgr="";
}
else
{
  $mgr=$_POST['mgr'];

   list($part1, $part2) = explode('-', $mgr);
   $query2=mysqli_query($con,"SELECT id_num FROM `manager` WHERE mgrDept='$part1'");

   while ($row2 = mysqli_fetch_array($query2)) 
   {
    $id_num = $row2['id_num'];
   }

}

$noc=$_POST['noc'];
$complaintdetials=$_POST['complaindetails'];
$compfile=$_FILES["compfile"]["name"];
$alert=0;

//complaintNumber userId  category hod noc complaintDetails  complaintFile regDate status  lastUpdationDate

move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);
// $query=mysqli_query($con,"insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$state','$noc','$complaintdetials','$compfile')");
echo " uid== ".$uid;
echo " category== ".$category;
echo " u_category== ".$u_category;
echo " hod== ".$hod;
echo " noc== ".$noc;
echo " complaintdetials== ".$complaintdetials;
echo " string";
$query=mysqli_query($con,"insert into complaints(userId,category,user_cat, mgr,id_num,noc,complaintDetails,complaintFile,alert) values('$uid','$category','$u_category','$mgr','$id_num','$noc','$complaintdetials','$compfile','$alert')");

// code for show complaint number
$sql=mysqli_query($con,"select complaintNumber from complaints  order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your complaint has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ACR | User Register Complaint</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  


<SCRIPT>  
  function show_hod(select_item) {
      
    if (select_item == "CEO") 
    {
          mgr.style.visibility='hidden';
          mgr.style.display='none';
      Form.fileURL.focus();
    } 

    else
      if(select_item=="Manager")
      {

         mgr.style.visibility='visible';
         mgr.style.display='block';
         Form.fileURL.focus();
      }
    
  } 
</SCRIPT>  

<script>
function getmgr(val) {
  //alert('val');
<?php echo "hello"?>
  $.ajax({
  type: "POST",
  url: "getmgrname.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }
  </script>

  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Register Complaint</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                    

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Send To :</label>
<div class="col-sm-4">

<select name="category" onchange="java_script_:show_hod(this.options[this.selectedIndex].value)" required="required" class="form-control" id="categoryselector" >
    <option value="Manager">Manager</option>
    <option value="CEO">CEO</option>
  </select>
 
</select>
 </div>


<!-- <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Select Department</label> 
<div class="col-sm-4">
<select name="category" id="category" class="form-control" onChange="gethod(this.value);" required="">
<option value="">Select Deparment</option>
<?php $sql=mysqli_query($con,"select hodDept from hod ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['hodDept']);?></option>
<?php
}
?>
</select>
 </div> -->


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Department</label>
<div class="col-sm-4">
<select name="mgr" id="mgr" class="form-control" onChange="getmgr(this.value);" >
<option value="">Select Manager</option>
<?php $sql=mysqli_query($con,"select mgrDept,mgrName from manager ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
   
  <option value="<?php echo htmlentities($rw['mgrDept']);echo(  '-');echo htmlentities($rw['mgrName']);?>"><?php echo htmlentities($rw['mgrDept']);echo(  '-');echo htmlentities($rw['mgrName']);?></option>
<?php
}
?>
</select>
 <!-- </div>
<label class="col-sm-2 col-sm-2 control-label">Sub Category </label>
 <div class="col-sm-4">
<select name="subcategory" id="subcategory" class="form-control" >
<option value="">Select Subcategory</option>
</select>
</div>
 </div> -->



 


<!-- <label class="col-sm-2 col-sm-2 control-label">Sub Category </label>
 <div class="col-sm-4">
<select name="subcategory" id="subcategory" class="form-control" >
<option value="">Select Subcategory</option>
</select>
</div> -->
 </div>




<!-- <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Type</label>
<div class="col-sm-4">
<select name="complaintype" class="form-control" required="">
                <option value=" Complaint"> Complaint</option>
                  <option value="General Query">General Query</option>
                </select> 
</div> -->

<!-- <label class="col-sm-2 col-sm-2 control-label">State</label>
<div class="col-sm-4">
<select name="state" required="required" class="form-control">
<option value="">Select State</option>
<?php $sql=mysqli_query($con,"select stateName from state ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
<?php
}
?>

</select>
</div> -->
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">&nbsp&nbsp&nbsp&nbspNature of Complaint</label>
<div class="col-sm-4">
<input type="text" name="noc" required="required" value="" required="" class="form-control">
</div>

</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">&nbsp&nbsp&nbsp&nbspComplaint Details <br>&nbsp&nbsp&nbsp&nbsp(max 2000 words) </label>
<div class="col-sm-6">
<textarea  name="complaindetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">&nbsp&nbsp&nbsp&nbspComplaint Related Doc<br>&nbsp&nbsp&nbsp&nbsp&nbsp(if any) </label>
<div class="col-sm-6">
<input type="file" name="compfile" class="form-control" value="">
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
            
            
    </section>
      </section>
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
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom switch-->
  <script src="assets/js/bootstrap-switch.js"></script>
  
  <!--custom tagsinput-->
  <script src="assets/js/jquery.tagsinput.js"></script>
  
  <!--custom checkbox & radio-->
  
  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  
  
  <script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
