<!DOCTYPE html>
<html lang="en-US">
<!---------------------------------->
<head>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900" rel="stylesheet">
<style>
	body{
		font-family: "Lato", sans-serif;
	}
	.main-layout{
		display: grid;
		grid-template-columns: 425px 575px;
		padding-left: 110px;
		padding-right: 50px;
		grid-gap: 60px;
	}
	.location-layout{
		display: grid;
		grid-template-columns: 0.5fr 1fr;
		grid-gap: 30px;
	}
	.main-layout label{
		font-size: 20px;
		padding-left: 50px;
	}
	.location-layout label{
		font-size: 20px;
		padding-left: 0px;
	}
	.results-table-layout {
	display: grid;
	grid-template-columns: 0.2fr 1fr 1fr 0.5fr;
	grid-gap: 10px;
}

.results-table-header {
	font-size: 12px;
	font-weight: bold;
	width: 100%;
}
</style>

</head>
<!---------------------------------->
<body>
	
	<h1>Search by:</h1>
	
	<hr>
	
<form>

	<!--Search Option 1: Name/Data Processor-->
	<form action="" method="GET">
		<div class="main-layout">
			<label id="big-label">Credit Union Name or Data Processor</label>
			<input type="text" name="name-processor" id="name-processor">
			<input type="submit" name="submit" value="Search"></input>
		</div>
	</form>
	<hr>
	
	<!--Search Option 2: Location-->
	<form action="" method="GET">
		<div class="main-layout">
			<label>Location</label>
			<div class="location-layout">
				<label>City</label>
				<input type="text" name="city" id="city">
				<label>State</label>
				<input type="text" name="state" id="state">
				<label>ZIP Code</label>
				<input type="text" name="zip" id="zip">
			</div>
			<input type="submit" name="submit" value="Search"></input>
		</div>
	</form>
	
	<hr>
	
	<!--Search Option 3: Purchase Date-->
	<form action="" method="GET">
		<div class="main-layout">
			<label>Purchase Date</label>
			<input type="text" name="purchase-date" id="purchase-date">
			<input type="submit" name="submit" value="Search"></input>
		</div>
	</form>
	<hr>
	
	<!--Search Option 4: IP Address-->
	<form action="" method="GET">
		<div class="main-layout">
			<label>IP Address</label>
			<input type="text" name="ip-address" id="ip-address">
			<input type="submit" name="submit" value="Search"></input>
		</div>
	</form>
	<hr>
	
</form>




<?php

//search by CU or Data Processor
if(isset($_GET['name-processor'])){
	$name = $_GET['name-processor'];
	search_name($name);	
}

// search by location
if(isset($_GET['city'])){
	$city = $_GET['city'];
	search_loc($city);
}
elseif(isset($_GET['state'])){
	$state = $_GET['state'];
	search_loc($state);
}
elseif(isset($_GET['zip'])){
	$zip = $_GET['zip'];
	search_loc($zip);
}

//search by Purchase Date
if(isset($_GET['purchase-date'])){
	$pdate = $_GET['purchase-date'];
	search_pdate($pdate);	
}

//search by IP Address
if(isset($_GET['ip-address'])){
	$ip = $_GET['ip-address'];
	search_ip($ip);	
}




