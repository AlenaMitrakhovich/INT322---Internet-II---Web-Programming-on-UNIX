<!DOCTYPE html>
<html>
<head><title>Lab3 Combined</title></head>

<body>
<?php

$postalErr = "";
$phoneErr = "";
$subjectErr = "";

$postalCode = "";
$phoneNo = "";
$subject = "";

$dataValid = true;

$patternPostal = "/^\s*[a-zA-Z][0-9][a-zA-Z]\s?[0-9][a-zA-Z][0-9]\s*$/";
$patternPhone = "/(^\s*[0-9]{3}[-][0-9]{3}[-][0-9]{4}\s*$)|(^\s*[0-9]{3}[ ]*[0-9]{3}[ ]*[0-9]{4}\s*$)|(^\s*[0-9]{3}[ ]*[0-9]{3}[-][0-9]{4}\s*$)|(^\s*[0-9]{10}\s*?)|(^\s*[0-9]{3}[ ]*[0-9]{7}\s*$)|(^\s*\([0-9]{3}\)[ ]*[0-9]{3}[-][0-9]{4}\s*$)|(^\s*\([]0-9]{3}\)[ ]*[0-9]{3}[ ]*[0-9]{4}\s*$)/";
$patternSubject = "/^\s*([A-Z][A-Z][A-Z][0-9][0-9][0-9][A-Z]{1,3})\s*$/";

if($_POST){
	
	if(!preg_match($patternPostal, $_POST['postalCode'])){	
		$postalErr = "Invalid postal code entry";
		$dataValid = false;
	}
	else{
	  echo "Postal code is Valid: ";
	  echo ($_POST['postalCode']);
	  $dataValid = true;
	}
	
	if(!preg_match($patternPhone, $_POST['phoneNo'])){	
		$phoneErr = "Invalid phone number entry";
		$dataValid = false;
	}
	else{
	  echo "Phone number is Valid: ";
	  echo ($_POST['phoneNo']);
	  $dataValid = true;
	}
	
	if(!preg_match($patternSubject, $_POST['subject'])){	
		$subjectErr = "Invalid subject entry";
		$dataValid = false;
	}
	else{
	  echo "Subject is Valid: ";
	  echo ($_POST['subject']);
	  $dataValid = true;
	}

	if ($_POST['postalCode'] == ""){
		echo "Postal code field is empty ";
		$dataValid = false;
	}
	
	if ($_POST['phoneNo'] == ""){
		echo "Phone number field is empty ";
		$dataValid = false;
	}
	
	if ($_POST['subject'] == ""){
		echo "Subject field is empty ";
		$dataValid = false;
	}
}
?>

<form method="POST">
	Postal code: <input type="text" name="postalCode" value="<?php echo $_POST['postalCode']; ?>"> <?php echo $postalErr;?>
	Subject: <input type="text" name="subject" value="<?php echo $_POST['subject']; ?>"> <?php echo $subjectErr;?>
	Phone Number: <input type="text" name="phoneNo" value="<?php echo $_POST['phoneNo']; ?>"> <?php echo $phoneErr;?>
	<br />
	<input type="submit" value="Submit">
</form>

</body>

</html>
