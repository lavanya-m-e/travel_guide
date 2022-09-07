<!doctype html>
<html lang="en">
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
    $uemail=$_POST['Email'];
    $upassword=$_POST['Password'];
    if($uemail!="" && $upassword!="")
    {
        $sql="SELECT * FROM c_account WHERE Email ='$uemail' and Password ='$upassword'";
        $result=mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result,MSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
            //echo "login success";
        }
        else{
             header("location: login_unsuccess.html");
         }
    }
   
mysqli_close($conn);
?>
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="css/create.css" type="text/css" rel="stylesheet">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <title>create account</title>
 </head>
 <body>
   <div class="container-fluid bg">
       <div class="row">
           <div class="col-md-4 col-sm-4 col-xs-12"></div>
           <div class="col-md-4 col-sm-4 col-xs-12"></div>
           <div class="col-md-4 col-sm-4 col-xs-12">
           <!-- form start-->
           <form class="form-container" action="Service.php" method="POST">
               <h3>LOGIN SUCCESSFULL !!</h3>
               <div class="form-group">
                   <!--<label for="entername">Enter Name</label>
                   <input type="text" class="form-control" name="Name" placeholder="enter name">-->
                  
                   <button type="submit" name="Submit" class="btn btn-primary">PLAN MY TRIP</button>
                  
 
           <!--form end-->
           </div>
         
 
       </div>
 
   </div>
 </body>
</html>
