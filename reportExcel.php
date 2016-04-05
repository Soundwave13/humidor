<?php
//ADJUST THE SETTING BELOW BASED ON YOUR
//SPECIFIC NEEDS
//forces the download of the file instead of (save or open)
header('Content-Disposition: attachment; filename=realEstateReportExcel.xls');
//"Expires: 0" means that a cache will always treat this entry as stale 
//so recent updates on the database are reflected in the excel rport
header('Expires: 0');
?>



<?php

//#1 INCLUDE CONSTANTS
include('constants.php');

//#2 - CREATE DATABASE CONNECTION: (needed to call function below)
$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

if (mysqli_connect_errno()) {
	echo "COULD NOT CONNECT TO DATABASE.";
	exit;
}

// #3 write query
	$query = "SELECT CigID, Name, RingGage, Brand, PurchaseDate, Manufacturer, PointOfSale, OriginCountry, Price, TypeShape, DateRemoved, Length, MfgDate, BoxCode 
	FROM cigarlist";
    
// #4 prepare statement
$stmt = mysqli_prepare($dbc,$query);

// #5 execute the statement
mysqli_stmt_execute($stmt);

//#6 bind variables to prepared statement
mysqli_stmt_bind_result($stmt,$CigId,$name,$rgauge,$brand,$pdate,$mfg,$pos,$ocountry,$price,$tshape,$dremoved,$length,$mdate,$bcode);
 
	//DISPLAY QUERY RESULTS WITHIN A TABLE
	echo "<table border='1'>";
	echo "<tr bgcolor='gray'><td>Cigar ID</td><td>Brand</td><td>Name</td><td>Manufacturer</td><td>Mfg. Date</td><td>Origin Country</td>
	<td>Shape</td><td>Ring Gauge</td><td>Length</td><td>Price</td><td>Purchase Date</td><td>Point of Sale</td><td>Box Code</td><td>Date Removed</td></tr>";
	//LOOP THROUGH ALL RESULTS
	while (mysqli_stmt_fetch($stmt)) {
		echo "<tr>";
		echo "<td>Cigar ID: $CigId</td>";
		echo "<td>$brand</td>";
		echo "<td>$name</td>";
		echo "<td>$mfg</td>";
		echo "<td>$mdate</td>";
		echo "<td>$ocountry</td>";
		echo "<td>$tshape</td>";
		echo "<td>$rgauge</td>";
		echo "<td>$length</td>";
		echo "<td>$price</td>";
		echo "<td>$pdate</td>";
		echo "<td>$pos</td>";
		echo "<td>$bcode</td>";
		echo "<td>$dremoved</td>";
    	echo "</tr>";
	}
	echo "</table>";
 
 ?>
</table>