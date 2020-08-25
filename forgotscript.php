<?php
if (isset($_POST['mail'])) {
require "dbconf.php";
require "functions.php";
require "randompassword.php";
$mail = $_POST['mail'];
if ((filter_var($mail, FILTER_VALIDATE_EMAIL))) 
{
   try {
    $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
        $sth = $dbh->query("SELECT * from users WHERE email = '".$_POST['mail']."'");
         while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $salt = $row['salt'];
        $nickname = $row['nickname'];
        }

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
} 
   if ($salt) {
echo "A password change link was sent. Check your mail now. Redirecting...";
$mess2 = "Hello, ".$nickname."! Did you forget your password on InnoTestPizza? Please click <a href=\"https://innotestpizza.xyz/forgot.php?mail=".$mail."&key=".$salt."\">this link</a> to reset it. The link is active only for 48 hours!<br><br>If you do not understand what this letter is about, please ignore this message";
$subject = "Reset your password on InnoTestPizza";
require "mailreg.php";
echo "<script language=\"JavaScript\" type=\"text/javascript\">
setTimeout(\"location.href = 'index.php';\",5000);
</script>";
} 

else
{
echo "There is no such registered user.";
}
$dbh = null;
}
else {
    echo "E-mail is incorrect!";
}
}
else
{
echo "No information. Please go to <a href=\"/\">main</a> page";
}
?>