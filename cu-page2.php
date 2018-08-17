<!DOCTYPE html>
<html>
<head>
	 <link href="https: //fonts.googleapis.com/css?family=Lato: 400,400i,700,700i,900' rel='stylesheet">
	 <link rel="stylesheet" type="text/css" href="cu-page-css.css">
 </head>
 <body>
	<!--Search Option 1: Name/Data Processor-->
	<form action="" method="POST">
		<div class="form-label">
			<!--input onclick="clear()" type="submit" name="edit" value="EDIT"></input-->
			<button id="edit" name="edit">EDIT</button>
			<input type="submit" id="save" name="save" value="SAVE"></input>
		</div>
	</form>
	
	
	
	
	

 <?php
 
 	global $cuID;
	global $cuName;
	global $dataProcessor;
	
	
if(isset($_POST['edit'])){

	edit();

}

	//Using GET
	
	$cuID = str_replace("'", "", $_GET['cuID']); //passed from search page
 
	// connect to the DB
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
	mysql_select_db("coral") or die(mysql_error());

	/* Testing */
		//$cuID = mysql_real_escape_string($cuID);
		//echo "<script language='javascript'>";
		//echo "alert($cuID)";
		//echo "</script>";

	$cu_results = mysql_query("SELECT * FROM credit_union WHERE cuID = '$cuID' limit 1") or die(mysql_error());

	$results = mysql_fetch_array($cu_results);
	
	$cuID = $results['cuID'];
	$cuName = $results['cuName'];
	$dataProcessor = $results['dataProcessor'];
	
	//$cuNumber = $results['cuNumber']; //not yet implemented in DB
	$contactName = $results['contactName'];
	$contactInfo = $results['contactInfo'];
	$city = $results['city'];
	$us_state = $results['us_state'];
	$eRecipts = $results['eRecipts'];
	$eReciptBranches = $results['eReciptBranches'];
	$eSignSeats = $results['eSignSeats'];
	$eSignType = $results['eSignType'];
	
	//checkboxes
	$DCN = $results['DCN'];
	$iDS = $results['iDS'];
	$inactive = $results['inactive'];
	$customURL = $results['customURL'];
	$brandedPortal = $results['brandedPortal'];
	$transPort = $results['transPort'];
	$sigSales = $results['sigSales'];
	$printForward = $results['printForward'];
	$antiSpam = $results['antiSpam'];
	$eReciptsBox = $results['eReciptsBox'];
	$txtReciptsBox = $results['txtReciptsBox'];
	$thermalMasking = $results['thermalMasking'];

	echo "<!--==========HEADER==========-->";
	echo "<label style='font-size:  40px'>Credit Union Name: </label>";
	echo "<input type='text' name='cuName' id='cuName' value='{$cuName}'>";
	echo "<hr>";
	
	echo "<!--==========MAIN FORM==========-->";
	echo "<div class='main-layout'>";
	
		echo "<!--CUID-->";
		echo "<div style='grid-area:  a'>";
			echo "<label class='form-label'>CUID: </label>";
			echo "<input type='text' name='cuid' id='cuid' value='{$cuID}'>";
		echo "</div>";
		
		echo "<!--Data Processor-->";
		echo "<div style='grid-area:  b'>";
			echo "<label class='form-label'>Data processor:  </label>";
			echo "<input type='text' name='data-processor' id='data-processor' value='{$dataProcessor}' style='width:  350px;' >";
	echo "</div>";
/*	
		echo "<!--CU Number-->";
		echo "<div style='grid-area:  c'>";
			echo "<label class='form-label'>CU Number:  </label>";
			echo "<input type='text' name='cu-number' id='cu-number' value='{$cuNumber}' style='width:  350px;'>";
		echo "</div>";		
*/

