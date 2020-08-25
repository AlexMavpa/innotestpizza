<?php
require "functions.php";
if (isset($_POST['phone'])) {
$phone = $_POST['phone'];
$address = $_POST['address'];
    session_start(); 
if ($_SESSION['auth'] == false)
{
 $firstname = $_POST['firstname'];
 $secondname = $_POST['secondname'];
 $postdata = "phone: '".$phone."', address: '".$address."', firstname: '".$firstname."', secondname: '".$secondname."'";
 if ((preg_match('/^[0-9+]+$/', $phone)) && (preg_match('/^[A-z0-9+,-\/ ]+$/i', $address)) && (preg_match('/^[A-z0-9+,-\/]+$/i', $firstname)) && (preg_match('/^[A-z0-9+,-\/]+$/i', $secondname)) && ( strlen($phone) <= 12) && ( strlen($phone) >= 2) && ( strlen($address) >= 10) && ( strlen($address) <= 200) && ( strlen($firstname) >= 2) && ( strlen($firstname) <= 100) && ( strlen($secondname) >= 2) && ( strlen($secondname) <= 100)) 
 {
    setcookie('cart', '', time());
    echo successorder($postdata);
 }
 else
{
echo "Phone / address / first or second name are not correct! Phone must have from 2 to 12 characters, address - from 10 to 200 characters, first (and second) name - from 2 to 100 characters";
}
 }
 else
 {
 $postdata = "phone: '".$phone."', address: '".$address."'";
 if ((preg_match('/^[0-9+]+$/', $phone)) && (preg_match('/^[A-z0-9+,-\/ ]+$/i', $address)) && ( strlen($phone) <= 12) && ( strlen($phone) >= 2) && ( strlen($address) >= 10) && ( strlen($address) <= 200)) 
 {
    setcookie('cart', '', time());
    echo successorder($postdata);
 }
 else
{
echo "Phone or address are not correct! Phone must have from 2 to 12 characters, address - from 10 to 200 characters";
}
}

}

else
{
echo "No information. Please go to <a href=\"/\">main</a> page";
}
?>