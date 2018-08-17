<!DOCTYPE html>
<html lang="en-US">
<head>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="add-laser-page-css.css">
</head>
<body>
	<!--==========HEADER==========-->
	<label style="font-size: 40px">Add New Laser Printer</label>
	<hr>
	<form action='' method='GET'>
	<!--==========MAIN FORM==========-->
	<!--Refer to the css file for the grid-template-areas-->
	<div class="main-layout">
		<!--   Client/Printer Info   -->
		<!--Location-->
		<div style="grid-area: e">
			<label class="form-label">Location:</label>
		</div>
		<div style="grid-area: f">
			<input type="text" class="form-input-box" name="location" id="location">
		</div>
		<!--Active?-->
		<div style="grid-area: c">
			<input type="checkbox" name="lprinter-active" id="lprinter-active">
			<label class="form-checkbox-label">Active?</label>
		</div>
		<!--Subscribe?-->
		<div style="grid-area: d">
			<input type="checkbox" name="lprinter-subscribe" id="lprinter-subscribe">
			<label class="form-checkbox-label">Subscribe?</label>
		</div>
		<!--Solution Type-->
		<div style="grid-area: g">
			<label class="form-label">Solution Type:</label>
		</div>
		<div style="grid-area: a">
			<select name="sol-type" id="sol-type">
				<option value="LPS2">LPS2</option>
				<option value="LPS3">LPS3</option>
				<option value="Optra Forms">Optra Forms</option>
				<option value="Beagle">Beagle</option>
				<option value="None">None</option>
			</select>
		</div>
		<!--Admin PC-->
		<div style="grid-area: h">
			<label class="form-label">Admin PC:</label>
		</div>
		<div style="grid-area: i">
			<input type="text" class="form-input-box" name="client-name" id="client-name">
		</div>
		<!--PO Number-->
		<div style="grid-area: j">
			<label class="form-label">PO number:</label>
		</div>
		<div style="grid-area: k">
			<input type="text" class="form-input-box" id="po-number" name="po-number">
		</div>
		<!--Purchase Date-->
		<div style="grid-area: l">
			<label class="form-label">Purchase date:</label>
		</div>
		<div style="grid-area: m">
			<input type="text" class="form-input-box" id="purchase-date" name="purchase-date">
		</div>

		<!--Serial Number-->
		<div style="grid-area: p">
			<label class="form-label">Serial number:</label>
		</div>
		<div style="grid-area: q">
			<input type="text" class="form-input-box" id="serial-number" name="serial-number">
		</div>
		<!--Model-->
		<div style="grid-area: r">
			<label class="form-label">Model:</label>
		</div>
		<div style="grid-area: s">
			<select name="model-type" id="model-type" style="width: 75%">
				<option>E330</option>
				<option>E450</option>
				<option>E450-OF</option>
				<option>E460</option>
				<option>E462</option>
				<option>MS610</option>
				<option>MS617</option>
				<option>MS-617</option>
				<option>MS617dn</option>
				<option>MS810</option>
				<option>MS810dn</option>
				<option>MS817</option>
				<option>MS817N</option>
				<option>MX611de</option>
				<option>MX710</option>
				<option>T430</option>
				<option>t430n</option>
				<option>T520</option>
				<option>T522</option>
				<option>T610</option>
				<option>T612</option>
				<option>T614</option>
				<option>T620</option>
				<option>T622</option>
				<option>T630</option>
				<option>T632</option>
				<option>T634</option>
				<option>T640</option>
				<option>T640-OF</option>
				<option>T642</option>
				<option>T642-OF</option>
				<option>T650</option>
				<option>T652</option>
				<option>X464</option>
				<option>X652</option>
				<option>X654</option>
			</select>
		</div>
		<!--Orientation-->
		<div style="grid-area: t">
			<label class="form-label">Orientation:</label>
		</div>
		<div style="grid-area: u">
			<select name="orientation" id="orientation">
				<option value="portrait">Portrait</option>
				<option value="landscape">Landscape</option>
			</select>
		</div>
		<!--Pitch/LPP-->
		<div style="grid-area: v">
			<label class="form-label">Pitch:</label>
			<input type="text" style="width: 25%" name="pitch" id="pitch">
			<label class="form-label">LPP:</label>
			<input type="text" style="width: 25%" name="lpp" id="lpp">
		</div>
		<!--Locking?-->
		<div style="grid-area: w">
			<input type="checkbox" name="locking" id="locking">
			<label class="form-label">Locking?</label>
		</div>
		
		<!--   Interface Table   -->
		<fieldset style="grid-area: x">
			<div class="interface-layout">
				<!--   Headers   -->
				<label class="form-table-header">Interface</label>
				<label class="form-table-header">IP address</label>
				<label class="form-table-header">CFP</label>
				<label class="form-table-header">LPT</label>
				<label class="form-table-header">Emulation</label>
				<!--   Network   -->
				<label class="form-label">Network:</label>
				<input type="text" name="network-ip" id="network-ip">
				<input type="text" name="network-cfp" id="network-cfp">
				<input type="text" name="network-lpt" id="network-lpt">
				<select name="network-type" id="network-type">
					<option value="Smart">Smart</option>
					<option value="Epson09">Epson09</option>
				</select>
				<!--   USB   -->
				<label class="form-label">USB:</label>
				<input type="text" name="usb-ip" id="usb-ip">
				<input type="text" name="usb-cfp" id="usb-cfp">
				<input type="text" name="usb-lpt" id="usb-lpt">
				<select name="network-type2" id="network-type2">
					<option value="Smart">Smart</option>
					<option value="Epson09">Epson09</option>
				</select>
			</div>
		</fieldset>
		
		<!--Print Server Serial Number-->
		<div style="grid-area: y">
			<label class="form-label">Print server serial number:</label>
		</div>
		<div style="grid-area: z">
			<input type="text" class="form-input-box" name="print-server-serial-number" id="print-server-serial-number">
		</div>
		<!--Print Port Settings-->
		<div style="grid-area: aa">
			<label class="form-label">Print port settings:</label>
		</div>
		<div style="grid-area: bb">
			<select name="port-settings" id="port-settings" style="width: 65%">
				<option value="NIC">NIC</option>
				<option value="PAR">PAR</option>
				<option value="UCF">UCF</option>
				<option value="USB">USB</option>
			</select>
		</div>
		<!--Null filter-->
		<div style="grid-area: cc">
			<input type="checkbox" name="null-filter" id="null-filter">
			<label class="form-label">Null filter?</label>
		</div>
		
		<!--   Forms Loaded Table: Left   -->
		<fieldset style="grid-area: dd">
			<div class="table-left forms-loaded-layout">
				<!--   Table Headers   -->
				<!--Empty label to skip the first box>-->
				<label></label>
				<label class="form-table-header">Form type</label>
				<label class="form-table-header">Port</label>
				<label class="form-table-header">Tray</label>
				<label class="form-table-header">File name</label>
				<!--   Row 1   -->
				<input type="checkbox">
				<label class="form-label">Loans Plus</label>
				<select name="port-settings2" id="port-settings2">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings" id="tray-settings">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="loansplus-filename" id="loansplus-filename">
				<!--   Row 2   -->
				<input type="checkbox">
				<label class="form-label">Inquiries</label>
				<select name="port-settings3" id="port-settings3">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings2" id="tray-settings2">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="inquiries-filename" id="inquiries-filename">
				<!--   Row 3   -->
				<input type="checkbox">
				<label class="form-label">Reports</label>
				<select name="port-settings4" id="port-settings4">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings3" id="tray-settings3">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="reports-filename" id="reports-filename">
				<!--   Row 4   -->
				<input type="checkbox">
				<label class="form-label">Network Apps </label>
				<select name="port-settings5" id="port-settings5">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings4" id="tray-settings4">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="networkapps-filename" id="networkapps-filename">
				<!--   Row 5   -->
				<input type="checkbox">
				<label class="form-label">Check</label>
				<select name="port-settings6" id="port-settings6">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings5" id="tray-settings5">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="check-filename" id="check-filename">
				<!--   Row 6   -->
				<input type="checkbox">
				<label class="form-label">Cashier Checks</label>
				<select name="port-settings7" id="port-settings7">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings6" id="tray-settings6">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="cashierchecks-filename" id="cashierchecks-filename">
				<!--   Row 7   -->
				<input type="checkbox">
				<label class="form-label">Temp. Checks</label>
				<select name="port-settings8" id="port-settings8">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings7" id="tray-settings7">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="tempchecks-filename" id="tempchecks-filename">
				<!--   Row 8   -->
				<input type="checkbox">
				<label class="form-label">CD</label>
				<select name="port-settings9" id="port-settings9"> 
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings8" id="tray-settings8">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="cd-filename" id="cd-filename">
				<!--   Row 9   -->
				<input type="checkbox">
				<label class="form-label">Receipt</label>
				<select name="port-settings10" id="port-settings10">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings9" id="tray-settings9">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="receipt-filename" id="receipt-filename">
			</div>
		</fieldset>
		
		<!--   Forms Loaded Table: Right   -->
		<fieldset style="grid-area: ee">
			<div class="table-right forms-loaded-layout">
				<!--   Table Headers   -->
				<!--Empty label to skip the first box>-->
				<label></label>
				<label class="form-table-header">Form Type</label>
				<label class="form-table-header">Port</label>
				<label class="form-table-header">Tray</label>
				<label class="form-table-header">File Name</label>
				<!--   Row 1   -->
				<input type="checkbox">
				<label class="form-label">Loans Pay Cpn</label>
				<select name="port-settings11" id="port-settings11">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings10" id="tray-settings10">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="loanspaycpn-filename" id="loanspaycpn-filename">
				<!--   Row 2   -->
				<input type="checkbox">
				<label class="form-label">Maturity</label>
				<select name="port-settings12" id="port-settings12">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings11" id="tray-settings11">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="maturity-filename" id="maturity-filename">
				<!--   Row 3   -->
				<input type="checkbox">
				<label class="form-label">NSF</label>
				<select name="port-settings13" id="port-settings13">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings12" id="tray-settings12">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="nsf-filename" id="nsf-filename">
				<!--   Row 4   -->
				<input type="checkbox">
				<label class="form-label">Courrtesy Pay</label>
				<select name="port-settings14" id="port-settings14">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings13" id="tray-settings13">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="courtesypay-filename" id="courtesypay-filename">
				<!--   Row 5   -->
				<input type="checkbox">
				<label class="form-label">Neg. Overdraft</label>
				<select name="port-settings15" id="port-settings15">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings14" id="tray-settings14">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="negoverdraft-filename" id="negoverdraft-filename">
				<!--   Row 6   -->
				<input type="checkbox">
				<label class="form-label">Past Due</label>
				<select name="port-settings16" id="port-settings16">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings15" id="tray-settings15">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="pastdue-filename" id="pastdue-filename">
				<!--   Row 7   -->
				<input type="checkbox">
				<label class="form-label">Closed Acct.</label>
				<select name="port-settings17" id="port-settings17">
					<option value="NIC">NIC</option>
					<option value="PAR">PAR</option>
					<option value="UCF">UCF</option>
					<option value="USB">USB</option>
				</select>
				<select name="tray-settings16" id="tray-settings16">
					<option value="tray-1">1</option>
					<option value="tray-2">2</option>
					<option value="tray-3">3</option>
					<option value="tray-4">4</option>
					<option value="tray-5">5</option>
				</select>
				<input type="text" name="closedacct-filename" id="closedacct-filename">
			</div>
		</fieldset>
		
		<!--   Notes   -->
		<div style="grid-area: ff">
			<label style="font-size: 20px">Notes</label>
			<textarea class="notes-box" name="notes" id="notes"></textarea>
		</div>
		
		<!--CONFIRM-->
		<div style='grid-area: gg'>
			<button class="confirm-button">CONFIRM</button>
		</div>
	</div>
