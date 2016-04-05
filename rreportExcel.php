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
	$query = "SELECT ReviewID,CigarID,ReviewDate,Blend,Strength,Construction,FlavorProfile,Burn,Pairing,Overall,Score 
	FROM review";
    
// #4 prepare statement
$stmt = mysqli_prepare($dbc,$query);

// #5 execute the statement
mysqli_stmt_execute($stmt);

//#6 bind variables to prepared statement
mysqli_stmt_bind_result($stmt,$revid,$cigid,$date,$blend,$strength,$const,$flav,$burn,$pair,$overall,$score);
 
	//DISPLAY QUERY RESULTS WITHIN A TABLE
	echo "<table border='1'>";
	echo "<tr bgcolor='gray'><td>Review ID</td><td>Cigar ID</td><td>Date</td><td>Blend</td><td>Strength</td><td>Construction</td>
	<td>Flavor Profile</td><td>Burn Characteristics</td><td>Paired beverage</td><td>Overall Impressions</td><td>Score</td></tr>";
	//LOOP THROUGH ALL RESULTS
	while (mysqli_stmt_fetch($stmt)) {
		echo "<tr>";
		echo "<td>Review ID: $revid</td>";
		echo "<td>$cigid</td>";
		echo "<td>$date</td>";
		echo "<td>$blend</td>";
		echo "<td>$strength</td>";
		echo "<td>$const</td>";
		echo "<td>$flav</td>";
		echo "<td>$burn</td>";
		echo "<td>$pair</td>";
		echo "<td>$overall</td>";
		echo "<td>$score</td>";
    	echo "</tr>";
	}
	echo "</table>";
 
 ?>
</table>