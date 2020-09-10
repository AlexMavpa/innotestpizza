<?php
	function generateSalt()
	{
		$salt = '';
		$saltLength = 8;
		for($i=0; $i<$saltLength; $i++) {
			$salt .= chr(mt_rand(33,126)); 
		}
		return $salt;
	}
	
	
	function showInnoPizza()
	{
	require "dbconf.php";
	$innoPizzaContent = '';
	$dbhnew = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $sthnew = $dbhnew->query("SELECT * from pizzas");
			while($rownew = $sthnew->fetch(PDO::FETCH_ASSOC))
			{
			$innoPizzaContent .= "<div style=\"width:224px;border: 1px dotted grey; margin:10px auto;box-shadow: 0 0 10px rgba(0,0,0,0.5);\"><img width=\"220px\" src=\"".$rownew['imgurl']."\"alt=\"".$rownew['name']."\">
<div style=\"display:inline-block;float: left;padding-left:15px;\"><b><span>".$rownew['name']."</span></b></div>
<div class=\"pricediv\" style=\"display:inline-block;float: right;padding-right:10px;\"><span class=\"price\" style=\"font-weight: bold; font-size: 20px;\">".$rownew['price']."</span><span style=\"font-weight: bold; font-size: 20px;\"> €<span></div>
<div style=\"display:inline-block;float: left;padding-left:10px;line-height: 1;\"><span style=\"font-size: 14px;\">".$rownew['description']."<span></div>
<div style=\"display:block;float: right;padding-right:10px;padding-bottom:10px;\"><span class=\"mavchange\" id=\"pizza".$rownew['id']."\"><img name=\"".$rownew['name']."\" src=\"img/addtocartnew.png\" alt=\"add to cart\"></span></div>
</div>";
			}
			$dbhnew = null;
			return $innoPizzaContent;
	}
	
	
	function showInnoPizzaOffers()
	{
	require "dbconf.php";
	$innoPizzaContent = '';
	$dbhnew = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $sthnew = $dbhnew->query("SELECT * from pizzas ORDER BY price ASC LIMIT 0, 3");
			while($rownew = $sthnew->fetch(PDO::FETCH_ASSOC))
			{
			$innoPizzaContent .= "<div style=\"width:224px;border: 1px dotted grey; margin:10px auto;box-shadow: 0 0 10px rgba(0,0,0,0.5);\"><img width=\"220px\" src=\"".$rownew['imgurl']."\"alt=\"".$rownew['name']."\">
<div style=\"display:inline-block;float: left;padding-left:15px;\"><b><span>".$rownew['name']."</span></b></div>
<div class=\"pricediv\" style=\"display:inline-block;float: right;padding-right:10px;\"><span class=\"price\" style=\"font-weight: bold; font-size: 20px;\">".$rownew['price']."</span><span style=\"font-weight: bold; font-size: 20px;\"> €<span></div>
<div style=\"display:inline-block;float: left;padding-left:10px;line-height: 1;\"><span style=\"font-size: 14px;\">".$rownew['description']."<span></div>
<div style=\"display:block;float: right;padding-right:10px;padding-bottom:10px;\"><span class=\"mavchange\" id=\"pizza".$rownew['id']."\"><img name=\"".$rownew['name']."\" src=\"img/addtocartnew.png\" alt=\"add to cart\"></span></div>
</div>";
			}
			$dbhnew = null;
			return $innoPizzaContent;
	}
	
	
	function array_push_pizza($array, $id, $name, $quantity, $price ){
   array_push($array[0], $id);
   array_push($array[1], $name);
   array_push($array[2], $quantity);
   array_push($array[3], $price);
   return $array;
  
}


function array_push_order($array, $id, $quantity){
   array_push($array[0], $id);
   array_push($array[1], $quantity);
   return $array;
  
}


