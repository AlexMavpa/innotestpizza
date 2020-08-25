<?php
if (!empty($_GET["mail"]) && !empty($_GET["key"]))
{
if (filter_var($_GET["mail"], FILTER_VALIDATE_EMAIL)) {
require "dbconf.php";
$dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
$sth = $dbh->query("SELECT COUNT(*) as total, status from users WHERE email = '".$_GET["mail"]."' AND pass = '".$_GET["key"]."'");
$row = $sth->fetch(PDO::FETCH_ASSOC);
if ($row['total']==1)
{
if ($row['status'] != 1) {
$sth = $dbh->query("UPDATE users SET status='1' WHERE email = '".$_GET["mail"]."'");
echo "<br>Thank you! Your account is activated now! Mmm...you can make your first order just now! Redirecting...";
echo "<script language=\"JavaScript\" type=\"text/javascript\">
setTimeout(\"location.href = 'index.php';\",5000);
</script>";
$mess2="Thank you! Your account is activated now! Mmm...you can login and <a href=\"https://innotestpizza.xyz\">make your first order</a> just now!";
$subject="Your account on InnoTestPizza is activated";
$mail = $_GET["mail"];
require('mailreg.php');
}
else
{
echo "<br>This account is already activated!";
}
}
else

{
echo "Activation link is broken!";
die();
}
$dbh = null;
}
else
{
echo "Activation link is broken";
die(); 
}
}
else
{
echo "Links got damaged...links got broken... =(";
die();
}


?>
