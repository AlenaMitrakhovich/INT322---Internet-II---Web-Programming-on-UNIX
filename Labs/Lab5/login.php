<?php
	session_start();
	
	if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$usernameError = "";
		$passwordError = "";
		$dataValid = true;
		$fail = "";
		
		//retrieve log in information
		$login = file('/home/int322_171d17/secret/topsecret');
		$dbserver = trim($login[0]);
		$uid = trim($login[1]);
		$pw = trim($login[2]);
		$dbname = trim($login[3]);
		
		//establish connection
		$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
		or die ('Could not connect' . mysqli_error($link));
		
			$sql_query = 'select * from users where username="' . $username .'"';
			$result = mysqli_query($link, $sql_query)
			or ('Query failed' . mysqli_error($link));
			
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				
				if($username == $row['username'] && $password == $row['password']){
					$_SESSION['username'] = $username;
					header("location: protectedstuff.php");
				}
				else {
					$username = "";
					$password = "";
					$fail = "Invalid username or password";
				}
			}
			else{
				$fail = "Invalid username or password";
			}
	}
?>

<html>
<head><title>Login</title>
<head>
<body>
	<form method="POST" action="">
		<input type="text" name="username">
		<br/>
		<input type="password" name="password">
		<br/>
		<input type="submit" value="submit">
		<br/>
		<?php echo $fail ?>
	</form>
	
	<a href="forgotpassword.php">I forgot my password</a>
</body>
</html>
