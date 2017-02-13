<html>
<head><title>INT 322 Lab2</title></head>

<body>

<?php

$usernameError = "";
$passwordError = "";
$username = "";
$password = "";
$dataValid = true;

//if submit with POST
if ($_POST){
	//test if nothing has been entered in the field
	if($_POST['username'] == ""){
		$usernameError = "The username field cannot be blank";
		$dataValid = false;
	}
	if($_POST['password'] == ""){
		$passwordError = "The password field cannot be blank";
		$dataValid = false;
	}
}
//if the submit button was pressed and something was entered in both fields, process data
//(we just print a message)
if ($_POST && $dataValid){
?>
	Data is valid!<br>

<?php
//if no submit OR data in invalid, print form, repopulating fields and printing error messages
} else {
?>

<form method="POST" action="">
	username: <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"> <?php echo $usernameError;?>
	<br/>
	password: <input type="text" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"> <?php echo $passwordError;?>
	<br/>
	<input type="submit" value="SUBMIT">
</form>
<?php
}
?>

<?php
if($dataValid && $_POST){
	echo $username = $_POST['username'];
	echo "<br>";
	echo $password = $_POST['password'];

}
?>

</body>

</html>
