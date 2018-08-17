<!DOCTYPE html>
<html>
<head>
	<link href='https: //fonts.googleapis.com/css?family=Lato: 400,400i,700,700i,900' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='add-thermal-page-css.css'>
</head>
<body>
	<!--   ===Header===   -->
	<label style='font-size: 40px'>Add New Thermal Printer</label>
	<hr>
	<form action='' method='GET'>
		<!--   ===Main Layout===   -->
		<div class='main-layout'>
			<!--Date Purchased-->
			<div style='grid-area: a'>
				<label class='form-label'>Date Purchased (YYYY-MM-DD): </label>
			</div>
			<div style='grid-area: b'>
				<input type='text' style='width: 150px' name='new-dop' id='new-dop'>
			</div>
			<!--Serial Number-->
			<div style='grid-area: c'>
				<label class='form-label'>Serial number:</label>
			</div>
			<div style='grid-area: d'>
				<input type='text' class='form-input-box' name='new-serial' id='new-serial'>
			</div>
			<!--Module-->
			<div style='grid-area: e'>
				<label class='form-label' style='float: right'>Module:</label>
			</div>
			<div style='grid-area: f'>
				<input type='text' style='width: 250px' name='new-module' id='new-module'>
			</div>
			<div style='grid-area: g' class='mini-layout'>
				<!--Thermal Masking-->
				<div>
					<input type='checkbox' name='new-masking' id='new-masking'>
					<label class='form-label'>Thermal masking?</label>
				</div>
				<!--Color-->
				<div>
					<label class='form-label'>Color:</label>
					<input type='text' style='width: 150px' name='new-color' id='new-color'>
				</div>
				<!--Font Size-->
				<div>
					<label class='form-label'>Font size:</label>
					<input type='text' style='width: 150px' name='new-fontsize' id='new-fontsize'>
				</div>
				<!--Duplicate-->
				<div>
					<label class='form-label'>Duplicate:</label>
					<input type='text' style='width: 150px' name='new-duplicate' id='new-duplicate'>
				</div>
			</div>
			
			<!--CONFIRM-->
			<div style='grid-area: h'>
				<button class="confirm-button">CONFIRM</button>
			</div>
		</div>
	</form>

<?php

if(isset($_GET['new-dop'], $_GET['new-serial'], $_GET['new-module'])){ //$_GET['new-masking'], $_GET['new-color'], $_GET['new-fontsize'], $_GET['new-duplicate']
	
	$cuID = 1; //get from passed value from link
	
	$get_dop = $_GET['new-dop'];
	$get_serial = $_GET['new-serial'];
	$get_module = $_GET['new-module'];
	//$get_masking = $_GET['new-masking'];
	//$get_color = $_GET['new-color'];
	//$get_fontsize = $_GET['new-fontsize'];
	//$get_duplicate = $_GET['new-duplicate'];
	
	save($cuID,$get_dop,$get_serial,$get_module); //$get_masking,$get_color,$get_fontsize,$get_duplicate
}


function save($cuID,$get_dop,$get_serial,$get_module){ //$get_masking,$get_color,$get_fontsize,$get_duplicate
		
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());
	
	$cuID = htmlspecialchars(mysql_real_escape_string($cuID));
	
	$dop = htmlspecialchars(mysql_real_escape_string($get_dop));
	$serial = htmlspecialchars(mysql_real_escape_string($get_serial));
	$module = htmlspecialchars(mysql_real_escape_string($get_module));
//	$masking = htmlspecialchars(mysql_real_escape_string($get_masking));
//	$color = htmlspecialchars(mysql_real_escape_string($get_color));
//	$fontsize = htmlspecialchars(mysql_real_escape_string($get_fontsize));
//	$duplicate = htmlspecialchars(mysql_real_escape_string($get_duplicate));
	
	//echo "<script language='javascript'>";
	//echo "alert('$dataProcessor')";
	//echo "</script>";
	
	$add_results = mysql_query("INSERT INTO thermal (cuID, purchaseDate, serialNumber, moduleT) VALUES ('$cuID', '$dop', '$serial', '$module') ") or die(mysql_error());
	
	$raw_results = mysql_query("SELECT * FROM thermal WHERE cuID = '$cuID' ") or die(mysql_error());
	
	$results = mysql_fetch_array($raw_results);

	$purchaseDate = $results['purchaseDate'];
	$serialNumber = $results['serialNumber'];
	$moduleT = $results['moduleT'];

	
	//display info after creation
	echo "<label class='form-label'>You Added: </label>";
	echo "<tr>";
	echo "<td>cuID: " . $cuID. "</td>";
	echo "<td>purchaseDate: " . $purchaseDate. "</td>";
	echo "<td>serialNumber: " . $serialNumber."</td>";
	echo "<td>moduleT: " . $moduleT."</td>";
	echo "</tr>";
}

?>

</body>
</html>