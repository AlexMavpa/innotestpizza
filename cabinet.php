<?php
require "start.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="img/favicon.ico" type="image/png">
<title><?php echo $login; ?> - Innopizza - stay hungry, stay foolish!</title>

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
<li id="cartlink" class="nav-item notformobile"><div style="width:35px;height:37px;background-image: url(img/shoppingcartnew2.png);background-repeat: no-repeat;background-position:center;" id="mavchangecart" class="mavchangecart"><?php echo "<div class=\"cartcircle\" style=\"padding:0px 0px;\"><span id=\"cartnumber\" style=\"font-size:12px;font-weight:bold;\">".$count."</span></div>"; ?></div></li>
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
<div class="row justify-content-center">
<div class="col-lg-6">
<h2>Personal Area</h2>

<?php
 if ($_SESSION['auth'] != false) 
{ echo "<div class=\"row2\"><form class=\"form-horizontal\" action=\"\" method=\"post\" id=\"userinfo\"/>
<fieldset><div class=\"control-group2\"><label class=\"control-label2\" for=\"nickname\">Nickname </label><div class=\"controls2\"><input class=\"input-xlarge2\" id=\"nickname\" name=\"nickname\" type=\"text\" maxlength=\"16\" minlength=\"3\" pattern=\"[A-Za-z0-9]+\" required value=\"".$login."\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"firstname\">First Name </label><div class=\"controls2\"><input class=\"input-xlarge2\" id=\"firstname\" name=\"firstname\" type=\"text\" maxlength=\"100\" pattern=\"[A-Za-z]+\" value=\"".$firstname."\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"secondname\">Second Name </label><div class=\"controls2\"><input class=\"input-xlarge2\" id=\"secondname\" name=\"secondname\" type=\"text\" maxlength=\"100\" pattern=\"[A-Za-z]+\" value=\"".$secondname."\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"email\">E-mail </label><div class=\"controls2\">".$mail." *</div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"phone\">Phone </label><div class=\"controls2\"><input class=\"input-xlarge2\" id=\"phone\" name=\"phone\" type=\"tel\" minlength=\"2\" maxlength=\"12\" pattern=\"[0-9+]+\" value=\"".$phone."\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"changepass\">Change Password </label><div class=\"controls2\"><input class=\"input-xlarge2\" id=\"changepass\" name=\"changepass\" type=\"password\" maxlength=\"16\" minlenght=\"8\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"retypepass\">Retype Password </label><div class=\"controls2\"><input class=\"input-xlarge2\" id=\"retypepass\" name=\"retypepass\" type=\"password\" maxlength=\"16\" minlenght=\"8\" /></div></div>
<div class=\"form-actions\">
							<button type=\"submit\" class=\"btn btn-primary\" id=\"changebtn\">Save changes</button>
						</div>
						<div id=\"editresults\"></div>
						<hr><p>* You can't change your mail here due to security reasons. But if you want change it, feel free to contact us</p>
</fieldset>
</form>
</div>
<h2>Orders</h2>
<div class=\"row2\">
</div>";
$innoOrderList = "";
$dbhnew = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $pizzamassive = array(array(), array(), array(), array());
    $sth = $dbhnew ->query("SELECT * from pizzas");
    while($rownew = $sth->fetch(PDO::FETCH_ASSOC))
			{
			$pizzamassive = array_push_pizza($pizzamassive, $rownew['id'],$rownew['name'],$rownew['description'],$rownew['price']);
			}
    $sth = $dbhnew ->query("SELECT * from orders WHERE userid = '".$_SESSION['id']."'");
 while($row = $sth->fetch(PDO::FETCH_ASSOC))
			{
			$innoOrderList .= "<div style=\"border-radius: 15px;background:#c3e790;margin-bottom:20px;\"><p class=\"hamster\"><span style=\"font-weight:bold;\">&bull;</span> Order at ".$row['datetime']."</p>";

foreach (unserialize($row['pizzaid']) as $index => $value) {
    $innoOrderList .= "<span style=\"font-weight:bold;\">- ".$pizzamassive[1][str_replace('pizza','',$value) -1]."</span> (".$pizzamassive[2][str_replace('pizza','',$value)].") - ".unserialize($row['quantity'])[$index]." pcs<br>";
  }
  $innoOrderList .= "</div>";
			}
			if ($index !== NULL) 
			{ 
			echo $innoOrderList;
			}
			else {
      echo "There are no orders yet";
			}
}
else
{
echo "<div style=\"width:100%;\">User is not logged in!</div>";
} 
?>
</div>
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