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

$sql="select c.Email,p.Pid,t.TName,t.Contact_no from c_account c,package p,travel_agency t where c.Email=p.Email and p.Pid=t.Pid";
$result=$conn->query($sql);
   
mysqli_close($conn);
?>
<html>
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
 <style>
table,td,th{
background-color:white;
padding-left:30px;
}
</style>
 <body>
   <div class="container-fluid bg">
       <div class="row">
           <div class="col-md-4 col-sm-4 col-xs-12">
           <table class="table table-striped table-hover">
            <tbody>
                            <tr>
                                <th>EMAIL</th>
                                <th>PACKAGE ID</th>
                                <th>TRAVEL AGENCY NAME</th>
                                <th>CONTACT NO</th>
                            </tr>           
                         <?php
                            $a=[];
                            if($result->num_rows>0)
                                {
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row["Email"]."</td>";
                                        echo "<td>".$row["Pid"]."</td>";
                                        echo "<td>".$row["TName"]."</td>";
                                        echo "<td>".$row["Contact_no"]."</td></tr>";
                                        array_push($a,$row["Email"]);
                                        
                                    }
                                }
                            ?>
            </tbody>
            </table>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-12"></div>
           <div class="col-md-4 col-sm-4 col-xs-12">
           <!-- form start-->
           <form class="form-container" action="travel_main.html" method="POST">
               <h3>MOVE TO MAIN PAGE !!</h3>
               <div class="form-group">
                   <!--<label for="entername">Enter Name</label>
                   <input type="text" class="form-control" name="Name" placeholder="enter name">-->
                   
                  
                   <button type="submit" name="Submit" class="btn btn-primary">BACK</button>
                  
 
           <!--form end-->
           </div>
         
 
       </div>
 
   </div>
 </body>
</html>