</form>



<?php

if(isset($_GET['client-name'], $_GET['location'],$_GET['po-number'], 
		 $_GET['purchase-date'],$_GET['serial-number'],
		 $_GET['pitch'],$_GET['lpp'],$_GET['network-ip'],
		 $_GET['network-cfp'],$_GET['network-lpt'],$_GET['usb-ip'],
		 $_GET['usb-cfp'],$_GET['usb-lpt'],$_GET['print-server-serial-number'],
		 $_GET['receipt-filename'],$_GET['closedacct-filename'],$_GET['notes'])){ 
	
	$cuID = 1; //get from passed value from link
	
	$get_clientname = $_GET['client-name'];
	$get_location = $_GET['location'];
	$get_ponumber = $_GET['po-number'];
	$get_purchase = $_GET['purchase-date'];
	$get_serial = $_GET['serial-number'];
	$get_pitch = $_GET['pitch'];
	$get_lpp = $_GET['lpp'];
	$get_networkip = $_GET['network-ip'];
	$get_networkcfp = $_GET['network-cfp'];
	$get_networklpt = $_GET['network-lpt'];
	$get_usbip = $_GET['usb-ip'];
	$get_usbcfp = $_GET['usb-cfp'];
	$get_usblpt = $_GET['usb-lpt'];
	$get_printserver = $_GET['print-server-serial-number'];
	$get_receipt = $_GET['receipt-filename'];
	$get_closedacct = $_GET['closedacct-filename'];
	$get_notes = $_GET['notes'];
		 
	
	save($cuID,$get_clientname,$get_location,$get_ponumber,
		 $get_purchase,$get_serial,$get_pitch,
		 $get_lpp,$get_networkip,$get_networkcfp,$get_usbip,
		 $get_usbcfp,$get_usblpt,$get_printserver,$get_receipt,
		 $get_closedacct,$get_notes);
}


