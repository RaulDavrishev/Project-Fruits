<?php
require "db.php";
$data = $_POST;
if(isset($data["do_signup"])){

	$errors = array();
	if(trim($data["login"]) == ""){
		$errors[] = "Enter login!";
	}
	if($data["password"] == ""){
		$errors[] = "Enter password!";
	}
	if($data["password2"] !== $data["password"]){
		$errors[] = "Again password incorrect!";
	}
    if(R::count('users','login = ?',array($data['login']))>0){
		$errors[] = "This Login already exists!";
	}

	if(empty($errors)){
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        $_SESSION["logged_user"] = $user;
	    header ('Location: index.php');
            exit();
	}
	else{
		echo '<div class="alert alert-danger" role="alert">'.array_shift($errors).'</div>';
	}
}
?>
<style type="text/css">
	.form{
         margin-left:500px;
         margin-top:70px;
         margin-bottom:150px;
         font-family: "Poppins", Arial, sans-serif;
         width:280px;
         height:200px;
         border-radius:10px;
	}
	.signup_btn{
		font-size:15px;
		position:relative;
		border-radius:10px;
		width:200px;
	}
	.signup_btn:hover{
	    background-color:#1DB954;
	    color:#FFF;		
	}
	.Signup{
		position:relative;
		top:20px;
		left:40px;
		margin-right:50px;
	}

</style>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

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
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Raul's Fruits</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="dishes.html" class="nav-link">Dishes</a></li>
            <li class="nav-item"><a href="checkout.html" class="nav-link">Checkout</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span></a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Sign up</span></p>
            <h1 class="mb-0 bread">Sign up page</h1>
          </div>
        </div>
      </div>
    </div>
<form class="form" action="signup.php" method="POST">
	<div class="Signup">
	<p>
		<p><strong>Your login:</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>Enter password:</strong></p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>

	<p>
		<p><strong>Enter password again:</strong></p>
		<input type="password" name="password2">
	</p>
    
    <p>
    	<button class="signup_btn" type="submit" name="do_signup">Sign up</button>
    </p>
</div>
</form>

<footer class="ftco-footer ftco-section">
      <div class="container">
      	</div>
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
                <li><a href="about.html" class="py-2 d-block">About</a></li>
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
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  
     </body>
</html>