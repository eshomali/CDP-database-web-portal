<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='add-cu-page-css.css'>
<link href="https://fonts.googleapis.com/css?family=Lato: 400,400i,700,700i,900' rel='stylesheet">
</head>
<body>

	<!--   ===Header===   -->
	<label style='font-size:  40px'>Add New Credit Union</label>
	<hr>
	
	<form action='' method='GET'>
		<!--   ===Main Layout===   -->
		<div class='main-layout'>
			<!--CU Name-->
			<div style='grid-area: a'>
				<label class='form-label'>Name: </label>
			</div>
			<div style='grid-area: b'>
				<input type='text' class='form-input-box' name='new-name' id='new-name'>
			</div>
			<!--Data Processor-->
			<div style='grid-area: c'>
				<label class='form-label'>Data Processor: </label>
			</div>
			<div style='grid-area: d'>
				<input type='text' class='form-input-box' name='new-processor' id='new-processor'>
			</div>
			<!--City-->
			<div style='grid-area: e'>
				<label class='form-label'>City: </label>
				<input type='text' style='width: 250px' name='new-city' id='new-city'>
			</div>
			<!--State-->
			<div style='grid-area: f'>
				<label class='form-label'>State: </label>
				<input type='text' style='width: 100px' name='new-state' id='new-state'>
			</div>
			<!--Galaxy CU Number-->
			<div style='grid-area: g'>
				<label class='form-label'>Galaxy CU Number: </label>
			</div>
			<div style='grid-area: h'>
				<input type='text' class='form-input-box' name='new-number' id='new-number'>
			</div>
			<!--Submit Button-->
			<div style='grid-area: i'>
				<button class='add-button'>CONFIRM</button>
			</div>
		</div>
	</form>

<?php
if(isset($_GET['new-name'], $_GET['new-processor'], $_GET['new-city'], $_GET['new-state'])){
	
	$get_name = $_GET['new-name'];
	$get_dataProcessor = $_GET['new-processor'];
	$get_city = $_GET['new-city'];
	$get_state = $_GET['new-state'];
	//$cuNumber = $_GET['new-number'];
	
	save($get_name,$get_dataProcessor,$get_city,$get_state); //$get_cuNumber
}


function save($get_name,$get_dataProcessor,$get_city,$get_state){ //$get_cuNumber
		
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());

	$cuName = htmlspecialchars(mysql_real_escape_string($get_name));
	$dataProcessor = htmlspecialchars(mysql_real_escape_string($get_dataProcessor));
	$city = htmlspecialchars(mysql_real_escape_string($get_city));
	$state = htmlspecialchars(mysql_real_escape_string($get_state));
	//$get_cuNumber = htmlspecialchars(mysql_real_escape_string($get_cuNumber));
	
	//echo "<script language='javascript'>";
	//echo "alert('$dataProcessor')";
	//echo "</script>";
	
	$add_results = mysql_query("INSERT INTO credit_union (cuName, dataProcessor, city, us_state) VALUES ('$cuName', '$dataProcessor', '$city', '$state') ") or die(mysql_error());
	
	$raw_results = mysql_query("SELECT * FROM credit_union
		WHERE (`cuName` LIKE '%".$cuName."%') AND (`city` LIKE '%".$city."%') AND (`us_state` LIKE '%".$state."%') ") or die(mysql_error());
	
	$results = mysql_fetch_array($raw_results);

	$cuID = $results['cuID'];
	$cuName = $results['cuName'];
	$dataProcessor = $results['dataProcessor'];
	//$cuNumber = $results['cuNumber']; //not yet implemented in DB
	//$contactName = $results['contactName'];
	//$contactInfo = $results['contactInfo'];
	$city = $results['city'];
	$us_state = $results['us_state'];
	
	//display info after creation
	echo "<label class='form-label'>You Added: </label>";
	echo "<tr>";
	echo "<td>cuID: <input type='text' name='cuID' value='{$cuID}'/></td>";
	echo "<td>Name: <input type='text' name='cuName' value='{$cuName}'/></td>";
	echo "<td>Data Processor: <input type='text' name='dataProcessor' value='{$dataProcessor}'/></td>";
	echo "<td>City: <input type='text' name='city' value='{$city}'/></td>";
	echo "<td>State: <input type='text' name='us_state' value='{$us_state}'/></td>";
	echo "</tr>";
/*	echo "<td><input type='text' name='contactName' value='{$contactName}'/></td>";
	echo "<td><input type='text' name='contactInfo' value='{$contactInfo}'/></td>";
	echo "<td><input type='text' name='eRecipts' value='{$eRecipts}'/></td>";
	echo "<td><input type='text' name='eReciptBranches' value='{$eReciptBranches}'/></td>";
	echo "<td><input type='text' name='eReciptBranches' value='{$serverIP}'/></td>";
	echo "<td><input type='text' name='eReciptBranches' value='{$sqlInstance}'/></td>";
	echo "<td><input type='text' name='eReciptBranches' value='{$managePurchaseDate}'/></td>";
	echo "<td><input type='text' name='eReciptBranches' value='{$tellerPurchaseDate}'/></td>";
	echo "<td><input type='text' name='eReciptBranches' value='{$thermalDateLastPurchase}'/></td>";	
	echo "</tr>";
*/	
/*				
	echo "<tr>";
	echo "<td>cuID: " . $cuID. "</td>";
	echo "<td>Name: " . $cuName."</td>";
	echo "<td>data Proc: " . $dataProcessor."</td>";
	echo "<td>City: " . $city."</td>";
	echo "<td>State: " . $us_state."</td>";
	echo "</tr>";
	*/
}

	
?>
</body>
</html>