function save($cuID,$get_clientname,$get_location,$get_ponumber,
			  $get_purchase,$get_serial,$get_pitch,
			  $get_lpp,$get_networkip,$get_networkcfp,$get_usbip,
			  $get_usbcfp,$get_usblpt,$get_printserver,$get_receipt,
			  $get_closedacct,$get_notes){ 
					
	mysql_connect("localhost", "root", "5755Troy!") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("coral") or die(mysql_error());
	
	$cuID = htmlspecialchars(mysql_real_escape_string($cuID));
	$clientname = htmlspecialchars(mysql_real_escape_string($get_clientname));
	$location = htmlspecialchars(mysql_real_escape_string($get_location));
	$ponumber = htmlspecialchars(mysql_real_escape_string($get_ponumber));
	$purchase = htmlspecialchars(mysql_real_escape_string($get_purchase));
	$serial = htmlspecialchars(mysql_real_escape_string($get_serial));
	$pitch = htmlspecialchars(mysql_real_escape_string($get_pitch));
	$lpp = htmlspecialchars(mysql_real_escape_string($get_lpp));
	$networkip = htmlspecialchars(mysql_real_escape_string($get_networkip));
	$networkcfp = htmlspecialchars(mysql_real_escape_string($get_networkcfp));
	$usbip = htmlspecialchars(mysql_real_escape_string($get_usbip));
	$usbcfp = htmlspecialchars(mysql_real_escape_string($get_usbcfp));
	$usblpt = htmlspecialchars(mysql_real_escape_string($get_usblpt));
	$printserver = htmlspecialchars(mysql_real_escape_string($get_printserver));
	$receipt = htmlspecialchars(mysql_real_escape_string($get_receipt));
	$closedacct = htmlspecialchars(mysql_real_escape_string($get_closedacct));
	$notes = htmlspecialchars(mysql_real_escape_string($get_notes));
	
	//echo "<script language='javascript'>";
	//echo "alert('$dataProcessor')";
	//echo "</script>";
	
	$add_results = mysql_query("INSERT INTO laser (cuID, location, adminPC, PO, purchaseDate, warranty,
													serialNumber, pitch, LPP, net_IP, net_cfp, par_IP,
													par_cfp, par_lpt, printServerSerial, recpt_filename, closedAccount, notes)
								VALUES ('$cuID', '$location', '$clientname', '$ponumber', '$purchase', '$warranty',
										'$serial', '$pitch', '$lpp', '$networkip', '$networkcfp', '$usbip',
										'$usbcfp', '$usblpt', '$printserver', '$receipt', '$closedacct', '$notes') ") or die(mysql_error());
	
	$addwarranty = mysql_query("SELECT DATEADD(year, 4, purchase) AS warranty FROM laser WHERE cuID = '$cuID' ") or die(mysql_error());

	$raw_results = mysql_query("SELECT * FROM laser WHERE cuID = '$cuID' ") or die(mysql_error());
	
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