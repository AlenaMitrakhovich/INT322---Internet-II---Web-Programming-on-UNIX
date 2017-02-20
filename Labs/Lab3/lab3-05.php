<!DOCTYPE html>
<html>
<head><title>Lab3-01</title></head>

<body>
<?php

$postalErr = "";
$postalCode = "";
$dataValid = true;
$pattern = "/^\s*[0-9][0-9][0-9][-][0-9][0-9][0-9][-][0-9]{4}\s*$/";

if($_POST){
	
	 if(!preg_match($pattern, $_POST['postalCode'])){	
		$postalErr = "Invalid phone number entry";
		$dataValid = false;
	}
	else{
	  echo "Phone Number is Valid: ";
	  echo ($_POST['postalCode']);
	  $dataVAlid = true;
	}

	if ($_POST['postalCode'] == ""){
		echo "Phone Number field is empty";
		$dataValid = false;
	}
}
?>

<form method="POST">
	Phone Number: <input type="text" name="postalCode" value="<?php echo $_POST['postalCode']; ?>"> <?php echo $postalErr;?>
	<br />
	<input type="submit" value="Submit">
</form>

</body>

</html>