function search_ip($ip){
	
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());

	$ip = htmlspecialchars(mysql_real_escape_string($ip));
	
	$raw_results = mysql_query("SELECT * FROM credit_union
            WHERE (`serverIP` LIKE '%".$ip."%') OR (`sqlInstance` LIKE '%".$ip."%')") or die(mysql_error());
	
	echo "<div class='results-table-layout'>";
		echo "<th>ID</th>";
		echo "<th>CREDIT UNION</th>";
		echo "<th>DATA PROCESSOR</th>";
		echo "<th>INACTIVE</th>";
		echo "<th>city</th>";
		echo "<th>us_state</th>";
		echo "<th>contactName</th>";
		echo "<th>contactInfo</th>";
		echo "<th>eRecipts</th>";
		echo "<th>eReciptBranches</th>";
		echo "<th>serverIP</th>";
		echo "<th>sqlInstance</th>";
		echo "<th>managePurchaseDate</th>";
		echo "<th>tellerPurchaseDate</th>";
		echo "<th>thermalDateLastPurchase</th>";
	echo "</div>";
	
	while($results = mysql_fetch_array($raw_results)){
	
		$cuID = $results['cuID'];
		$cuName = $results['cuName'];
		$dataProcessor = $results['dataProcessor'];
		$inactive = $results['inactive'];
		$city = $results['city'];
		$us_state = $results['us_state'];
		$contactName = $results['contactName'];
		$contactInfo = $results['contactInfo'];
		$eRecipts = $results['eRecipts'];
		$eReciptBranches = $results['eReciptBranches'];
		$serverIP = $results['serverIP'];
		$sqlInstance = $results['sqlInstance'];
		$managePurchaseDate = $results['managePurchaseDate'];
		$tellerPurchaseDate = $results['tellerPurchaseDate'];
		$thermalDateLastPurchase = $results['thermalDateLastPurchase'];
		
		echo "<form action='' method='POST'>";
		//	echo "<td>id: " . $cuID. "</td>";
		//	echo "<td>Name: " . $cuName."</td>";
		//	echo "<td>data Proc: " . $dataProcessor."</td>";
		
		
		echo "<div class='results-table-layout'>";
		echo	"<!--   Headers   -->";
		echo	"<label class='results-table-header'>CUID</label>";
		echo	"<label class='results-table-header'>Name</label>";
		echo 	"<label class='results-table-header'>Data Processor</label>";
		echo	"<!--Empty label to skip a cell-->";
		echo	"<label></label>";
			
		echo "<!--   Results   -->";
		echo "<!--Row 1-->";
		echo "<input type='text' name='cuID' id='cuID' value='{$cuID}'>";
		echo "<input type='text' name='cuName' id='cuName' value='{$cuName}'>";
		echo "<input type='text' name='dataProcessor' id='dataProcessor' value='{$dataProcessor}'>";
		echo "<a href='page2.php?cuID=<?php echo $cuID ?>'>INFO</a>";
		
		echo "</div>";

			
				//echo "<div id='sear'>";
		/*		echo "<tr>";
			
				echo "<td><input type='text' name='cuID' value='{$cuID}'/></td>";
				echo "<td><input type='text' name='cuName' value='{$cuName}'/></td>";
				echo "<td><input type='text' name='dataProcessor' value='{$dataProcessor}'/></td>";
				echo "<td><input type='text' name='inactive' value='{$inactive}'/></td>";
				echo "<td><input type='text' name='city' value='{$city}'/></td>";
				echo "<td><input type='text' name='us_state' value='{$us_state}'/></td>";
				echo "<td><input type='text' name='contactName' value='{$contactName}'/></td>";
				echo "<td><input type='text' name='contactInfo' value='{$contactInfo}'/></td>";
				echo "<td><input type='text' name='eRecipts' value='{$eRecipts}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$eReciptBranches}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$serverIP}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$sqlInstance}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$managePurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$tellerPurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$thermalDateLastPurchase}'/></td>";
				
				echo "</tr>"; */
			//echo "</div>";
		echo "</form>";

	}
}


function search_pdate($pdate){
	
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());

	$pdate = htmlspecialchars(mysql_real_escape_string($pdate));
	
	$raw_results = mysql_query("SELECT * FROM credit_union
            WHERE (`managePurchaseDate` LIKE '%".$pdate."%') OR (`tellerPurchaseDate` LIKE '%".$pdate."%')") or die(mysql_error());
	
	echo "<th>ID</th>";
	echo "<th>CREDIT UNION</th>";
	echo "<th>DATA PROCESSOR</th>";
	echo "<th>INACTIVE</th>";
	echo "<th>city</th>";
	echo "<th>us_state</th>";
	echo "<th>contactName</th>";
	echo "<th>contactInfo</th>";
	echo "<th>eRecipts</th>";
	echo "<th>eReciptBranches</th>";
	echo "<th>serverIP</th>";
	echo "<th>sqlInstance</th>";
	echo "<th>managePurchaseDate</th>";
	echo "<th>tellerPurchaseDate</th>";
	echo "<th>thermalDateLastPurchase</th>";
	
	while($results = mysql_fetch_array($raw_results)){
	
		$cuID = $results['cuID'];
		$cuName = $results['cuName'];
		$dataProcessor = $results['dataProcessor'];
		$inactive = $results['inactive'];
		$city = $results['city'];
		$us_state = $results['us_state'];
		$contactName = $results['contactName'];
		$contactInfo = $results['contactInfo'];
		$eRecipts = $results['eRecipts'];
		$eReciptBranches = $results['eReciptBranches'];
		$serverIP = $results['serverIP'];
		$sqlInstance = $results['sqlInstance'];
		$managePurchaseDate = $results['managePurchaseDate'];
		$tellerPurchaseDate = $results['tellerPurchaseDate'];
		$thermalDateLastPurchase = $results['thermalDateLastPurchase'];
		
		echo "<form action='' method='POST'>";
			echo "<td>id: " . $cuID. "</td>";
			echo "<td>Name: " . $cuName."</td>";
			echo "<td>data Proc: " . $dataProcessor."</td>";
			echo "<a href='page2.php?cuID=100'>INFO</a>";
			
			//echo "<div id='sear'>";
		/*		echo "<tr>";
			
				echo "<td><input type='text' name='cuID' value='{$cuID}'/></td>";
				echo "<td><input type='text' name='cuName' value='{$cuName}'/></td>";
				echo "<td><input type='text' name='dataProcessor' value='{$dataProcessor}'/></td>";
				echo "<td><input type='text' name='inactive' value='{$inactive}'/></td>";
				echo "<td><input type='text' name='city' value='{$city}'/></td>";
				echo "<td><input type='text' name='us_state' value='{$us_state}'/></td>";
				echo "<td><input type='text' name='contactName' value='{$contactName}'/></td>";
				echo "<td><input type='text' name='contactInfo' value='{$contactInfo}'/></td>";
				echo "<td><input type='text' name='eRecipts' value='{$eRecipts}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$eReciptBranches}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$serverIP}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$sqlInstance}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$managePurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$tellerPurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$thermalDateLastPurchase}'/></td>";
				
				echo "</tr>"; */
			//echo "</div>";
		echo "</form>";

	}
	
}