function successorder($postdata)
{
$success = "Information is complete, thanks! Redirecting...
    <script language=\"JavaScript\" type=\"text/javascript\">function redirectPost(url, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}
setTimeout(\"redirectPost('order.php?result=success', { ".$postdata." });\",3000);
</script>";
   return $success;
  
}


function deliveryUser($totalprice)
{
if ($totalprice > 20) {
$delivery = 0;
}
else
{
$delivery = 3;
}
$totalprice += $delivery;
$phone = $_SESSION['phone'];
 $deliveryuser =  "</div></div>
 <h3>Delivery details:</h3>			
<div class=\"control-group2\"><form action=\"\" method=\"post\" id=\"orderform\"><fieldset>".$innoPizzaForm."<label class=\"control-label2\" for=\"phone\">Phone </label><div class=\"controls2\"><input class=\"input-xlarge2\" required id=\"phone\" name=\"phone\" type=\"tel\" minlength=\"2\" maxlength=\"12\" pattern=\"[0-9+]+\" value=\"".$phone."\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"address\">Address *</label><div class=\"controls2\"><input class=\"input-xlarge2\" required id=\"address\" name=\"address\" type=\"text\" minlength=\"10\" maxlength=\"200\" pattern=\"[A-z0-9+,-/ ]+\" /></div></div>
<span>Delivery: ".$delivery." €</span>
<h3>Total price:</h3><span style=\"font-weight:bold;\">".$totalprice." €</span><hr>
							<button type=\"submit\" name=\"submitorder\" class=\"btn btn-primary\" id=\"orderbtn\">Finish order now!</button>
						<hr><div id=\"checkresults\"></div>
						<hr><p>* Please provide us maximum detailed address</p>
</fieldset>
</form></div>";
   return $deliveryuser;
}


function deliveryGuest($totalprice)
{
if ($totalprice > 20) {
$delivery = 0;
}
else
{
$delivery = 3;
}
$totalprice += $delivery;
 $deliveryguest = "</div></div>
<h3>Delivery details:</h3>
<div class=\"control-group2\"><form action=\"\" method=\"post\" id=\"orderform\"><fieldset>".$innoPizzaForm."<label class=\"control-label2\" for=\"phone\">Phone </label><div class=\"controls2\"><input class=\"input-xlarge2\" required id=\"phone\" name=\"phone\" type=\"tel\" minlength=\"2\" maxlength=\"12\" pattern=\"[0-9+]+\" value=\"\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"firstname\">First Name</label><div class=\"controls2\"><input class=\"input-xlarge2\" required id=\"firstname\" name=\"firstname\" type=\"text\" minlength=\"2\" maxlength=\"100\" pattern=\"[A-z0-9+,-/]+\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"secondname\">Second Name</label><div class=\"controls2\"><input class=\"input-xlarge2\" required id=\"secondname\" name=\"secondname\" type=\"text\" minlength=\"2\" maxlength=\"100\" pattern=\"[A-z0-9+,-/]+\" /></div></div>
<div class=\"control-group2\"><label class=\"control-label2\" for=\"address\">Address *</label><div class=\"controls2\"><input class=\"input-xlarge2\" required id=\"address\" name=\"address\" type=\"text\" minlength=\"10\" maxlength=\"200\" pattern=\"[A-z0-9+,-/ ]+\" /></div></div>
<span>Delivery: ".$delivery." €</span>
<h3>Total price:</h3><span style=\"font-weight:bold;\">".$totalprice." €</span><hr>
							<button type=\"submit\" name=\"submitorder\" class=\"btn btn-primary\" id=\"orderbtn\">Finish order now!</button>
						<hr><div id=\"checkresults\"></div>
						<hr><p>* Please provide us maximum detailed address. Also, as you are not registered customer, we will make a phone call to let us know you are a real person.</p>
</fieldset>
</form></div>";
   return $deliveryguest;
}

function showCart($cartmassive) {

$pizzasum = array();
for ($x=0;$x<count($cartmassive[0]);$x++)
{
echo "<div class=\"numbers-row\">
<label class=\"cartlabel\" for=\"".$cartmassive[0][$x]."\">".$cartmassive[1][$x]."</label>
<div class=\"cartprice\">[".$cartmassive[3][$x]." €]</div><div class=\"incbutton moreless\"><span class=\"notext\" id=\"more".$cartmassive[0][$x]."\">+</span></div><input class=\"cartinput\" type=\"number\" min=\"1\" max=\"99\" name=\"".$cartmassive[0][$x]."\" id=\"".$cartmassive[0][$x]."\" value=\"".$cartmassive[2][$x]."\"><div class=\"decbutton moreless\"><span class=\"notext\" id=\"less".$cartmassive[0][$x]."\">-</span></div><div class=\"remove\"><span class=\"notext\" id=\"remove".$cartmassive[0][$x]."\">x</span></div></div>";
$pizzasum[] = $cartmassive[3][$x] * $cartmassive[2][$x];
}
if (array_sum($pizzasum) > 20)
{
$delivery = 0;
}
else
{
$delivery = 3;
$pizzasum[] = 3;
}
if (array_sum($cartmassive[2]) != "0") {
echo "<div class=\"numbers-row-delivery\"><span class=\"delivery\">Delivery: ".$delivery." € </span></div><div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">".array_sum($pizzasum)."</span></div";
}
else
{
echo "</div><div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">0</span></div";
}
}

?>