// we have to figure out how to convert 0/1 from DB to check/uncheck on here
		echo "<!--inactive?-->";
		echo "<div style='grid-area:  d'>";
			echo "<input type='checkbox' name='inactive' id='inactive' checked='{$inactive}'>";
			echo "<label class='form-checkbox-label'>inactive? </label>";
		echo "</div>";
		
		echo "<!--DCN/iDS?-->";
		echo "<div  style='grid-area:  e'>";
			echo "<input type='checkbox' name='dcn' id='dcn' checked='{$DCN}'>";
			echo "<label class='form-checkbox-label'>DCN?</label>";
			echo "<input type='checkbox' name='ids' id='ids' checked='{$iDS}'>";
			echo "<label class='form-checkbox-label'>iDS? </label>";
		echo "</div>";
		
		echo "<!--   Contact Information   -->";
		echo "<div style='grid-area:  g'>";
			echo "<fieldset>";
				echo "<legend style='font-size:  22px;'>Contact Information </legend>";
				echo "<!--Name-->";
				echo "<label class='form-label'>Name </label><br>";
				echo "<input type='text' name='contact-name' id='contact-name' value='{$contactName}' style='width: 600px;'><br>";
				
				echo "<!--Email-->";
				echo "<label class='form-label'>Email </label><br>";
				echo "<input type='text' style='width:  600px' name='contact-email' id='contact-email' value='{$contactInfo}'>";
			echo "</fieldset>";
		echo "</div>";
		
		echo "<!--   Location   -->";
		echo "<div style='grid-area:  f'>";
			echo "<fieldset>";
				echo "<legend style='font-size:  22px;'>Location </legend>";
				echo "<!--City-->";
				echo "<label class='form-label'>City </label><br>";
				echo "<input type='text' style='width:  250px' name='city' id='city' value='{$city}'><br>";
				
				echo "<!--State/Country-->";
				echo "<label class='form-label'>State/Country </label><br>";
				echo "<input type='text' style='width:  250px' name='state' id='state' value='{$us_state}'><br>";
				echo "<!---->";
				echo "<label class='form-label'>ZIP Code </label><br>";
				echo "<input type='text' style='width:  250px' name='zip' id='zip'>"; //not sure if ZIP is included in DB
			echo "</fieldset>";
		echo "</div>";
	echo "</div>";
	
	
	
	
	echo "<!--==========ADDITIONAL INFO==========-->";
	echo "<div class='addl-layout'>";
		
		echo "<!--CustomURL-->";
		echo "<div style='grid-area:  A'>";
			echo "<input type='checkbox' name='customurl' id='customurl' checked='{$customURL}'>";
			echo "<label class='form-label'>CustomURL </label>";
		echo "</div>";
		
		echo "<!--Branded Portal-->";
		echo "<div style='grid-area:  B'>";
			echo "<input type='checkbox' name='branded-portal' id='branded-portal' checked='{$brandedPortal}'>";
			echo "<label class='form-label'>Branded Portal </label>";
		echo "</div>";
		
		echo "<!--transPort-->";
		echo "<div style='grid-area:  C'>";
			echo "<input type='checkbox' name='transPort' id='transPort' checked='{$transPort}'>";
			echo "<label class='form-label'>transPort </label>";
		echo "</div>";
		
		echo "<!--Sig Sales-->";
		echo "<div style='grid-area:  D'>";
			echo "<input type='checkbox' name='sig-sales' id='sig-sales' checked='{$sigSales}'>";
			echo "<label class='form-label'>Sig Sales </label>";
		echo "</div>";
		
		echo "<!--Print Forward-->";
		echo "<div style='grid-area:  E'>";
			echo "<input type='checkbox' name='print-forward' id='print-forward' checked='{$printForward}'>";
			echo "<label class='form-label'>Print Forward </label>";
		echo "</div>";
		
		echo "<!--Anti-Spam-->";
		echo "<div style='grid-area:  F'>";
			echo "<input type='checkbox' name='anti-spam' id='anti-spam' checked='{$antiSpam}'>";
			echo "<label class='form-label'>Anti-Spam </label>";
		echo "</div>";

		echo "<!--eReceipts-->";
		echo "<div style='grid-area:  G'>";
			echo "<input type='checkbox' name='ereceipts-box' id='ereceipts-box' checked='{$eReciptsBox}'>";
			echo "<label class='form-label'>eReceipts </label>";
		echo "</div>";
		
		echo "<!--eBranches-->";
		echo "<div style='grid-area:  H'>";
			echo "<label class='form-label'>eBranches:  </label>";
			echo "<input type='text' name='ereceipts-branches' id='ereceipts-branches' value='{$eRecipts}'>";
		echo "</div>";
		
		echo "<!--Text Receipts-->";
		echo "<div style='grid-area:  I'>";
			echo "<input type='checkbox' name='text-receipts-box' id='text-receipts-box' checked='{$txtReciptsBox}'>";
			echo "<label class='form-label'>Text Receipts </label>";
		echo "</div>";
		
		echo "<!--Text Branches-->";
		echo "<div style='grid-area:  J'>";
			echo "<label class='form-label'>Text Branches:  </label>";
			echo "<input type='text' name='text-receipts-branches' id='text-receipts-branches' value='{$eReciptBranches}'>";
		echo "</div>";
		
		echo "<!--   eSign   -->";
		echo "<div style='grid-area:  K'>";
			echo "<label style='font-size:  20px'>eSign </label>";
		echo "</div>";
		echo "<!--Type-->";
		echo "<div style='grid-area:  L'>";
			echo "<label class='form-label'>Type:  </label>";
			echo "<select>";
				echo "<option value='transactions'>Transactions </option>";
				echo "<option value='users'>Users </option>";
			echo "</select>";
		echo "</div>";
		
		echo "<!--Seats-->";
		echo "<div style='grid-area:  M'>";
			echo "<label class='form-label'>Seats:  </label>";
			echo "<input type='text' name='type-esign' id='type-esign' value='{$eSignSeats}'>";
		echo "</div>";
		
		echo "<!--   Email Encryption   -->";
		echo "<div style='grid-area:  N'>";
			echo "<label style='font-size:  20px'>Email encryption </label>";
		echo "</div>";
		echo "<!--Type-->";
		echo "<div style='grid-area:  O'>";
			echo "<label class='form-label'>Type: </label>";
			echo "<select>";
				echo "<option value='appliance'>Appliance </option>";
				echo "<option value='hosted'>Hosted </option>";
				echo "<option value='zixmail'>ZixMail </option>";
			echo "</select>";
		echo "</div>";
		echo "<!--Seats-->";
		echo "<div style='grid-area:  P'>";
			echo "<label class='form-label'>Seats:  </label>";
			echo "<input type='text' name='type-esign' id='type-esign' value='{$eSignType}'>";
		echo "</div>";
		
		echo "<!--   Client Databases   -->";
		echo "<div style='grid-area:  Q'>";
			echo "<fieldset>";
				echo "<legend style='font-size:  22px;'>Client Databases </legend>";
				echo "<div class='db-layout'>";
					echo "<!--Teller-->";
					echo "<label class='form-layout'>Teller:  </label>";
					echo "<input type='text' name='db-teller' id='db-teller'>";
					echo "<!--eTeller-->";
					echo "<label class='form-layout'>eTeller:  </label>";
					echo "<input type='text' name='db-eteller' id='db-eteller'>";
					echo "<!--Manage-->";
					echo "<label class='form-layout'>Manage:  </label>";
					echo "<input type='text' name='db-manage' id='db-manage'>";
					echo "<!--Additional Manage-->";
					echo "<label class='form-layout'>Additional Manage:  </label>";
					echo "<input type='text' name='db-addl-manage' id='db-addl-manage'>";
				echo "</div>";
			echo "</fieldset>";
		echo "</div>";
		
		echo "<!--   DMS Login Info   -->";
		echo "<div style='grid-area:  R'>";
			echo "<fieldset>";
				echo "<legend style='font-size:  22px;'>DMS </legend>";
				echo "<div class='dms-layout'>";
					echo "<!--Login-->";
					echo "<label class='form-label'>Login:  </label>";
					echo "<input type='text' name='dms-login' id='dms-login'>";
					echo "<!--Password-->";
					echo "<label class='form-label'>Password:  </label>";
					echo "<input type='text' name='dms-pass' id='dms-pass'>";
				echo "</div>";
			echo "</fieldset>";
		echo "</div>";
		
		echo "<!--   Server Info   -->";
		echo "<div style='grid-area:  S'>";
			echo "<div class='server-layout'>";
				echo "<!--IP-->";
				echo "<label class='form-label'>Server IP:  </label>";
				echo "<input type='text' name='server-ip' id='server=ip'>";
				echo "<!--Name-->";
				echo "<label class='form-label'>Server Name:  </label>";
				echo "<input type='text' name='server-name' id='server-name'>";
				echo "<!--Version-->";
				echo "<label class='form-label'>Server OS Version:  </label>";
				echo "<input type='text' name='server-version' id='server-version'>";
			echo "</div>";
		echo "</div>";
		
		echo "<!--   SQL Info   -->";
		echo "<div style='grid-area:  T'>";
			echo "<div class='sql-layout'>";
				echo "<!--Instance-->";
				echo "<label class='form-label'>SQL Instance:  </label>";
				echo "<input type='text' name='sql-instance' id='sql-instance'>";
				echo "<!--Version-->";
				echo "<label class='form-label'>SQL Version:  </label>";
				echo "<input type='text' name='sql-version' id='sql-version'>";
			echo "</div>";
		echo "</div>";
		
		echo "<!--   eTeller Info   -->";
		echo "<div style='grid-area:  U'>";
			echo "<div class='eteller-layout'>";
				echo "<!--Mode-->";
				echo "<label class='form-label'>eTeller Mode:  </label>";
				echo "<select>";
					echo "<option value='option-1'>Option 1</option>";
					echo "<option value='option-2'>Option 2</option>";
				echo "</select>";
				echo "<!--Receiver-->";
				echo "<label class='form-label'>eTeller Receiver:  </label>";
				echo "<input type='text' name='eteller-receiver' id='eteller-receiver'>";
				echo "<!--WebSv-->";
				echo "<label class='form-label'>eTeller WebSv:  </label>";
				echo "<input type='text' name='eteller-websv' id='eteller-websv'>";
			echo "</div>";
		echo "</div>";
		
		echo "<!--   Other Info   -->";
		echo "<div style='grid-area:  V'>";
			echo "<div class='other-layout'>";
				echo "<!--Branch Number-->";
				echo "<label class='form-label'>Branch number:  </label>";
				echo "<input type='text' name='branch-number' id='branch-number'>";
				echo "<!--CD Version-->";
				echo "<label class='form-label'>CD Version:  </label>";
				echo "<input type='text' name='cd-version' id='cd-version'>";
				echo "<!--SMS Number-->";
				echo "<label class='form-label'>SMS Number:  </label>";
				echo "<input type='text' name='sms-number' id='sms-number'>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	
	
	
	echo "<!--==========COLLAPSIBLE TABS==========-->";
	echo "<div class='collapsible-layout'>";
		
		echo "<!--   Licenses   -->";
		echo "<div class='item6'>";
			echo "<button class='collapsible'>Licenses </button>";
			echo "<div class='licenses'>";
				echo "<div class='licenses-info'>";
					echo "<label class='licenses-info-label'> </label>";
					echo "<label style='font-size:  14px'># of Licenses:  </label>";
					echo "<label style='font-size:  14px'>Last change:  </label>";
					echo "<label class='licenses-info-label-title'>Teller </label>";
					echo "<input type='text' name='licenses-teller' id='licenses-teller'>";
					echo "<input type='text' name='changedate-teller' id='changedate-teller'>";
					echo "<label class='licenses-info-label-title'>Manage </label>";
					echo "<input type='text' name='licenses-manage' id='licenses-manage'>";
					echo "<input type='text' name='changedate-manage' id='changedate-manage'>";
					echo "<label class='licenses-info-label-title'>Scanning Station </label>";
					echo "<input type='text' name='licenses-ss' id='licenses-ss'>";
					echo "<input type='text' name='changedate-ss' id='changedate-ss'>";
					echo "<label class='licenses-info-label-title'>E-Capsule </label>";
					echo "<input type='text' name='licenses-ecapsule' id='licenses-ecapsule'>";
					echo "<input type='text' name='changedate-ecapsule' id='changedate-ecapsule'>";
					echo "<label class='licenses-info-label-title'>ScanID </label>";
					echo "<input type='text' name='licenses-scanid' id='licenses-scanid'>";
					echo "<input type='text' name='changedate-scanid' id='changedate-scanid'>";
					echo "<label class='licenses-info-label-title'>Scanport </label>";
					echo "<input type='text' name='licenses-scanport' id='licenses-scanport'>";
					echo "<input type='text' name='changedate-scanport' id='changedate-scanport'>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		
		echo "<!--   Thermal Printers   -->";
		echo "<div class='item7'>";
			echo "<button class='collapsible'>Thermal Printers </button>";
			echo "<div class='thermal'>";
				echo "<div class='thermal-info'>";
					echo "<!--   Thermal Masking?   -->";
					echo "<div class='tinfo1'>";
						echo "<input type='checkbox' name='thermal-masking' id='thermal-masking' checked='{$thermalMasking}'>";
						echo "<label class='thermal-info-label'>Thermal Masking? </label>";
					echo "</div>";
					echo "<!--   Color   -->";
					echo "<div class='tinfo2'>";
						echo "<label class='thermal-info-label'>Color:  </label>";
						echo "<select>";
							echo "<option value='black'>Black </option>";
							echo "<option value='white'>White </option>";
						echo "</select>";
					echo "</div>";
					echo "<!--   Font Size   -->";
					echo "<div class='tinfo3'>";
						echo "<label class='thermal-info-label'>Font Size:  </label>";
						echo "<select>";
							echo "<option value='regular'>Regular </option>";
							echo "<option value='large'>Large </option>";
						echo "</select>";
					echo "</div>";
					echo "<!--   Duplicate   -->";
					echo "<div class='tinfo4'>";
						echo "<label class='thermal-info-label'>Duplicate: </label>";
						echo "<select>";
							echo "<option value='off'>Off (1-Page)</option>";
							echo "<option value='on'> On (2-Page)</option>";
						echo "</select>";
					echo "</div>";
					echo "<!--   Notes   -->";
					echo "<div class='tinfo5'>";
						echo "<label class='thermal-info-label'>Notes </label><br>";
						echo "<textarea class='thermal-notes-box'></textarea>";
					echo "</div>";
					
					echo "<!--   Printer Information   -->";
					echo "<div class='tinfo6'>";
						echo "<label style='font-size:  20px'>Printers </label>";
						echo "<button>ADD NEW THERMAL PRINTER </button><br>";
						echo "<div class='thermal-printer-table'>";
							echo "<input type='text' name='tid' id='tid'>";
							echo "<input type='text' name='serial-num' id='serial-num'>";
							echo "<input type='text' name='module' id='module'>";
							echo "<input type='text' name='date-purchased' id='date-purchased'>";
							echo "<input type='text' name='warranty-expiration' id='warranty-expiration'>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		
		echo "<!--   Laser Printers   -->";
		echo "<div class='item8'>";
			echo "<button class='collapsible'>Laser Printers </button>";
			echo "<div class='laser'>";
				echo "<div class='notes-table'>";
					echo "<label style='font-size:  20px'>Credit Union Specific Notes </label>";
					echo "<label style='font-size:  20px'> Billing Notes </label>";
					echo "<textarea class='notes-box'> </textarea>";
					echo "<textarea class='notes-box'> </textarea>";
				echo "</div>";
				echo "<div class='laser-info'>";
					echo "<label class='laser-info-label'>Model Number </label>";
					echo "<label class='laser-info-label'>Network Address </label>";
					echo "<label class='laser-info-label'>USB Address </label>";
					echo "<label class='laser-info-label'> </label>";
					echo "<input type='text' name='model-number' id='model-number'>";
					echo "<input type='text' name='network-address' id='network-address'>";
					echo "<input type='text' name='usb-address' id='usb-address'>";
					echo "<a href='laser-printer-info.html'>INFO </a>";
					echo "<input type='text'>";
					echo "<input type='text'>";
					echo "<input type='text'>";
					echo "<a href='laser-printer-info.html'>INFO </a>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		
		echo "<!--   Notes   -->";
		echo "<div class='item9'>";
			echo "<button class='collapsible'>Notes </button>";
			echo "<div class='notes'>";
				echo "<div class='notes-table'>";
					echo "<label style='font-size:  20px'>General Notes </label>";
					echo "<label style='font-size:  20px'>Technical Notes </label>";
					echo "<textarea class='notes-box'></textarea>";
					echo "<textarea class='notes-box'></textarea>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";	
	
	//pass variables
	//save($cuID,$cuName,$dataProcessor);
	//echo "<script language='javascript'>";
	//echo "alert('$cuName')";
	//echo "</script>";

	
