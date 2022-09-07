<?php
include('connect.php');
error_reporting(0);
?>

<html>
<body>
<form action="" method="GET">
enter name:
<input type="text" name="Name" value="">
<br>
enter mobile no:
<input type="number" name="Mobile" value="">
<br>
enter location:
<input type="text" name="Location" value="">
<br>
enter email:

<input type="text" name="Email" value="">
<br>
enter password:
<input type="password" name="Password" value="">
<br>
<input type="submit"name="submit" value="submit">
</form>

<?php
$uname=$_GET['Name'];
$umobile=$_GET['Mobile'];
$ulocation=$_GET['Location'];
$uemail=$_GET['Email'];
$upassword=$_GET['Password'];

echo $uname;
echo $umobile;
echo $ulocation;
echo $uemail;
echo $upassword;

$sql="INSERT INTO c_account VALUES ('$uname','$umobile','$ulocation','$uemail','$upassword')";
$data=mysqli_query($conn,$sql);
if($data)
{
    echo "data inserted";
}

?>
</body>
</html>