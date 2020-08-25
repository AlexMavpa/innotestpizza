<?php
if (!empty($_GET["mail"]) && !empty($_GET["key"]))
{
if (filter_var($_GET["mail"], FILTER_VALIDATE_EMAIL)) {
require "dbconf.php";
require "randompassword.php";
require "functions.php";
try {
    $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
        $sth = $dbh->query("SELECT * from users WHERE (email = '".$_GET['mail']."' AND salt = '".$_GET['key']."')");
         while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $mail = $row['email'];
        $salt = $row['salt'];
        $nickname = $row['nickname'];
        }

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
} 
   if ($salt) {
   $randompass = randomPassword();
   $salt = generateSalt();
   $sth2 = $dbh->query("UPDATE users SET salt='".$salt."', pass='".md5($randompass.$salt)."', cookie='' WHERE email = '".$mail."'");
echo "A new password was sent on your e-mail. You can login with it now. Redirecting...";
$mess2 = "How are you, ".$nickname."? Here is your new password for InnoTestPizza - <b>".$randompass."</b>. You can log in with it now";
$subject = "Your new password on InnoTestPizza";
require "mailreg.php";
echo "<script language=\"JavaScript\" type=\"text/javascript\">
setTimeout(\"location.href = 'index.php';\",5000);
</script>";
} 

else
{
echo "Reset link is broken";
}
$dbh = null;
}
else
{
echo "Reset link is broken";
}
}
else
{
echo "No information. Please go to <a href=\"/\">main</a> page";
}


?>
