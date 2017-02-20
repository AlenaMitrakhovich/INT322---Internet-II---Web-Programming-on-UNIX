<!DOCTYPE html>
<html>
<head><title>Lab3-01</title></head>

<body>
<?php

$postalErr = "";
$postalCode = "";
$dataValid = true;
$pattern = "/^\s*([A-Z][A-Z][A-Z][0-9][0-9][0-9][A-Z]{1,3})\s*$/";

if($_POST){
	
	 if(!preg_match($pattern, $_POST['postalCode'])){	
		$postalErr = "Invalid subject code entry";
		$dataValid = false;
	}
	else{
	  echo "Subject Code is Valid: ";
	  echo ($_POST['postalCode']);
	  $dataVAlid = true;
	}

	if ($_POST['postalCode'] == ""){
		echo "Subject code field is empty";
		$dataValid = false;
	}
}
?>

<form method="POST">
	Subject Code: <input type="text" name="postalCode" value="<?php echo $_POST['postalCode']; ?>"> <?php echo $postalErr;?>
	<br />
	<input type="submit" value="Submit">
</form>

</body>

</html>
