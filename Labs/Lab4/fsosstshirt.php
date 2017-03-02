<?php

$firstNameError = "";
$lastNameError = "";
$sexError = "";
$shirtCheckError = "";
$shirtSizeError = "";
$shirtNumError = "";
$dataValid = true;

if ($_POST){

	if($_POST ['firstname'] == ""){
		$firstNameError = "You must enter a first name";
		$dataValid = false;
	}
	
	if($_POST ['lastname'] == ""){
		$lastNameError = "You must enter a last name";
		$dataValid = false;
	}
	
	if($_POST ['sex'] != "m" && $_POST ['sex'] != "f"){
		$sexError = "Please select a gender";
		$dataValid = false;
	}
	
	if($_POST ['check'] != 'yes' && $_POST['check'] != 'no'){
		$shirtCheckError = "Please select yes or no";
		$dataValid = false;
	}

	if($_POST['check'] == "yes"){
		if($_POST ['number'] == ""){
			$shirtNumError = "Please indicate how many shirts you require";
			$dataValid = false;
		}
	}
	
	if($_POST['check'] == "no"){
		if($_POST['number'] != ""){
			$shirtNumError = "You must select yes for multiple shirts";
			$dataValid = false;
		}
	}

	if($_POST ['size'] == ""){
		$shirtSizeError = "Please select a size";
		$dataValid = false;
	}
}

	if($_POST && $dataValid){
		$dbserver = "db-mysql.zenit";
		$uid = "int322_171d17";
		$pw = "gkEG9753";
		$dbname = "int322_171d17";
		
		$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
		or die('Could not connect: ' . mysqli_error($link));
		
		   $firstname = $_POST['firstname'];
		   $lastname = $_POST['lastname'];
		   $sex = $_POST['sex'];
		   $size = $_POST['size'];
		   $checkyes = "";
		   $checkno = "";
	   
		   if($_POST['check'] == 'yes'){
			   $checkyes = $_POST['check'];
		   }
		   else{
			   $checkno = $_POST['check'];
		   }
	   
		   $number = $_POST['number'];
	   
	   $sql_query = 'INSERT INTO fsossregister2 set firstname="' . $firstname . '", lastname="' . $lastname . '", sex="' . $sex . '", 
	   size="' . $size . '",checkyes="' . $checkyes . '",checkno="' . $checkno. '", number="' . $number . '"';
	   
	   $result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
	   
	   echo  "<script>";
	   mysqli_close($link);
	   echo "window.location = 'table.php';";
	   echo "</script>";
	}

if(!$dataValid || !$_POST){
?>
	<html>
	<body>
		<form name="tshirts" method="POST" action="">
			First Name: <input type="text" name="firstname" value="<?php if($_POST['firstname']) echo $_POST['firstname']; ?>"><?php echo $firstNameError ?>
			<br/><br/>
			Last Name: <input type="text" name="lastname" value="<?php if($_POST['lastname']) echo $_POST['lastname']; ?>"><?php echo $lastNameError ?>
			<br/><br/>
			Sex: <?php echo $sexError ?><br/>
			Male: <input type="radio" name="sex" value="m" <?php if($_POST['sex'] == m) echo "CHECKED"; ?>> <br/>
			Female: <input type="radio" name="sex" value="f" <?php if($_POST['sex'] == f) echo "CHECKED"; ?>> <br/><br/>
			Multiple Shirts: <?php echo $shirtCheckError; ?> <br/>
					 <input type="checkbox" name="check" id="yes" value="yes"<?php if($_POST['check'] == "yes") echo "CHECKED"; ?>> yes
					 <input type="checkbox" name="check" id="no" value="no"<?php if($_POST['check'] == "no") echo "CHECKED"; ?>> no <br/><br/>
			Number of Shirts: <?php echo $shirtNumError; ?> <br/><br/>
							  <textarea name="number"><?php if ($_POST['number']) echo $_POST['number']; ?></textarea><br/><br/>
			Shirt Size: <?php echo $shirtSizeError; ?>
			<select name="size">
				<option value="">Select</option>
				<option value="s" name="s" <?php if($_POST['s']) echo "SELECTED"; ?>>Small</option>
				<option value="m" name="m" <?php if($_POST['m']) echo "SELECTED"; ?>>Medium</option>
				<option value="l" name="l" <?php if($_POST['l']) echo "SELECTED"; ?>>Large</option>
				<option value="xl" name="xl" <?php if($_POST['xl']) echo "SELECTED"; ?>>X-Large</option>
			</select><br/><br/>
			<input type="submit" value="submit">
		</form>
<?php
}
?>
	</body>
	</html>