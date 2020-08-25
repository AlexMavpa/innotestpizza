<?php
	session_start();
	if (!empty($_SESSION['auth']) and $_SESSION['auth']) {
		session_destroy(); 
		setcookie('mail', '', time()); 
		setcookie('key', '', time()); 
		setcookie('login', '', time()); 
		setcookie('cart', '', time()); 
		setcookie('phone', '', time()); 
		sleep(1);
header("Location: /");
	}
	else
	{
	sleep(1);
header("Location: /");
	}

?>