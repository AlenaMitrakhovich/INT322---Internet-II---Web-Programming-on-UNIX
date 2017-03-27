<?php
	session_start();
	
	/*when session_start() is called, php retrieves any variables for the
	current session (based on the session ID) into this autoglobal (or
	initializes a new autoglobal)*/
	if(isset($_SESSION['username']))
	{
		echo 'You are logged in!';
	}
	else
	{
		header("location: login.php");
	}
?>

<html>
<head>
<title>Protected Stuff</title>
</head>
<body>
	<a href="logout.php">Logout</a>
</body>
</html>