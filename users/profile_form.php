<!DOCTYPE html>
<html lang="en">
  <head>
   
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | User Change Password</title>

<!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

 <!--  <script>
  $(function() {
    $( "#date_ex" ).datepicker();
  });
  </script> -->

  <script>

$(function () {
      $("#date_ex").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true });
        });
  </script>

  <style>
.ui-datepicker {
  width: 17em;
  padding: .2em .2em 0;
  display: none;
    background:#2F99B4;  
}
.ui-datepicker .ui-datepicker-title {
  margin: 0 2.3em;
  line-height: 1.8em;
  text-align: center;
    color:#FFFFFF;
    background:#2F99B4;  
}
.ui-datepicker table {
  width: 100%;
  font-size: .7em;
  border-collapse: collapse;
    font-family:verdana;
  margin: 0 0 .4em;
    color:#000000;
    background:#9EEFEE;    
}
/*This is date TD */
.ui-datepicker td {

  border: 0;
  padding: 1px;

    
}
.ui-datepicker td span,
.ui-datepicker td a {
  display: block;
  padding: .8em;
  text-align: right;
  text-decoration: underline;
}
</style>

<SCRIPT>  
  function show_category(select_item) {
      if (select_item == "student") {
          student.style.visibility='visible';
          student.style.display='block';

          staff.style.visibility='hidden';
          staff.style.display='none';

          other.style.visibility='hidden';
          other.style.display='none';
      Form.fileURL.focus();
    }
    else 
    if (select_item == "staff") 
    {
          staff.style.visibility='visible';
          staff.style.display='block';

          student.style.visibility='hidden';
          student.style.display='none';

          other.style.visibility='hidden';
          other.style.display='none';
      Form.fileURL.focus();
    } 
    else 
    if (select_item == "other")
     {
          other.style.visibility='visible';
          other.style.display='block';  

          staff.style.visibility='hidden';
          staff.style.display='none';

          student.style.visibility='hidden';
          student.style.display='none';
      Form.fileURL.focus();
    } 
    else if (select_item == " ")
    {
          other.style.visibility='hidden';
          other.style.display='none';  

          staff.style.visibility='hidden';
          staff.style.display='none';

          student.style.visibility='hidden';
          student.style.display='none';
    }
  } 
</SCRIPT>  



  </head>

  <body>
   <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Profile info</h3>
            
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
<!-- ===================== -->
   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php $query=mysqli_query($con,"select * from user where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullName']);?>'s Profile</h4>
    <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>
                      <form class="form-horizontal style-form" method="post" name="profile" >

<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">Name</label>
  <div class="col-sm-4">
    <input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullName']);?>" class="form-control" >
  </div>
  <label class="col-sm-2 col-sm-2 control-label">Email </label>
  <div class="col-sm-4">
    <input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control" readonly>
  </div>
</div>


<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">Contact</label>
  <div class="col-sm-4">
    <input type="text" name="contactno" required="required" value="<?php echo htmlentities($row['contactNo']);?>" class="form-control">
  </div>
  <label class="col-sm-2 col-sm-2 control-label">Address </label>
    <div class="col-sm-4">
      <textarea  name="address" required="required" class="form-control"><?php echo htmlentities($row['address']);?></textarea>
    </div>
</div>




<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">Gender</label>
    <div class="col-sm-4">
      <div class="radio">
       
        <label><input type="radio" name="genderradio"  <?=$row['gender']=="Male" ? "checked" : ""?>value="Male" >Male</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label><input type="radio" name="genderradio"  <?=$row['gender']=="Female" ? "checked" : ""?> value="Female">Female</label>
      </div>
    </div>
  <label class="col-sm-2 col-sm-2 control-label">DOB</label>
    <div class="col-sm-4">
        <i class="fa fa-calendar fa-lg"></i>&nbsp&nbsp&nbsp&nbsp<input type="text" name="date_ex" id="date_ex" value="<?php echo htmlentities($row['dob']);?>">
    </div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Select Category</label>
<div class="col-sm-4">
<select name="Category" onchange="java_script_:show_category(this.options[this.selectedIndex].value)" required="required" class="form-control" id="categoryselector" >
  <option value="<?php echo htmlentities($row['category']);?>" > <?php echo htmlentities($row['category']);?> </option>

  <option value="student">Student</option>
  <option value="staff">Staff</option>
  <option value="other">Other</option>
 </select>

<br>


<div id="student" class="category" style="display:none">
   <div><label >Enter PRN Number</label></div>
  <br>
  <div><input type="text" name="stdprnnumber" value="<?php echo htmlentities($row['prn_no']);?>" ></div>
  
</div>
<div id="staff" class="category" style="display:none">
   <div><label >Enter Staff Registration Number</label></div>
  <br>
  <div><input type="text" name="staffprnnumber" value="<?php echo htmlentities($row['prn_no']);?>"></div>
</div>
<div id="other" class="category" style="display:none">
  <div><label >Enter Registration Number</label></div>
  <br>
  <div><input type="text" name="otherprnnumber" value="<?php echo htmlentities($row['prn_no']);?>" ></div>
  
</div>
</div>




<label class="col-sm-2 col-sm-2 control-label">Select Department</label>
<div class="col-sm-4">

<select name="Department" required="required" class="form-control" id="departmentselector" >
  <option value="<?php echo htmlentities($row['department']);?>" ><?php echo htmlentities($row['department']);?></option>
   <option value="Computer">Computer</option>  
  <option value="Mechanical">Mechanical</option>
  <option value="IT">IT</option>
  <option value="Electrical">Electrical</option>
  <option value="Chemical">Chemical</option>
 
</select>
<!-- <br>

<div id="Computer" class="department" style="display:none">
   <center><div><label ><b>Prof. A.B.Patil</b></label></div></center>
</div>

<div id="Mechanical" class="department" style="display:none">
   <center><div><label ><b>Prof. B.C.Vaidya</b></label></div></center>
</div>

<div id="Mechanical" class="department" style="display:none">
   <center><div><label ><b>Prof. M.U.Kharat</b></label></div></center>
</div>

<div id="IT" class="department" style="display:none">
   <center><div><label ><b>Prof. D.Y.Patil</b></label></div></center>
</div>

<div id="Electrical" class="department" style="display:none">
   <center><div><label ><b>Prof. H.N.Katkade</b></label></div></center>
</div>

<div id="Chemical" class="department" style="display:none">
   <center><div><label ><b>Prof. K.U.Karande</b></label></div></center>
</div>

 -->
</div>
</div>








<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
<div class="col-sm-4">
<input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
 </div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">User Photo</label>
<div class="col-sm-4">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png" width="256" height="256" >
<a href="update-image.php">Change Photo</a>
<?php else:?>
  <img src="userimages/<?php echo htmlentities($userphoto);?>" width="256" height="256">
  <a href="update-image.php">Change Photo</a>
<?php endif;?>
</div>

</div>

<?php } ?>

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


