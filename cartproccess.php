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
if ($cartmassive[2][$key] < 10) {
    $cartmassive[2][$key]=$cartmassive[2][$key]+$clickQuantity;
    }
    else
    {
    echo "<script>alert( 'You can order no more than 10 of each pizza!' );</script>";
    }
    }
    else {
$cartmassive = array_push_pizza($cartmassive, $clickId, $clickName, $clickQuantity, $clickPrice );
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30); 

showCart($cartmassive); //new

}
else
{
$cartmassive = array(array(), array(), array(), array());
$cartmassive = array_push_pizza($cartmassive, $clickId, $clickName, $clickQuantity, $clickPrice );

showCart($cartmassive); // new

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

showCart($cartmassive); // new

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
for ($i = 0; $i <= 3; $i++) {
    unset($cartmassive[$i][$key]);
    $cartmassive[$i] = array_values($cartmassive[$i]);
}

}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
showCart($cartmassive);
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
if ($cartmassive[2][$key] < 10) {
    $cartmassive[2][$key]++;
    showCart($cartmassive);
    }
    else
    {
    echo "<p>You can order no more than 10 of each pizza!</p>";
    showCart($cartmassive);
    }
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}
elseif ($lessid)
{
if (($key = array_search(str_replace('less', '', $lessid), $cartmassive[0])) !== false) {
    if (($cartmassive[2][$key]) >= 1) {
    $cartmassive[2][$key]--; 
    showCart($cartmassive);
    }
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}

elseif ($changeid)
{
if (($key = array_search(str_replace('change', '', $changeid), $cartmassive[0])) !== false) {
    if (($quantity >= 1) && ($quantity <= 10)) {
    $cartmassive[2][$key]=$quantity;
    showCart($cartmassive);
    }
    else {
    if ($quantity > 10) {
     echo "<p>You can order no more than 10 of each pizza!</p>";
     showCart($cartmassive);
     }
     else {
     showCart($cartmassive);
     }
    }
}
$_SESSION['cart'] = $cartmassive;
setcookie('cart', serialize($cartmassive), time()+60*60*24*30);
}

}

}
?>