function search_loc($pass){
	
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());
	
	$loc = htmlspecialchars(mysql_real_escape_string($pass));

	$raw_results = mysql_query("SELECT * FROM credit_union
		WHERE (`city` LIKE '%".$loc."%') OR (`us_state` LIKE '%".$loc."%') OR (`us_state` LIKE '%".$loc."%')") or die(mysql_error());

	echo "<th>ID</th>";
	echo "<th>CREDIT UNION</th>";
	echo "<th>DATA PROCESSOR</th>";
	echo "<th>INACTIVE</th>";
	echo "<th>city</th>";
	echo "<th>us_state</th>";
	echo "<th>contactName</th>";
	echo "<th>contactInfo</th>";
	echo "<th>eRecipts</th>";
	echo "<th>eReciptBranches</th>";
	echo "<th>serverIP</th>";
	echo "<th>sqlInstance</th>";
	echo "<th>managePurchaseDate</th>";
	echo "<th>tellerPurchaseDate</th>";
	echo "<th>thermalDateLastPurchase</th>";
	
	while($results = mysql_fetch_array($raw_results)){
	
		$cuID = $results['cuID'];
		$cuName = $results['cuName'];
		$dataProcessor = $results['dataProcessor'];
		$inactive = $results['inactive'];
		$city = $results['city'];
		$us_state = $results['us_state'];
		$contactName = $results['contactName'];
		$contactInfo = $results['contactInfo'];
		$eRecipts = $results['eRecipts'];
		$eReciptBranches = $results['eReciptBranches'];
		$serverIP = $results['serverIP'];
		$sqlInstance = $results['sqlInstance'];
		$managePurchaseDate = $results['managePurchaseDate'];
		$tellerPurchaseDate = $results['tellerPurchaseDate'];
		$thermalDateLastPurchase = $results['thermalDateLastPurchase'];
		
		echo "<form action='' method='POST'>";
			echo "<td>id: " . $cuID. "</td>";
			echo "<td>Name: " . $cuName."</td>";
			echo "<td>data Proc: " . $dataProcessor."</td>";

			
				//echo "<div id='sear'>";
		/*		echo "<tr>";
			
				echo "<td><input type='text' name='cuID' value='{$cuID}'/></td>";
				echo "<td><input type='text' name='cuName' value='{$cuName}'/></td>";
				echo "<td><input type='text' name='dataProcessor' value='{$dataProcessor}'/></td>";
				echo "<td><input type='text' name='inactive' value='{$inactive}'/></td>";
				echo "<td><input type='text' name='city' value='{$city}'/></td>";
				echo "<td><input type='text' name='us_state' value='{$us_state}'/></td>";
				echo "<td><input type='text' name='contactName' value='{$contactName}'/></td>";
				echo "<td><input type='text' name='contactInfo' value='{$contactInfo}'/></td>";
				echo "<td><input type='text' name='eRecipts' value='{$eRecipts}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$eReciptBranches}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$serverIP}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$sqlInstance}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$managePurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$tellerPurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$thermalDateLastPurchase}'/></td>";
				
				echo "</tr>"; */
			//echo "</div>";
		echo "</form>";

	}
}



