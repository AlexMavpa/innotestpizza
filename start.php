<?php
require "dbconf.php";
require "functions.php";
    session_start();
if (empty($_SESSION['auth']) or $_SESSION['auth'] == false) {
		if ( !empty($_COOKIE['mail']) and !empty($_COOKIE['key']) ) {
			$login = $_COOKIE['mail']; 
			$key = $_COOKIE['key']; 
    $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $sth = $dbh->query("SELECT * from users WHERE email = '".$login."' AND cookie='".$key."'");
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			if (!empty($row)) {
				$_SESSION['auth'] = true; 
				$_SESSION['mail'] = $row['email'];
				$_SESSION['login'] = $row['nickname'];
			  $_SESSION['id'] = $row['id'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['secondname'] = $row['secondname'];
			}
			else
			{
			$loginmessage = "<p>You are not logged in (guest), but you can still make order. If you want to let our site remember your shopping cart better and also to keep order history, please login or register</p>";
			}
			$dbh = null;
		}
	}
	else
	{
	$login = $_SESSION['login'];
	$id = $_SESSION['id'];
	$phone = $_SESSION['phone'];
	$firstname = $_SESSION['firstname'];
	$secondname = $_SESSION['secondname'];
	$mail = $_SESSION['mail'];
	}
	?>