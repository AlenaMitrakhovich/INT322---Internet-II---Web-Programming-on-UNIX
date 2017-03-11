<html>
<body>
<head><title>Product Comparison Tool</title></head>

<?php
	//retrieve log in information
	$login = file('/home/int322_171d17/secret/topsecret');
	$dbserver = trim($login[0]);
	$uid = trim($login[1]);
	$pw = trim($login[2]);
	$dbname = trim($login[3]);
	
	//establish connection
	$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
	or die ('Could not connect' . mysqli_error($link));
	
	//check if table exists
	$sql_query = "SHOW TABLES IN $dbname WHERE `Tables_in_" .$dbname. "` = 'phones'";
	$result = mysqli_query($link, $sql_query) 
	or ('Query failed' . mysqli_error($link));
	
	if(mysqli_num_rows($result) === 0){

		//create table
		$sql_query = 'CREATE TABLE phones		
		(id int zerofill not null auto_increment,
		itemName varchar(40) not null, 
		model varchar(20) not null, 
		os varchar(10) not null,
		price decimal(10,2) not null,
		primary key (id))';
		
		$result = mysqli_query($link, $sql_query)
		or ('Query failed' . mysqli_error($link));
		
		//retrieve information from files
		$cellphone = file('cellphone.txt');
		$version = file('version.txt');
		$os = file('os.txt');
		$price = file('price.txt');
		
		//load table 'phones' with information from .txt files
		for($x = 0; $x < count($cellphone); $x++){
			$sql_query = 'INSERT INTO phones set 
			itemName="' . trim($cellphone[$x]) .'", 
			model="' . trim($version[$x]) .'", 
			os="' . trim($os[$x]) .'", 
			price="'. trim($price[$x]) .'"';
			$result = mysqli_query($link, $sql_query)
			or ('Query failed' . mysqli_query($link));
		}
	
	}
	
	//varibles for storing data errors
	$productErr = "";
	$minErr = "";
	$maxErr = "";
	$dataValid = true;
	
	//if submit with POST 
	if($_POST){
		
		//data validation
		if($_POST['product'] == ""){
			$productErr = "Please select a phone";
			$dataValid = false;
		}
		
		//for validating decimal number input
		$pattern = "/^\s*[0-9]{1,}[.][0-9]{1,}\s*$/";
		
		if($_POST['min'] == ""){
			$minErr = "Please select a minimum price";
			$dataVaid = false;
		} 
		else if (!preg_match($pattern, $_POST['min'])){
			$minErr = "Minimum price must be a decimal number";
			$dataValid = false;
		}
		
		if($_POST['max'] == ""){
			$maxErr = "Please select a maximum price";
			$dataValid = false;
		}
		else if(!preg_match($pattern, $_POST['max'])){
			$maxErr = "Maximum price must be a decimal number";
			$dataValid = false;
		}
		
		if($_POST['min'] > $_POST['max']){
			$minErr = "Minimum price cannot be greater than maximum price";
			$dataValid = false;
		}
		
	}
	
	//if submit with post and above validation passed
	if($_POST && $dataValid){
		
		//retrieve user input values
		$product = $_POST['product'];
		$min = $_POST['min'];
		$max = $_POST['max'];
		
		//select from table according to above values
		$sql_query = 'SELECT * 
		FROM phones
		WHERE itemName="' . $product . '"
		AND price BETWEEN "' . $min . '" AND "' . $max . '"';
		
		//storing result of above query
		$result = mysqli_query($link, $sql_query)
		or ('Query failed' . mysqli_error($link));
		
		//if results query has 0 matched rows, display message
		if(mysqli_num_rows($result) === 0){
			echo "No results found";
		}
		//if results are found based on input values
		else{
?>
			<!-- creating a table for results to be displayed -->
			<table border="1">
			<caption>Cellphone Comparison Tool</caption>
				<tr>
					<th>Cellphone</th>
					<th>Model</th>
					<th>Operating System</th>
					<th>Price</th>
				</tr>
				
			<?php
			//looping through the result values
			while($row = mysqli_fetch_assoc($result)){
			?>
			
			<!-- displaying results line by line -->
				<tr>
					<td><?php print $row['itemName']?></td>
					<td><?php print $row['model']?></td>
					<td><?php print $row['os']?></td>
					<td><?php print $row['price']?></td>
			
			<?php
			}
			?>
				</tr>
			</table>
			
			<!-- link back to the form -->
			<br>
			<a href="http://zenit.senecac.on.ca:13634/cgi-bin/assign1/assign1.php">Search Again</a>
			<br>
<?php	
		}
	
	//displaying the date the query was made
	$sql_query = "SELECT CURDATE()";
	$result = mysqli_query($link, $sql_query)
	or ('Query failed' . mysqli_error($link));
	$date = mysqli_fetch_assoc($result);
	echo '<br>';
	echo 'Date: ';
	echo $date['CURDATE()'];
	
	//if no submit or data is invalid, print form, repopulate fields, print error messages
	} else {
?>
	<h1 style="color:red">Product Comparison Tool</h1>
	<p>by Alena Mitrakhovich</p>
	
	<!-- creating a form -->
	<form method="POST" action="">
		Cellphones:
		<select name="product">
			<option name="product" value="">Select</option>
			<option name="product" value="Samsung" <?php if($_POST['product'] == "Samsung") echo "SELECTED"; ?>>Samsung</option>
			<option name="product" value="iPhone" <?php if($_POST['product'] == "iPhone") echo "SELECTED"; ?>>iPhone</option>
			<option name="product" value="BlackBerry" <?php if($_POST['product'] == "BlackBerry") echo "SELECTED"; ?>>BlackBerry</option>
		</select>
		<!-- displaying error -->
		<?php echo $productErr; ?>
		<br>
		<br>
		
		Minimum price: <input type="text" name="min" value="<?php if($_POST['min']) echo $_POST['min']?>">
		<!-- displaying error -->
		<?php echo $minErr; ?>
		<br>
		<br>
		
		Maximum price: <input type="text" name="max" value="<?php if($_POST['max']) echo $_POST['max']?>">
		<!-- displaying error -->
		<?php echo $maxErr; ?>
		<br>
		<br>
		
		<!-- submit -->
		<input type="submit" value="Submit">
		<br>
		<br>
	</form>
	
	<?php 
	}
	//closing the connection
	mysqli_close($link);
	?>

</body>
</html>