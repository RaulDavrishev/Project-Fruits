<?php
require "db.php";
?>
<?php if(isset($_SESSION["logged_user"])) : ?>
<div><a style="color:white;
float:right;
font-family: 'Poppins', Arial, sans-serif;
margin-right:15px;
color:pink;
" id="Exit" href="logout.php">Exit</a></div>
<div style="
float:right;
color:#fff;
margin-right:10px;
margin-left:10px;
font-family: 'Poppins', Arial, sans-serif;" id="User"><?php echo $_SESSION['logged_user']->login; ?></div>
<?php else : ?>
	<span><a id="Login" href="login.php">Log in</a></span>
<span><a id="Mezh">|</a></span>
<span><a id="Sign" href="signup.php">Sign up</a></span>
<style type="text/css">
#Login{
    position:relative;
    float:right;
    font-size:15px;
    text-decoration:none;
    z-index:101;
    color:#FFF;
    font-family: "Poppins", Arial, sans-serif;
    font-weight:100;
    margin-right:15px;
}

#Sign{
    position:relative;
    float:right;
    font-size:15px;
    text-decoration: none;
    z-index:102;
    color:#FFF;
    font-family: "Poppins", Arial, sans-serif;
    font-weight:100;
    margin-left:125px;
}
#Sign:hover{
	color:black;
}
#Login:hover{
	color:black;
}
#Mezh{
    position:relative;
    float:right;
    font-size:15px;
    color:#FFF;
    font-family: "Poppins", Arial, sans-serif;
    font-weight:100;
    z-index:101;
    margin-right:5px;
    margin-left:5px;
}
.cta-colored{
	position:absolute;
	top:4px;
	right:50px;
}
</style>
<?php endif; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+7 707 777 51 69</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">raulsfruits@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  </nav>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">RaulsFruits</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
          </ul>
        </div>
      </div>
    </nav>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Admin</span></p>
            <h1 class="mb-0 bread">Admin Page</h1>
          </div>
        </div>
      </div>
    </div>




<?php 

$db = mysqli_connect("localhost","root","","fruits");

if(isset($_POST['submit'])){

$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['img'];

$query = "Insert into products(name,price,img) Values('$name','$price','$image')";            

$res  = $db -> query($query);

//header("Refresh:0");
}

else if(isset($_GET['id'])){
    $query = "select * from products where id='".$_GET['id']."'";       
    $res  = $db -> query($query);
    $row = $res->fetch_assoc();
    $name=$row['name'];
    $prc=$row['price'];
    $img=$row['img'];
    $id=$row['id'];

}
else if(isset($_POST['Update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['img'];
    $Pid=$_POST['id'];
    $query = "UPDATE  products SET name='$name',price='$price',img='$image' WHERE id=$Pid";            
    $res  = $db -> query($query);
}
else if(isset($_POST['Delete'])){
  
    $Pid=$_POST['id'];
    $query = "DELETE FROM  products  WHERE id=$Pid";            
    
    $res  = $db -> query($query);
}
?>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body >

<section class="ftco-section contact-section bg-light">
<div class="container">
<form action="adminPage.php" method="post" class="bg-white p-5 contact-form">
<div class="form-group">
Name :<input placeholder="Product Name" name="name" type="text" value="<?php echo (isset($name))?$name:'';?>"></div>
<div class="form-group">
Price :<input class="form-control" placeholder="Product Price" name="price" type="text" value="<?php echo (isset($prc))?$prc:'';?>"></div>
<div class="form-group">
Image :<input class="form-control" placeholder="Product Image Location" name="img" type="text" value="<?php echo (isset($img))?$img:'';?>"></div>
<div style="margin:10px;display: inline-block;" ><input  name="id" style="display:none;" type="text" value="<?php echo (isset($id))?$id:'';?>"></div>

<div class="form-group">
<input  name="submit"  class="btn btn-primary py-2 px-5" type="submit" value="Insert"/>
<input  name="Update"  class="btn btn-primary py-2 px-5" type="submit" value="Update"/>
<input  name="Delete"  class="btn btn-primary py-2 px-5" type="submit" value="Delete"/>
</div>
</form>
</section>

<?php
$query = "select * from products";            
$res  = $db -> query($query);
?>


        <table class="w3-table-all w3-small">
            <tr style='background-color: 82AE46; color: white'>
                <td>ID</td>
                <td>Name</td>
                <td>Price</td>
                <td>Image Location</td>
                <td>Update / Delete</td>
            </tr>
<?php
               while ($row = $res->fetch_assoc()) {
                   echo "<tr class='w3-hover-green' style='cursor:pointer;'>";
                   echo "<td>".$row['id']."</td>";
                   echo "<td>".$row['name']."</td>";
                   echo "<td>".$row['price']."</td>";
                   echo "<td>".$row['img']."</td>";
                   echo "<td><a href='adminPage.php?id=".$row['id']."'>Select</a></td>";
                   echo "</tr>";
               }

?>
        </table>
</body>
</html>





    <footer class="ftco-footer ftco-section">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">RaulsFruits</h2>
              <p>Far far away, behind the word mountains, far from the countries Almaty and Kaskelen.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Abylaikhan sreet , SDU </span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+7 707 777 51 69</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@raulsfruits.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <script src="js/jquery.min.js"></script>  
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>