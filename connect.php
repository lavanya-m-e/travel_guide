<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="testdb";
$conn=mysqli_connect($servername,$username,$password,$testdb);
if($conn)
{
    //echo "connection ok";
}
else {
    echo "connection failed";
}
