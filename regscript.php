<?php
if (isset($_POST['mail'])) {
require "dbconf.php";
require "functions.php";
require "randompassword.php";
$mail = $_POST['mail'];
$nickname = $_POST['nick'];
if ((filter_var($mail, FILTER_VALIDATE_EMAIL)) && (preg_match('/^[A-z0-9 ]+$/i', $nickname)) && ( strlen($nickname) <= 16) && ( strlen($nickname) >= 3)) {
   try {
    $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
        $sth = $dbh->query('SELECT * from users');
         while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $nicknames[] = $row['nickname'];
        $mails[] = $row['email'];
        }

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
} 
   if (in_array($mail, $mails)) {
    echo "User with this e-mail already exists! Try another e-mail.";
} 
elseif (in_array($nickname, $nicknames)) {
    echo "User with this login already exists! Try another login.";
} 
else
{
$randompass = randomPassword();
$salt = generateSalt();
$sth2 = $dbh->query("INSERT INTO users (nickname,email,status,pass,salt) VALUES ('$nickname','$mail',0, '".md5($randompass.$salt)."','$salt')");
echo "You are successfully registered! Please, activate your account to make your first order. Check your mail! Redirecting...";
$dbh = null;
$mess2 = "Thank you for your registration, ".$nickname."! Your password is <b>".$randompass."</b>, but you should activate your account before start ordering pizza. Please click <a href=\"https://innotestpizza.xyz/activate.php?mail=".$mail."&key=".md5($randompass.$salt)."\">this link</a> to activate. The link is active only for 48 hours!<br><br>If you do not understand what this letter is about, please ignore this message";
$subject = "Registration on InnoTestPizza";
require "mailreg.php";
echo "<script language=\"JavaScript\" type=\"text/javascript\">
setTimeout(\"location.href = 'index.php';\",5000);
</script>";
}
$dbh = null;
}
else {
    echo "E-mail or login is incorrect! Login must have from 3 to 16 letters; only latin characters, digits and spaces are allowed!";
}
}
else
{
echo "No information. Please go to <a href=\"/\">main</a> page";
}
?>