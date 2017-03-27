<?php
	if($_POST){
		$username = $_POST['username'];
		
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
		
		if(mysqli_num_rows($result) == 0)
		{
			header("location: login.php");
		}
		
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
			$passwordHint = trim($row['passwordHint']);
			$content = 'Username: " ' . $username . ' Password Hint: ' . $passwordHint;
			$header = "Reply to: amit@myseneca.ca";
			$mail = @mail($username, "password", $content, $header);
			if($mail){
				echo "E-mail sent";
?>
			<a href="login.php">Login</a> 
<?php
			}
			else{
				echo "E-mail not sent";
			}
		}
	}
	else{
?>

	<html>
	<body>
	<head><title>Forgot Password</title></head>
	<form method="POST" action="">
		<input type="text" name="username">
		<br/>
        <input type="submit" value="submit">
		<br/>
	</form>
<?php	
	}
?>
	</body>
	</html>