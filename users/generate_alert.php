<?php
error_reporting(0);
include('includes/config.php');
if(isset($_GET['cid']))
{
  // echo "cid".cid;
  // echo "hello everone";

$comp_id=$_GET['cid'];
$query1=mysqli_query($con,"select status,alert from complaints  WHERE complaintNumber ='$comp_id'");
  while($row=mysqli_fetch_array($query1))
  {
      $status=$row['status'];
      $alert=$row['alert'];
    
  }

  if( $alert=='0')
        {

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ACR | User Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

      <div id="login-page">
      <div class="container">
        <h3 align="center" style="color:#fff"> 1st Alert Generated successfully</h3>
  <hr/>
  
          <form class="form-login" name="login" method="post">
           
                <button class="btn btn-theme btn-block" name="submit" type="submit" ><a class="" href="complaint-history.php">OK</button>
                <hr>
               </form>
             
            </div>
    
             /

   <!--  <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
     
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script> -->
  </body>
</html>


<?php      


        $query=mysqli_query($con,"update complaints set alert=1 WHERE complaintNumber ='$comp_id'");
        }
  if( $alert=='1')
        {

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ACR | User Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

      <div id="login-page">
      <div class="container">
        <h3 align="center" style="color:#fff"> 2nd Alert Generated successfully</h3>
  <hr/>
  
          <form class="form-login" name="login" method="post">
           
                <button class="btn btn-theme btn-block" name="submit" type="submit" ><a class="" href="complaint-history.php">OK</button>
                <hr>
               </form>
             
            </div>
    
             /

   <!--  <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
     
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script> -->
  </body>
</html>


<?php   


        $query=mysqli_query($con,"update complaints set alert=2 WHERE complaintNumber ='$comp_id'");
        }
  if($alert=='2')
        {


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ACR | User Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

      <div id="login-page">
      <div class="container">
        <h3 align="center" style="color:#fff"> 3rd Alert Generated successfully</h3>
  <hr/>
  
          <form class="form-login" name="login" method="post">
           
                <button class="btn btn-theme btn-block" name="submit" type="submit" ><a class="" href="complaint-history.php">OK</button>
                <hr>
               </form>
             
            </div>
    
             /

   <!--  <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
     
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script> -->
  </body>
</html>


<?php   



        $query=mysqli_query($con,"update complaints set alert=3 WHERE complaintNumber ='$comp_id'");
        }
      if( $alert=='3')
        {
?>
<!-- <!DOCTYPE html>
<html lang="en">
  <head>
        <a href="complaint-history.php"></a>
      </head>
      </html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ACR | User Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

      <div id="login-page">
      <div class="container">
        <h3 align="center" style="color:#fff">Complaint Send to Higher Authority</h3>
  <hr/>
  
          <form class="form-login" name="login" method="post">
           
                <button class="btn btn-theme btn-block" name="submit" type="submit" ><a class="" href="http://mahapolice.gov.in/">OK</button>
                <hr>
               </form>
             
            </div>
    
             

   <!--  <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
     
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script> -->
  </body>
</html>

 <?php      
}
  
  }

?>



