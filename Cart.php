<?php
require "db.php";
?>
<?php
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
  foreach($_SESSION["shopping_cart"] as $key => $value) {
    if($_POST["name"] == $key){
    unset($_SESSION["shopping_cart"][$key]);
    $status = "<div class='box' style='color:red;'>
    Product is removed from your cart!</div>";
    }
    if(empty($_SESSION["shopping_cart"]))
    unset($_SESSION["shopping_cart"]);
    }   
  }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['name'] === $_POST["name"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
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
.cta-colored{
  position:absolute;
  top:4px;
  right:50px;
}
</style>
<?php endif; ?>
<html>
  <head>
    <title>Cart</title>
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

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>

<style>
.image {
    width:100px;
    height:100px;
    }

.product_wrapper {
  float:left;

  text-align: center;
  }
.product_wrapper:hover {
  box-shadow: 0 0 0 2px #e5e5e5;
  cursor:pointer;
  }
.product_wrapper .name {
  font-weight:bold;
  }
.product_wrapper .buy {
  text-transform: uppercase;
    background: #F68B1E;
    border: 1px solid #F68B1E;
    cursor: pointer;
    color: #fff;
    padding: 8px 40px;
    margin-top: 10px;
}
.product_wrapper .buy:hover {
  background: #f17e0a;
    border-color: #f17e0a;
}
.message_box .box{
  margin: 10px 0px;
    border: 1px solid #2b772e;
    text-align: center;
    font-weight: bold;
    color: #2b772e;
  }
.table td {
  border-bottom: #F0F0F0 1px solid;
  padding: 10px;
  }
.cart_div {
  float:right;
  font-weight:bold;
  position:relative;
  }
.cart_div a {
  color:#000;
  } 
.cart_div span {
  font-size: 12px;
    line-height: 14px;
    background: #F68B1E;
    padding: 2px;
    border: 2px solid #fff;
    border-radius: 50%;
    position: absolute;
    top: -1px;
    left: 13px;
    color: #fff;
    width: 14px;
    height: 13px;
    text-align: center;
  }
.cart .remove {
    background: none;
    border: none;
    color: #0067ab;
    cursor: pointer;
    padding: 0px;
  }
.cart .remove:hover {
  text-decoration:underline;
  }
</style>


  <style type="">

.card{
	display:inline-flex;
	margin:25px;
}
.img{
    width:150px;
    height:150px;
    border-radius: 20px
}
#Basket{
	position:relative;
	left:1000px;
	bottom:700px;
	width:200px;
}
.btn-danger{
    color:red;
    border-radius:50px;
    outline:none;
    background: none;
    border: none;
    cursor:pointer;

}
.btn-danger:hover{
    background-color: red;
    color:white;
}
.text-right{
	float:left;
	}
	.list-group-item{
		margin-top:7px;
	}

  </style>
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
	      <a class="navbar-brand" href="index.php">RaulsFruits</a>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">Cart</h1>
          </div>
        </div>
      </div>
    </div>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>  

<table class="table">
<tbody>
<tr>
<td></td>
<td>NAME</td>
<td>QUANTITY</td>
<td>PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php   
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["img"]; ?>' width="50" height="50" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='name' value="<?php echo $product["name"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='name' value="<?php echo $product["name"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>    
  <?php
}else{
  echo "<h3>Your cart is empty!</h3>";
  }
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
</div>
</table>






    <footer class="ftco-footer ftco-section">
      <div class="container">
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
	                <li><span class="icon icon-map-marker"></span><span class="text">Abylaikhan sreet , SDU </span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+7 707 777 51 69</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@raulsfruits.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

           
          </div>
        </div>
      </div>
    </footer>
  <script src="js/jquery.min.js"></script>  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>