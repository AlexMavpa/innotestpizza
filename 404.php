<?php
require "start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="img/favicon.ico" type="image/png">
<title>404 NOT FOUND - Innopizza - stay hungry, stay foolish!</title>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header_area">
<div class="main_menu">
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">

<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
<ul class="nav navbar-nav menu_nav justify-content-end">
<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
<li class="nav-item"><a class="nav-link" href="delivery.php">Delivery</a></li>
<li class="nav-item"><a class="nav-link" href="offers.php">Special offers</a></li>
<li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
<?php 
if ($login) { echo "<li class=\"nav-item\"><a class=\"nav-link2\" href=\"cabinet.php\">".$login."</a></li><li class=\"nav-item\"><a class=\"nav-link\" onclick=\"return confirmpizzalogout()\" href=\"logout.php\"><img width=\"16px\" src=\"img/logoutnew.png\"> LOGOUT</a></li>"; } else { echo  "<li class=\"nav-item\"><a data-toggle=\"modal\" class=\"nav-link\" href=\"#login\"><img width=\"16px\" src=\"img/loginnew.png\"> LOGIN</a></li>";} 
?> 
<li id="cartlink" class="nav-item notformobile"><span class="nav-link"><img width="35px" id="mavchangecart" class="mavchangecart" src="img/shoppingcartnew.png"></span></li>
<li class="showcart notformobile" id="showcart"><div style="display:block;height:30px;"><div style="display:inline-block;float:left;"><b>YOUR CART</b></div><div id="closecart" style="display:inline-block;float:right;">CLOSE <b>X</b></div></div><hr>
<form class="form-horizontal" action="/order.php" method="post" id="cartproccess"/>
<fieldset>
<div id="cartcontents">
</div></fieldset><hr>
<button type="submit" disabled class="btn btn-primary cartbtn" style="display:inline-block;float:left;background:grey;" id="cartbtn" name="submitcart" >Place order</button>
<button class="btn btn-primary" style="display:inline-block;float:right;" id="clearcart">Clear cart</button></form></li>
</ul>
</div>

</div>
</nav>
</div>
</header>




<?php
require "modal.php";
?>
		
		
<div style="width:100%;padding: 120px 0 0 0;text-align: center;"><h3>LINKS GOT DAMAGED, LINKS GOT BROKEN =(</h3></div>
<p style="text-align: center;">This is awesome! There is nothing! But you can go to <a href="/">main page</a> and find some pizza there</p>
<p style="text-align: center;"><img width="30%" src="/img/errorpizza.png"></p>
<?php
require "footer.php";
?>