function search_name($name){
	
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());
	
	
	
	$name = htmlspecialchars(mysql_real_escape_string($name));
	
	$raw_results = mysql_query("SELECT * FROM credit_union
            WHERE (`cuName` LIKE '%".$name."%') OR (`dataProcessor` LIKE '%".$name."%')") or die(mysql_error());
	
	echo "<div class='results-table-layout'>";
		echo	"<label class='results-table-header'>CUID</label>";
		echo	"<label class='results-table-header'>Name</label>";
		echo 	"<label class='results-table-header'>Data Processor</label>";
//		echo "<th>INACTIVE</th>";
//		echo "<th>city</th>";
//		echo "<th>us_state</th>";
//		echo "<th>contactName</th>";
//		echo "<th>contactInfo</th>";
//		echo "<th>eRecipts</th>";
//		echo "<th>eReciptBranches</th>";
//		echo "<th>serverIP</th>";
//		echo "<th>sqlInstance</th>";
//		echo "<th>managePurchaseDate</th>";
//		echo "<th>tellerPurchaseDate</th>";
//		echo "<th>thermalDateLastPurchase</th>";
	echo "</div>";
	
	while($results = mysql_fetch_array($raw_results)){
	
		$cuID = $results['cuID'];
		$cuName = $results['cuName'];
		$dataProcessor = $results['dataProcessor'];
		$inactive = $results['inactive'];
		$city = $results['city'];
		$us_state = $results['us_state'];
		$contactName = $results['contactName'];
		$contactInfo = $results['contactInfo'];
		$eRecipts = $results['eRecipts'];
		$eReciptBranches = $results['eReciptBranches'];
		$serverIP = $results['serverIP'];
		$sqlInstance = $results['sqlInstance'];
		$managePurchaseDate = $results['managePurchaseDate'];
		$tellerPurchaseDate = $results['tellerPurchaseDate'];
		$thermalDateLastPurchase = $results['thermalDateLastPurchase'];
		
		echo "<form action='' method='POST'>";
		//	echo "<td>id: " . $cuID. "</td>";
		//	echo "<td>Name: " . $cuName."</td>";
		//	echo "<td>data Proc: " . $dataProcessor."</td>";

		echo "<div class='results-table-layout'>";
/*		echo	"<!--   Headers   -->";
		echo	"<label class='results-table-header'>CUID</label>";
		echo	"<label class='results-table-header'>Name</label>";
		echo 	"<label class='results-table-header'>Data Processor</label>";
		echo	"<!--Empty label to skip a cell-->";
		echo	"<label></label>"; */
		
		$cuID1 = $cuID;		
		echo "<!--   Results   -->";
		echo "<!--Row 1-->";
		echo "<input type='text' name='cuID' id='cuID' value='{$cuID}'>";
		echo "<input type='text' name='cuName' id='cuName' value='{$cuName}'>";
		echo "<input type='text' name='dataProcessor' id='dataProcessor' value='{$dataProcessor}'>";
		echo "<a href=cu-page2.php?cuID='$cuID'>INFO</a>";
		
		
		//echo "<a href='cu-page2.php?cuID=<?php echo $cuID
		
		echo "</div>";
			
				//echo "<div id='sear'>";
		/*		echo "<tr>";
			
				echo "<td><input type='text' name='cuID' value='{$cuID}'/></td>";
				echo "<td><input type='text' name='cuName' value='{$cuName}'/></td>";
				echo "<td><input type='text' name='dataProcessor' value='{$dataProcessor}'/></td>";
				echo "<td><input type='text' name='inactive' value='{$inactive}'/></td>";
				echo "<td><input type='text' name='city' value='{$city}'/></td>";
				echo "<td><input type='text' name='us_state' value='{$us_state}'/></td>";
				echo "<td><input type='text' name='contactName' value='{$contactName}'/></td>";
				echo "<td><input type='text' name='contactInfo' value='{$contactInfo}'/></td>";
				echo "<td><input type='text' name='eRecipts' value='{$eRecipts}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$eReciptBranches}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$serverIP}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$sqlInstance}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$managePurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$tellerPurchaseDate}'/></td>";
				echo "<td><input type='text' name='eReciptBranches' value='{$thermalDateLastPurchase}'/></td>";
				
				echo "</tr>"; */
			//echo "</div>";
		echo "</form>";

	}
}

?>


</body>
<!---------------------------------->

</html>

