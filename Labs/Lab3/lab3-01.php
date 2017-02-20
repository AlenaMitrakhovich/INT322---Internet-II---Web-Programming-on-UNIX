<!DOCTYPE html>
<html>
<head><title>Lab3-01</title></head>

<body>
<?php

$postalErr = "";
$postalCode = "";
$dataValid = true;
$pattern = "/^([a-zA-Z][0-9]){3}$/";

if($_POST){
	
	 if(!preg_match($pattern, $_POST['postalCode'])){	
		$postalErr = "Invalid postal code entry";
		$dataValid = false;
	}
	else{
	  echo "Postal Code is Valid: ";
	  echo ($_POST['postalCode']);
	$dataVAlid = true;
	}

	if ($_POST['postalCode'] == ""){
		echo "Postal code field is empty";
		$dataValid = false;
	}
}
?>

<form method="POST">
	Postal Code: <input type="text" name="postalCode" value="<?php echo $_POST['postalCode']; ?>"> <?php echo $postalErr;?>
	<br />
	<input type="submit" value="Submit">
</form>

</body>

</html>
