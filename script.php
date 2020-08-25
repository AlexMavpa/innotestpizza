<?php
if (isset($_POST['mail'])) {
require "functions.php";
$mail = $_POST['mail'];
$password = $_POST['userpassword'];
session_start(); 
if ($_SESSION['auth'] == false) {
if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    require "dbconf.php";
    $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $sth = $dbh->query("SELECT COUNT(*) as total, id, status, salt, pass, nickname, phone, firstname, secondname from users WHERE email = '".$mail."'");
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    
    if ($row['total']==1)
{


if (md5($password.$row['salt']) == $row['pass']){

if ($row['status'] != 0) {
echo "Welcome! Redirecting...";
$_SESSION['auth'] = true;
$_SESSION['mail'] = $mail;
$_SESSION['login'] = $row['nickname'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['secondname'] = $row['secondname'];
$_SESSION['id'] = $row['id'];
$key = generateSalt(); 
setcookie('mail', $mail, time()+60*60*24*30); 
setcookie('key', $key, time()+60*60*24*30); 
setcookie('login', $row['nickname'], time()+60*60*24*30);
setcookie('firstname', $row['firstname'], time()+60*60*24*30);
setcookie('secondname', $row['secondname'], time()+60*60*24*30); 
setcookie('phone', $row['phone'], time()+60*60*24*30); 

$sth2 = $dbh->query("UPDATE users SET cookie='".$key."' WHERE email = '".$mail."'");

echo "<script language=\"JavaScript\" type=\"text/javascript\">
setTimeout(\"location.href = 'index.php';\",3000);
</script>";

}

else
{
echo "This account is not activated. Check your mail (including spam folder)!";
}


}
else
{
echo "<br>Password is wrong";
}

}
   else
   {
   echo "Ivalid login information, try again";
   } 
   $dbh = null;
}
else {
    echo "Email format is incorrect!";
}
}
else
{
echo "<br>Already logged in!";
echo "window.location = 'index.php';";
echo "<script language=\"JavaScript\" type=\"text/javascript\">
setTimeout(\"location.href = 'index.php';\",3000);
</script>";

}
}
else
{
echo "No information. Please go to <a href=\"/\">main</a> page";
}
?>