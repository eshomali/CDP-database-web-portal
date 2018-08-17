<!DOCTYPE HTML> 
<html lang="en-US">
<head>
    <title>Admin</title>
	<style>
		body{
			background-color:#f5f5DC;
			font-family: Arial;
		}
		#sear{
			width:15%;
			float:right;
		}
		#update{
			width:85%;
			float:left;
		}
		.tab{
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

.tab button{
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

.tab button:hover {
    background-color: #ddd;
}

.tab button.active {
    background-color: #ccc;
}

.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

	</style>
</head>

<body>
	<p></p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Search')">Search</button>
  <button class="tablinks" onclick="openCity(event, 'Update')">Update</button>
</div>

<div id="Search" class="tabcontent">
  <h3>Search</h3>
<form action="" method="GET" id="search">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
</form>
<form action ="" method="GET" style="height:50px; width:50px;"> 
  <input type="submit" class="button" name="view" value="View All" /> 
</form>
<form action ="" method="GET" style="height:50px; width:50px;"> 
  <input type="submit" class="button" name="save" value="Save" /> 
</form>



</div>

<div id="Update" class="tabcontent">
  <h3>Update</h3>
  <form action ="" method="post" style="height:50px; width:50px;">   
	<div id="update">
		ID
		<input type="text" name="id" /> <br><br>         
		CU Name:
		<input type="text" name="cuName" /><br><br>
		Data Processor:
		<input type="text" name="dataProcessor" /><br><br>
		inactive:
		<input type="text" name="inactive" /><br><br>
		city:
		<input type="text" name="city" /><br><br>
		us_state:
		<input type="text" name="us_state" /><br><br>
		contactName:
		<input type="text" name="contactName" /><br><br>
		contactInfo:
		<input type="text" name="contactInfo" /><br><br>
		eRecipts:
		<input type="text" name="eRecipts" /><br><br>
		eReciptBranches:
		<input type="text" name="eReciptBranches" /><br><br>
				<p></p>
		<p></p>

	</div>

</form>
<p></p>
</div>


<p></p>
 
</body>
<table>

<?php 

if($_GET){
	if(isset($_GET['view'])){
		view();
	}
	elseif(isset($_GET['query'])){
		search();
	}
		elseif(isset($_GET['save'])){
		save();
	}
}

if(isset($_POST['cuName'])){

	newSearch($_POST['cuName'],$_POST['id'],$_POST['dataProcessor'],
		    $_POST['inactive'],$_POST['city'],$_POST['us_state'],
			$_POST['contactName'],$_POST['contactInfo'],$_POST['eRecipts'],
			$_POST['eReciptBranches']);
}






function search(){

    mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());

    mysql_select_db("coral") or die(mysql_error());
	
    $query = $_GET['query'];
     
    $min_length = 3;
     
    if(strlen($query) >= $min_length){
         
        $query = htmlspecialchars($query);
        $query = mysql_real_escape_string($query);
        
        $raw_results = mysql_query("SELECT * FROM credit_union
            WHERE (`cuName` LIKE '%".$query."%') OR (`dataProcessor` LIKE '%".$query."%')") or die(mysql_error());
            
        if(mysql_num_rows($raw_results) > 0){
           	
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

				
				echo "<form action='' method='POST'>";
					echo "<div id='sear'>";
						echo "<tr>";
					
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
						
						echo "</tr>";
					echo "</div>";
					    
				echo "</form>";
				
            }
        }
        else{
            echo "No results";
        }
    }
    else{
        echo "Minimum length is ".$min_length;
    }
	



}

	function save(){
	
		define('DB_HOST', 'localhost');
	define('DB_NAME', 'coral'); 
	define('DB_USER', 'root'); 
	define('DB_PASSWORD', '5755Troy!');

	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$cuName = mysqli_real_escape_string($con,$cuName);
	$cuID = mysqli_real_escape_string($con,$id);
	$dataProcessor = mysqli_real_escape_string($con,$dataProcessor);
	$inactive = mysqli_real_escape_string($con,$inactive);
	$city = mysqli_real_escape_string($con,$city);
	$us_state = mysqli_real_escape_string($con,$us_state);
	$contactName = mysqli_real_escape_string($con,$contactName);
	$contactInfo = mysqli_real_escape_string($con,$contactInfo);
	$eRecipts = mysqli_real_escape_string($con,$eRecipts);
	$eReciptBranches = mysqli_real_escape_string($con,$eReciptBranches);
	$update = "UPDATE credit_union SET cuName = '$cuName', dataProcessor = '$dataProcessor', inactive = '$inactive', city = '$city', us_state = '$us_state', contactName = '$contactName', contactInfo = '$contactInfo', eRecipts = '$eRecipts', eReciptBranches = '$eReciptBranches' WHERE cuID = $cuID";
	if ($con->query($update) === TRUE){
		echo '<script language="javascript">';
		echo 'alert("Record updated successfully")';
		echo '</script>';
	} 
	else{
		echo "Error updating record: " . $con->error;
	}	
}





function updater($cuName,$id,$dataProcessor,
				 $inactive,$city,$us_state,
				 $contactName,$contactInfo,$eRecipts,
				 $eReciptBranches){

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'coral'); 
	define('DB_USER', 'root'); 
	define('DB_PASSWORD', '5755Troy!');

	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	$cuName = mysqli_real_escape_string($con,$cuName);
	$cuID = mysqli_real_escape_string($con,$id);
	$dataProcessor = mysqli_real_escape_string($con,$dataProcessor);
	$inactive = mysqli_real_escape_string($con,$inactive);
	$city = mysqli_real_escape_string($con,$city);
	$us_state = mysqli_real_escape_string($con,$us_state);
	$contactName = mysqli_real_escape_string($con,$contactName);
	$contactInfo = mysqli_real_escape_string($con,$contactInfo);
	$eRecipts = mysqli_real_escape_string($con,$eRecipts);
	$eReciptBranches = mysqli_real_escape_string($con,$eReciptBranches);

	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else if(!isset($cuName) || trim($cuName) == '' || !isset($cuID) || trim($cuID) == '' || !isset($dataProcessor) || trim($dataProcessor) == '' || !isset($inactive) || trim($inactive) == '' || !isset($city) || trim($city) == '' || !isset($us_state) || trim($us_state) == '' || !isset($contactName) || trim($contactName) == '' || !isset($contactInfo) || trim($contactInfo) == '' || !isset($eRecipts) || trim($eRecipts) == '' || !isset($eReciptBranches) || trim($eReciptBranches) == ''){
		echo '<script language="javascript">';
		echo 'alert("Please fill out all the fields")';
		echo '</script>';
	}
	else{
		$update = "UPDATE credit_union SET cuName = '$cuName', dataProcessor = '$dataProcessor', inactive = '$inactive', city = '$city', us_state = '$us_state', contactName = '$contactName', contactInfo = '$contactInfo', eRecipts = '$eRecipts', eReciptBranches = '$eReciptBranches' WHERE cuID = $cuID";
		if ($con->query($update) === TRUE){
			echo '<script language="javascript">';
			echo 'alert("Record updated successfully")';
			echo '</script>';
		} 
		else{
			echo "Error updating record: " . $con->error;
		}	
	}
	$con->close();
}


