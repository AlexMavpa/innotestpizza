<?php
require "functions.php";
session_start();
if ($_POST['msg'] == '1') {
$clickId = $_POST['clickId'];
$clickName = $_POST['clickName'];
$clickQuantity = $_POST['clickQuantity'];
$clickPrice = $_POST['clickPrice'];
if (($_SESSION['cart']) OR (!empty($_COOKIE['cart'])))
{

if (!empty($_COOKIE['cart']))
{
$cartmassive=unserialize($_COOKIE['cart']);
}

elseif ($_SESSION['cart'])
{
$cartmassive=$_SESSION['cart'];
}

if (($key = array_search($clickId, $cartmassive[0])) !== false) {
    $cartmassive[2][$key]=$cartmassive[2][$key]+$clickQuantity;}
    else {
$cartmassive = array_push_pizza($cartmassive, $clickId, $clickName, $clickQuantity, $clickPrice );
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30); 
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
echo "<div class=\"numbers-row-delivery\"><span class=\"delivery\">Delivery: ".$delivery." € </span></div><div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">".array_sum($pizzasum)."</span></div";

}
else
{
$cartmassive = array(array(), array(), array(), array());
$cartmassive = array_push_pizza($cartmassive, $clickId, $clickName, $clickQuantity, $clickPrice );
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
echo "<div class=\"numbers-row-delivery\"><span class=\"delivery\">Delivery: ".$delivery." € </span></div><div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">".array_sum($pizzasum)."</span></div";
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}
}
elseif ($_POST['msg'] == '0') 
{
if (($_SESSION['cart']) OR (!empty($_COOKIE['cart'])))
{

if (!empty($_COOKIE['cart']))
{
$cartmassive=unserialize($_COOKIE['cart']);
}

elseif ($_SESSION['cart'])
{
$cartmassive=$_SESSION['cart'];
}

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
echo "<div class=\"numbers-row-delivery\"><span class=\"delivery\">Delivery: ".$delivery." € </span></div><div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">".array_sum($pizzasum)."</span></div";

}
else
{
echo "<div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">0</span></div";
}
}

elseif ($_POST['msg'] == '2') { 
setcookie('cart', '', time());
unset($_SESSION['cart']);
echo "<div class=\"numbers-row-total\"><span class=\"total\">TOTAL: € </span><span id=\"totalsum\" class=\"totalsum\">0</div"; 
}

elseif ($_POST['msg'] == '3') { 
$deleteid = $_POST['deleteid'];

if (($_SESSION['cart']) OR (!empty($_COOKIE['cart'])))
{

if (!empty($_COOKIE['cart']))
{
$cartmassive=unserialize($_COOKIE['cart']);
}

elseif ($_SESSION['cart'])
{
$cartmassive=$_SESSION['cart'];
}
if (($key = array_search(str_replace('remove', '', $deleteid), $cartmassive[0])) !== false) {
    unset($cartmassive[0][$key]);
    unset($cartmassive[1][$key]);
    unset($cartmassive[2][$key]);
    unset($cartmassive[3][$key]);
    $cartmassive[0] = array_values($cartmassive[0]);
    $cartmassive[1] = array_values($cartmassive[1]);
    $cartmassive[2] = array_values($cartmassive[2]);
    $cartmassive[3] = array_values($cartmassive[3]);
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}

if (array_sum($cartmassive[2]) =="0") {
setcookie('cart', '', time());
unset($_SESSION['cart']);
}
}

elseif ($_POST['msg'] == '4') { 
$moreid = $_POST['moreid'];
$lessid = $_POST['lessid'];
$changeid = $_POST['changeid'];
$quantity = $_POST['quantity'];

if (($_SESSION['cart']) OR (!empty($_COOKIE['cart'])))
{

if (!empty($_COOKIE['cart']))
{
$cartmassive=unserialize($_COOKIE['cart']);
}

elseif ($_SESSION['cart'])
{
$cartmassive=$_SESSION['cart'];
}
if ($moreid)
{
if (($key = array_search(str_replace('more', '', $moreid), $cartmassive[0])) !== false) {
    $cartmassive[2][$key]++;
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}
elseif ($lessid)
{
if (($key = array_search(str_replace('less', '', $lessid), $cartmassive[0])) !== false) {
    if (($cartmassive[2][$key]) >= 1) {$cartmassive[2][$key]--;}
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}

elseif ($changeid)
{
if (($key = array_search(str_replace('change', '', $changeid), $cartmassive[0])) !== false) {
    if (($quantity) >= 1) {$cartmassive[2][$key]=$quantity;}
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}

}

}
?>