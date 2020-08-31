<?php
require "start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="img/favicon.ico" type="image/png">
<title><?php if ($login) { echo $login." - ";} ?>Order - Innopizza - stay hungry, stay foolish!</title>

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
<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
<li class="nav-item"><a class="nav-link" href="delivery.php">Delivery</a></li>
<li class="nav-item"><a class="nav-link" href="offers.php">Special offers</a></li>
<li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
<?php 
if ($login) { echo "<li class=\"nav-item\"><a class=\"nav-link2\" href=\"cabinet.php\">".$login."</a></li><li class=\"nav-item\"><a class=\"nav-link\" onclick=\"return confirmpizzalogout()\" href=\"logout.php\"><img width=\"16px\" src=\"img/logoutnew.png\"> LOGOUT</a></li>"; } else { echo  "<li class=\"nav-item\"><a data-toggle=\"modal\" class=\"nav-link\" href=\"#login\"><img width=\"16px\" src=\"img/loginnew.png\"> LOGIN</a></li>";} 
?> 
<li class="nav-item notformobile"><span class="nav-link"><img width="35px" id="mavchangecart" class="mavchangecart" src="img/shoppingcartnew.png"></span></li>
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
<section class="home_banner_area">
<div class="banner_inner">
<div class="container">
<div class="row">
<div class="slider">
    <div class="slider__wrapper">
      <div class="slider__item">
        <a href="menu.php"><div style="height: 350px; background: url('/img/offers/1.jpg') no-repeat;"></div></a>
      </div>
      <div class="slider__item">
        <a href="offers.php"><div style="height: 350px; background: url('/img/offers/2.jpg') no-repeat;"></div></a>
      </div>
      <div class="slider__item">
        <a href="menu.php"><div style="height: 350px; background: url('/img/offers/3.jpg') no-repeat;"></div></a>
      </div>
      <div class="slider__item">
         <a href="delivery.php"><div style="height: 350px; background: url('/img/offers/4.jpg') no-repeat;"></div></a>
      </div>
    </div>
    <a class="slider__control slider__control_left" href="#" role="button"></a>
    <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
  </div>
  </div>
</div>
</div>
</section>
<section class="brand_area section_gap_bottom">
<div class="container">
<div class="row justify-content-left">
<div class="col-lg-6">

<?php
$innoPizzaCart = '';
$innoPizzaForm = '';
   $x = '0';
   $totalprice = "0";
   if ($_GET['result']=="success") {
    $newphone = $_POST['phone'];
    $address = $_POST['address'];
    if ($_SESSION['auth'] == false)  {
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    }
    echo "<h3>Thank you for your order!</h3>
<div class=\"row\">
<div>";
if (($_SESSION['cart']) OR (!empty($_COOKIE['cart']))) {
echo "<br><h3>Your tasty products:</h3>";

if ($_SESSION['cart'])
{
$cartmassive=$_SESSION['cart'];
}

elseif (!empty($_COOKIE['cart']))
{
$cartmassive=unserialize($_COOKIE['cart']);
}
    
    $dbhnew = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $sthnew = $dbhnew->query("SELECT * from pizzas WHERE id IN (".str_replace("pizza", "", implode(',', $cartmassive[0])).")");
    while($rownew = $sthnew->fetch(PDO::FETCH_ASSOC))
			{
			$innoPizzaList .= "<div style=\"display:block;padding-left:0px;\"><p><span style=\"font-weight:bold;\">&bull; ".$rownew['name']."</span><span style=\"font-size: 14px;\"> (".$rownew['description'].") - </span><span class=\"price\" style=\"font-weight: bold;\">".$rownew['price']." €</span><span class=\"quantity\" id=\"pizza".$rownew['id']."\"> [".$cartmassive[2][$x]." pcs.]</span></p></div>";
$totalprice += $rownew['price'] * $cartmassive[2][$x];
$x++;
			}
if ($totalprice > 20) {
$delivery = 0;
}
else
{
$delivery = 3;
}
$totalprice += $delivery;
			$dbhnew = null;
			echo $innoPizzaList;
		echo	"<h3>Delivery:</h3><p><span style=\"font-size: 14px;\">".$delivery." €</span></p><h3>Total price:</h3><p><span style=\"font-weight:bold;\">".$totalprice." €</span></p><p>We will make and deliver your pizza(s) in a hour.</p></div></div></div>";
unset($_SESSION['cart']);
setcookie('cart', '', time());
$datetime = date("Y-m-d H:i:s");
$dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
if ($_SESSION['auth'] == false)  {
    $sth = $dbh->query("INSERT INTO guestorders (datetime,firstname,secondname,pizzaid,quantity,phone,address) VALUES ('".$datetime."','".$firstname."','".$secondname."', '".serialize($cartmassive[0])."', '".serialize($cartmassive[2])."','".$newphone."','".$address."')");
    }
    else
    {
    $sth = $dbh->query("INSERT INTO orders (datetime,userid,pizzaid,quantity,phone,address) VALUES ('".$datetime."','".$_SESSION['id']."', '".serialize($cartmassive[0])."', '".serialize($cartmassive[2])."','".$newphone."','".$address."')");
    $mess2 = "Glad to see you, ".$login."! Thank you for this order. Your pizza will be cooked ASAP (maximum withing an hour). Your order:<br>".strip_tags($innoPizzaList)."<br> Total price is ".$totalprice." €<br><b> Bon appetit!</b>";
$subject = "Your order on InnoTestPizza";
require "mailreg.php";
    }
    $dbh = null;
require "rightsidebar.php";
require "modal.php";
require "footer.php";
exit();
}
else
{
echo "<br><h3>Your order was already submitted!</h3></div></div></div>";
require "rightsidebar.php";
require "modal.php";
require "footer.php";
exit();
}
}

//$totalprice="0";

 if ($_SESSION['auth'] != false)  {

if(isset($_POST['submitcart']) && (($_SESSION['cart']) OR (!empty($_COOKIE['cart']))))
{

require "addfromform.php";
echo deliveryUser($totalprice);
}
elseif (($_SESSION['cart']) OR (!empty($_COOKIE['cart'])))
{
require "addfromstored.php";
echo deliveryUser($totalprice);

}
else
{
echo "<h2>Place order</h2><div class=\"row\">
<h3>Your cart is empty</h3></div></div>";
}
}
		else
{
echo "<div style=\"width:100%;\">Dear Customer, you are logined as \"Guest\", you can make order without registration just now, but we recommend that you register, and than you will not need to enter all information about yourself every new order, and the history of your orders will be stored. In addition, we send exclusive offers to registered users by email.</div>";





if(isset($_POST['submitcart']) && (($_SESSION['cart']) OR (!empty($_COOKIE['cart']))))
{
require "addfromform.php";
echo deliveryGuest($totalprice);
}
elseif (($_SESSION['cart']) OR (!empty($_COOKIE['cart'])))
{
require "addfromstored.php";
echo deliveryGuest($totalprice);

}
else
{
echo "<h2>Place order</h2><div class=\"row\">
<h3>Your cart is empty</h3></div></div>";
}






}	


 
?>

<div class="offset-lg-2 col-lg-4 col-md-6">
<div class="client-info">
<div class="d-flex mb-50">
<span class="lage">1</span>
<span class="smll">Hour fast delivery</span>
<span class="smll2">Or your pizza is free</span>
</div>
<div class="call-now d-flex">
<div>
<span class="fa fa-phone"></span>
</div>
<div class="ml-15">
<p>order by phone</p>
<h3>(+7) 904 346 XX XX</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<?php
require "modal.php";
require "footer.php";
?>