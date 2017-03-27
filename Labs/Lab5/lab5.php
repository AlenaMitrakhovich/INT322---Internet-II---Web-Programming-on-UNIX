<?php
	//variables
	$name = $_POST['name'];
	$value = $_POST['value'];
	//setting cookie
	setcookie($name, $value, time()+3600);

	//keeping track of number  of visits in a cookie
	if(!isset($_COOKIE['visitNumber']))
	{
		setcookie('visitNumber', 1, time()+3600);
	}
	else
	{
		setcookie('visitNumber', $_COOKIE['visitNumber']+1, time()+3600);
	}

	//validation error messages
	$nameError = "";
	$valueError = "";
	$dataValid = true;
	
	//data validation
	if($_POST){
		if($_POST['name'] == ""){
			$nameError = "Please enter a name";
			$dataValid = false;
		}
		
		if($_POST['value'] == ""){
			$nameError = "Please enter a value";
			$dataValid = false;
		}
	}
	
	//displaying form
	if($_POST && $dataValid){
?>		
		<html>
		<header><title>Lab5</title></header>
		<body>
			<form method="POST" action="">
			
				<p><?php echo 'Welcome back - you visited this page ' .$_COOKIE['visitNumber']. ' time(s)'?></p>
				
				Cookie name:<input type="text" name="name" value=<?php if($_POST['name']) echo $_POST['name']?>>
				<?php echo $nameError?>
				<br/>
				Cookie value:<input type="text" name="value" value=<?php if($_POST['value']) echo $_POST['value']?>>
				<?php echo $valueError?>
				<br/>
				<input type="submit" value="submit">
				<br/>
			</form>
		</body>
		</html>
<?php
		//displaying cookies stored with two methods
		var_dump($_COOKIE);
			
		echo "<br><br>\nSecond method:<br><br>\n";
			
		foreach ($_COOKIE as $key=>$val)
		{
		echo $key.' is '.$val."<br>\n";
		}
	}
	else{
?>
		<html>
		<head><title>Lab5</title></head>
		<body>
			<form method="POST" action="">
				
				<p><?php echo 'Welcome back - you visited this page ' .$_COOKIE['visitNumber']. ' time(s)'?></p>
				
				Cookie name:<input type="text" name="name" value=<?php if($_POST['name']) echo $_POST['name']?>>
				<?php echo $nameError?>
				<br/>
				Cookie value:<input type="text" name="value" value=<?php if($_POST['value']) echo $_POST['value']?>>
				<?php echo $valueError?>
				<br/>
				<input type="submit" value="submit">
				<br/>
			</form>
		</body>
		</html>
<?php
		var_dump($_COOKIE);
			
		echo "<br><br>\nSecond method:<br><br>\n";
			
		foreach ($_COOKIE as $key=>$val)
		{
		echo $key.' is '.$val."<br>\n";
		}
?>
	
<?php
	}
?>