function edit(){
	global $cuID;
	global $cuName;
	global $dataProcessor;
	$pass = array("$cuID", "$cuName", "$dataProcessor");  //[0], [1], [2]
	return($pass);
}

if(isset($_POST['save'])){
	
	save();
	//echo "<script language='javascript'>";
	//echo "alert($cuName)";
	//echo "</script>";

}



function save(){
	
	global $cuID;
	global $cuName;
	global $dataProcessor;
	
	//$cuName1 = edit()->$cuName;
	$pass = edit();
	
	echo "<script language='javascript'>";
	echo "alert('$pass[1]')";
	echo "</script>";
	
	$cuID = $pass[0];
	$cuName = $pass[1];
	$dataProcessor = $pass[2];
	
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
	mysql_select_db("coral") or die(mysql_error());
	
	//$update = "UPDATE credit_union SET cuName = '$cuName', dataProcessor = '$dataProcessor' WHERE cuID = $cuID";
	
	//$cuID = $results['cuID'];
	//$cuName = $results['cuName'];
	//$dataProcessor = $results['dataProcessor'];

} 
?>

	 <!--   Script for the Collapsible   -->
	 <script>
		var coll = document.getElementsByClassName('collapsible');
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener('click', function() {
			this.classList.toggle('inactive');
			var content = this.nextElementSibling;
			if (content.style.display === 'block') {
			  content.style.display = 'none';
			} else {
			  content.style.display = 'block';
			}
		  });
		}
		
		// all checkboxes (make sure $PHP variables matches above)
		var dcn_box = document.getElementById("dcn");
		var ids_box = document.getElementById("ids");
		var inactive_box = document.getElementById("inactive");
		var customURL_box = document.getElementById("customurl");
		var brandedPortal_box = document.getElementById("branded-portal");
		var transPort_box = document.getElementById("transPort");
		var sigSales_box = document.getElementById("sig-sales");
		var printForward_box = document.getElementById("print-forward");
		var antiSpam_box = document.getElementById("anti-spam");
		var eReceipts_box = document.getElementById("ereceipts-box");
		var txtRecipts_box = document.getElementById("text-receipts-box");
		var thermalMasking_box = document.getElementById("thermal-masking");
		
		//(make sure these PHP variables matche PHP variables above)
		var DCN = "<?php echo $DCN ?>";
		var iDS = "<?php echo $iDS ?>";
		var inactive = "<?php echo $inactive ?>";
		var customURL = "<?php echo $customURL ?>";
		var brandedPortal = "<?php echo $brandedPortal ?>";
		var transPort = "<?php echo $transPort ?>";
		var sigSales = "<?php echo $sigSales ?>";
		var printForward = "<?php echo $printForward ?>";
		var antiSpam = "<?php echo $antiSpam ?>";
		var eReciptsBox = "<?php echo $eReciptsBox ?>";
		var txtReciptsBox = "<?php echo $txtReciptsBox ?>";
		var thermalMasking = "<?php echo $thermalMasking ?>";
		
		if (DCN == 1) dcn_box.checked = true;
		if (DCN == 0) dcn_box.checked = false;
			
		if (iDS == 1) ids_box.checked = true;
		if (iDS == 0) ids_box.checked = false;
		
		if (inactive == 1) inactive_box.checked = true;
		if (inactive == 0) inactive_box.checked = false;
		
		if (customURL == 1) customURL_box.checked = true;
		if (customURL == 0) customURL_box.checked = false;
		
		if (brandedPortal == 1) brandedPortal_box.checked = true;
		if (brandedPortal == 0) brandedPortal_box.checked = false;
		
		if (transPort == 1) transPort_box.checked = true;
		if (transPort == 0) transPort_box.checked = false;
		
		if (sigSales == 1) sigSales_box.checked = true;
		if (sigSales == 0) sigSales_box.checked = false;
		
		if (printForward == 1) printForward_box.checked = true;
		if (printForward == 0) printForward_box.checked = false;
		
		if (antiSpam == 1) antiSpam_box.checked = true;
		if (antiSpam == 0) antiSpam_box.checked = false;
		
		if (eReciptsBox == 1) eReceipts_box.checked = true;
		if (eReciptsBox == 0) eReceipts_box.checked = false;
		
		if (txtReciptsBox == 1) txtRecipts_box.checked = true;
		if (txtReciptsBox == 0) txtRecipts_box.checked = false;
		
		if (thermalMasking == 1) thermalMasking_box.checked = true;
		if (thermalMasking == 0) thermalMasking_box.checked = false;

		
/*		
var clear(){
	
	//document.body.innerHTML = '';
	var write = document.getElementById("write"); 
    var readonly = document.getElementById("readonly") //invisible
	
    if (write.style.display == "none"){
        write.style.display = "block";
        readonly.style.display = "none";
    }
    else{
        write.style.display = "none";
        readonly.style.display = "block";
    }

}

*/	
		
	 </script>

	 
</body>
</html>