function newSearch($cuName,$id,$dataProcessor,
				 $inactive,$city,$us_state,
				 $contactName,$contactInfo,$eRecipts,
				 $eReciptBranches){

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'coral'); 
	define('DB_USER', 'root'); 
	define('DB_PASSWORD', '5755Troy!');

	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
    $query = $_GET['query'];
     
    $min_length = 3;
     
    if(strlen($query) >= $min_length){
         
        $query = htmlspecialchars($query);
        $query = mysql_real_escape_string($query);
        
        $raw_results = mysql_query("SELECT * FROM credit_union
            WHERE (`cuName` LIKE '%".$query."%') OR (`dataProcessor` LIKE '%".$query."%')") or die(mysql_error());
            
        if(mysql_num_rows($raw_results) > 0){
           	
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
				
				echo "<form action='' method='POST'>";
					echo "<div id='sear'>";
						echo "<tr>";
					
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
						
						echo "</tr>";
					echo "</div>";	
				echo "</form>";
				
            }
        }
        else{
        }
            echo "No results";
    }
    else{
        echo "Minimum length is ".$min_length;
    }
	

}


function view(){
	
	define('DB_HOST', 'localhost'); 
	define('DB_NAME', 'coral'); 
	define('DB_USER','root'); 
	define('DB_PASSWORD','5755Troy!');

	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con, "SELECT * FROM credit_union");

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

	while($row = mysqli_fetch_array($result)){

		$cuID = $row['cuID'];
		$cuName = $row['cuName'];
		$dataProcessor = $row['dataProcessor'];
		$inactive = $row['inactive'];
		$city = $row['city'];
		$us_state = $row['us_state'];
		$contactName = $row['contactName'];
		$contactInfo = $row['contactInfo'];
		$eRecipts = $row['eRecipts'];
		$eReciptBranches = $row['eReciptBranches'];
			
		echo "<form action='' method='POST'>";
		echo "<tr>";

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
		
		echo "</tr>";  
		echo "</form>";
	}
}



?>
</table>

<script>
function openCity(evt, cityName){
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

</html>



