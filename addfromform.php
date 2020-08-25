<?php
echo "<h2>Place order</h2>
<h3>Your tasty products:</h3>
<div class=\"row\">
<div style=\"display:flex;flex-wrap: wrap;\">";
$ordermassive = array(array(), array());
    foreach($_POST as $key => $value){
if ($key != 'submitcart') {
$ordermassive = array_push_order($ordermassive, str_replace("pizza", "", $key), $_POST[$key]);
}
    }

	$dbhnew = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $sthnew = $dbhnew->query("SELECT * from pizzas WHERE id IN (".implode(',', $ordermassive[0]).")");

			while($rownew = $sthnew->fetch(PDO::FETCH_ASSOC))
			{
			$innoPizzaCart .= "<div style=\"width:224px;border: 1px dotted grey; margin:10px auto;box-shadow: 0 0 10px rgba(0,0,0,0.5);\"><img width=\"220px\" src=\"".$rownew['imgurl']."\"alt=\"".$rownew['name']."\">
<div style=\"display:inline-block;float: left;padding-left:15px;\"><b><span>".$rownew['name']."</span></b></div>
<div class=\"pricediv\" style=\"display:inline-block;float: right;padding-right:10px;\"><span class=\"price\" style=\"font-weight: bold; font-size: 20px;\">".$rownew['price']."</span><span style=\"font-weight: bold; font-size: 20px;\"> €<span></div>
<div style=\"display:inline-block;float: left;padding-left:10px;line-height: 1;\"><span style=\"font-size: 14px;\">".$rownew['description']."<span></div>
<div style=\"display:block;float: right;padding-right:10px;padding-bottom:10px;\"><span class=\"quantity\" id=\"pizza".$rownew['id']."\">".$ordermassive[1][$x]." pcs.</span></div></div>";

$innoPizzaForm .= "<input id=\"pizza".$rownew['id']."\" name=\"pizza".$rownew['id']."\" type=\"hidden\" value=\"".$ordermassive[1][$x]."\">";
$totalprice += $rownew['price'] * $ordermassive[1][$x];
$x++;
			}
			
			echo $innoPizzaCart;
?>