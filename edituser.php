<?php
require "dbconf.php";
require "functions.php";
if (isset($_POST['changepass'])) {
session_start();

$dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
$sth = $dbh->query("SELECT * from users WHERE email != '".$_SESSION['mail']."'");
while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $nicknames[] = $row['nickname'];
        if(!empty($row['phone'])) $phones[] = $row['phone'];
        }
$dbh = null;
if  ((!preg_match('/^[A-z0-9 ]+$/i', $_POST['nickname'])) OR ( strlen($_POST['nickname']) > 16) OR ( strlen($_POST['nickname']) < 3))
{
echo "Changes not saved! Nickname must have from 3 to 16 characters; only latin letters, digits and spaces are allowed!<br>";
}
elseif (in_array($_POST['nickname'], $nicknames))
{
echo "Changes not saved! Nickname is already token by someone else!<br>";
}

elseif ((!preg_match('/^[A-z0-9 ]*$/i', $_POST['firstname'])) OR ( strlen($_POST['firstname']) > 100))
{ 
echo "Changes not saved! First name must have not more than 100 characters; only latin letters, digits and spaces are allowed!<br>";
}

elseif ((!preg_match('/^[A-z0-9 ]*$/i', $_POST['secondname'])) OR ( strlen($_POST['secondname']) > 100))
{ 
echo "Changes not saved! Second name must have not more than 100 characters; only latin letters, digits and spaces are allowed!<br>";
}

elseif ((!preg_match('/^[0-9+]*$/i', $_POST['phone'])) OR ( strlen($_POST['phone']) > 12))
{ 
echo "Changes not saved! Phone must have from 3 to 12 characters; only digits and '+' are allowed!<br>";
}

elseif (in_array($_POST['phone'], $phones))
{
echo "Changes not saved! Phone is already token by someone else!<br>";
}

elseif ((!empty($_POST['changepass'])) && ((!preg_match('/^[A-z0-9]*$/i', $_POST['changepass'])) OR ( strlen($_POST['changepass']) > 16) OR ( strlen($_POST['changepass']) < 8)))
{ 
echo "Changes not saved! New password must have from 8 to 16 characters; only latin letters and digits are allowed!<br><br>";
}

elseif ($_POST['changepass'] != $_POST['retypepass'])
{ 
echo "Passwords do not match! Please, retype them correctly<br>";
}

else
{
echo "Changes were saved!";
$salt = generateSalt();
if (!empty($_POST['changepass'])) 
{ 
$passupdate=", pass='".md5($_POST['changepass'].$salt)."', salt='".$salt."' ";
$mess2="Your password was changed. Now it is - <b>".$_POST['changepass']."</b>. You can login and <a href=\"https://innotestpizza.xyz\">make an order</a> just now!";
$subject="Your new password on InnoTestPizza";
$mail = $_GET["mail"];
require('mailreg.php');
}
$dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
$sth = $dbh->query("UPDATE users SET nickname='".$_POST['nickname']."', firstname='".$_POST['firstname']."', secondname='".$_POST['secondname']."', phone='".$_POST['phone']."'".$passupdate." WHERE email = '".$_SESSION['mail']."'");
$dbh = null;
$_SESSION['login'] = $_POST['nickname'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['secondname'] = $_POST['secondname'];
setcookie('login', $_POST['nickname'], time()+60*60*24*30);
setcookie('firstname', $_POST['firstname'], time()+60*60*24*30);
setcookie('secondname', $_POST['secondname'], time()+60*60*24*30); 
setcookie('phone', $_POST['phone'], time()+60*60*24*30);
}

}

else
{
echo "No information. Please go to <a href=\"/\">main</a> page";
}

?>