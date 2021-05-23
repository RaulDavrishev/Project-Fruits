<?php
require "db.php";

error_reporting(0);
?>
<?php
$db = mysqli_connect("localhost","root","","fruits");
if (isset($_POST['name']) && $_POST['name']!=""){
$name = $_POST['name'];
$result = mysqli_query($db,"SELECT * FROM `products` where `name`='$name'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price = $row['price'];
$image = $row['img'];

$cartArray = array(
  $name=>array(
  'name'=>$name,
  'price'=>$price,
  'quantity'=>1,
  'img'=>$image));
}

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($name,$array_keys)) {
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	}

	}

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
</style>
<?php endif; ?>

<body>
<!DOCTYPE html>
<html>
  <head>
	
<div id="p_prldr"><div class="contpre"><span class="svg_anm" ></span></div></div>
    <title>Raul's fruits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet"> 
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
						    <span class="text">Raulsfruits.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Raul's Fruits</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

<?php
if(empty($_SESSION["shopping_cart"])){
  $cart_count=0;
}
else(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]))}
?>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="dishes.html" class="nav-link">Dishes</a></li>
            <li class="nav-item"><a href="checkout.html" class="nav-link">Checkout</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"><?php echo $cart_count; ?></span></a></li>
	         

	        </ul>
	      </div>
	    </div>
	  </nav>
    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic fruits</h2>
	              <p><a href="#" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Sweet Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic fruits</h2>
	              <p><a href="#" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
									<div class="text text-center">
										<h2>Fruits</h2>
										<p>Protect the health of every home</p>
										<p><a href="#" class="btn btn-primary">Shop now</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Fruits</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Fresh</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-3.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Juices</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Dried</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Almaty and Kaskelen</p>
          </div>
        </div>   		
    	</div>
    


<?php

$result = mysqli_query($db,"SELECT * FROM `products`");
    echo "<div class='container'><div class='row'>";  
while($row = mysqli_fetch_assoc($result)) { 
              echo "<div class='col-md-6 col-lg-3 ftco-animate'>
                    <form method='post' action=''>
                    <input type='hidden' name='name' value=".$row['name']." />
                    <div class='product'>
                    <a class='img-prod'><img class='img-fluid' src='".$row['img']."'/>
                    <div class='overlay'></div></a>
                    <div class='text py-3 pb-4 px-3 text-center'>
                    <h3><a>".$row['name']."</a></h3>
                    <div class='d-flex'><div class='pricing'>
                    <p class='price'><span>$".$row['price']."</span></p></div></div> 
                    <div class='bottom-area d-flex px-3'><div class='m-auto d-flex'>
                    <button class='btn btn-primary' type='submit'>+</button></div></div></div></form></div></div>";
}    
              echo "</div></div>";
?>



    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>Far far away, behind the word mountains, far from the countries Almaty and Kaskelen, there live the blind texts. Separated they live in</p>
          </div>
        </div>

    <hr>

		<section class="ftco-section ftco-partner">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    		</div>
    	</div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <link rel="stylesheet" href="css/animate.css"><link rel="stylesheet" href="css/owl.carousel.min.css"><link rel="stylesheet" href="css/owl.theme.default.min.css"><link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/ionicons.min.css"><link rel="stylesheet" href="css/flaticon.css"><link rel="stylesheet" href="css/icomoon.css"><link rel="stylesheet" href="css/style.css"><script src="js/jquery.min.js"></script><script src="js/jquery-migrate-3.0.1.min.js"></script><script src="js/jquery.easing.1.3.js"></script><script src="js/jquery.waypoints.min.js"></script><script src="js/jquery.stellar.min.js"></script><script src="js/owl.carousel.min.js"></script><script src="js/jquery.magnific-popup.min.js"></script><script src="js/aos.js"></script><script src="js/scrollax.min.js"></script>
        <script src="js/main.js"></script>
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
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
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
	                <li><span class="icon icon-map-marker"></span><span class="text">Abylaykhan street 21, Kaskelen, SDU</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+7 707 777 51 69</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@raulsfruits.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <footer>
        <p>Raul<p>
        <p>Contact information: <a href="#">
        raulsfruits@info.com</a></p>
      </div>
    </footer>


  </body>
</html>