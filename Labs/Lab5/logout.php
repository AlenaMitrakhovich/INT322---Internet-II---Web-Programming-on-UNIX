<?php
	session_start();
	
	if(isset($_SESSION['username']))
	{
		session_destroy();
		unset($_SESSION['username']);
		setcookie("PHPSESSID", "", time()-61200, "/");
		header("location: login.php");
	}

?>