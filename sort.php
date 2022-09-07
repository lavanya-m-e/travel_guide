<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$a=[];
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
die("connection failed:".$conn->connect_error);
//$email=$_POST['Email'];
$sql="select p.Email,p.Pid,t.TName,t.Contact_no from package p,travel_agency t where p.Pid=t.Pid";
$result=$conn->query($sql);
echo "<br>";
echo "<table border ='2'>";
echo "<tr>";
echo "<th>Email</th><th>PID</th><th>NAME</th><th>CONTACT</th></tr>";
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["Email"]."</td>";
        echo "<td>".$row["Pid"]."</td>";
        echo "<td>".$row["TName"]."</td>";
        echo "<td>".$row["Contact_no"]."</td></tr>";
        array_push($a,$row["Pid"]);
    }
}
?>