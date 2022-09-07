<?php
    session_start();
    require 'connec.php';
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }
    $user_id=$_SESSION['id'];
    $user_products_query="select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['price']; 
       }
    }

?>
<html>
    <head>
<link  href="index.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table,td,th{
background-color:white;
padding-left:30px;
}
body{
background:url(img/cart.jpg) no-repeat center;
background-size:cover;
padding-bottom:40px;
}
</style>
    </head>
    <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a href="index.php" class="logo"> Lifestyle Store</a>
</div>
                     <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">  
       <li><a href="settings.php" class="header-link"><span class="glyphicon glyphicon-cog"></span> Settings </a></li>
<li><a href="logout.php" class="header-link"><span class="glyphicon glyphicon-log-out"></span> Log out </a></li>
            
            </ul>
        </div>
        </div>
    </nav>
        <div class="row decor_bg">
                <div class="col-md-5 col-md-offset-1">
                    <table class="table table-striped table-hover">
 <tbody>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>price</th>
                                <th></th>
                            </tr>               
                     <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                         ?>
 <tr>
                            <th><?php echo $counter ?></th><th><?php echo $row['name']?></th><th><?php echo $row['price']?></th>
                            <th><a href='cartremove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                            <tr>
   <th></th><th>Total</th><th>Rs <?php echo $sum;?>/-</th><th><a href="success.php?id=<?php echo $user_id?>" class="btn btn-primary">Confirm Order</a></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<footer class="foot">
                <center>
                    <p>Copyright@Lifestyle Store. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
                </center>
        </footer>
</body>
</html>
