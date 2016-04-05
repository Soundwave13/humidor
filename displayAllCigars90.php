<?php

include('beginningOfFile.php');

//CONNECT TO THE DATABASE -- WITH A VALID USER ID THAT HAS PERMISSION FOR THIS DATABASE:
include("constants.php");
$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

//MAKE SURE WE HAVE A GOOD CONNECTION:
if (mysqli_connect_errno()) {

     echo 'ERROR -- COULD NOT CONNECT TO DB';
     exit;
}

//WRITE YOUR QUERY
$query = 'SELECT r.CigarID, c.Brand, c.Name, c.TypeShape, c.Price, r.Score 
FROM review r, cigarlist c 
WHERE c.CigID = r.CigarID 
AND Score >= 90 
order by CigarID';

//prepare statement
$stmt = mysqli_prepare($dbc,$query);

//execute the statement
mysqli_stmt_execute($stmt);

//bind variables to prepared statement
mysqli_stmt_bind_result($stmt,$CigId,$Brand,$Name,$TypeShape,$Price, $Score);
?>

<div class="container">
	<form id='analyze'>
	
<?php
//WRITE THE RESULTS OF THE QUERY BELOW
	echo "<table class='analyze'>";
		echo "<tr><td>Cigar ID</td><td>Brand</td><td>Name</td><td>Shape</td><td>Price</td><td>Score</td></tr>";
		//LOOP THROUGH EACH ROW THE QUERY RETURNED
		while (mysqli_stmt_fetch($stmt)) {
			echo "<tr>";
			echo "<td>$CigId</td><td>$Brand</td><td>$Name</td><td>$TypeShape</td><td>$Price</td><td>$Score</td>";
			echo "</tr>";
		}
	echo "</table>";
?>

	</form>
</div>
<br><br>
<center><p><a href="analyze.php">Return to query menu.</a></p></center>

<?php include("endOfFile.php");?>
