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
$query = "SELECT ReviewID, Brand, Name, TypeShape, Price, Score 
		FROM cigarlist,review 
		WHERE cigarlist.CigId = review.CigarID";

//prepare statement
$stmt = mysqli_prepare($dbc,$query);

//execute the statement
mysqli_stmt_execute($stmt);

//bind variables to prepared statement
mysqli_stmt_bind_result($stmt,$RevId,$Brand,$Name,$TypeShape,$Price,$Score);
?>

<div class="container">
	<form id='analyze'>
	
<?php
//WRITE THE RESULTS OF THE QUERY BELOW
	echo "<table class='analyze'>";
		echo "<tr><td>Review ID</td><td>Brand</td><td>Name</td><td>Shape</td><td>Price</td><td>Score</td><td>Update</td><td>Delete                                                                                                                                 </td></tr>";
		//LOOP THROUGH EACH ROW THE QUERY RETURNED
		while (mysqli_stmt_fetch($stmt)) {
			echo "<tr>";
			echo "<td>$RevId</td><td>$Brand</td><td>$Name</td><td>$TypeShape</td><td>$Price</td><td>$Score</td>";
			echo "<td><a href='reviewupdate.php?id=$RevId'>Update</td>";
			echo "<td><a href='deleter.php?id=$RevId'>Delete</td>";
			echo "</tr>";
		}
	echo "</table>";
?>

	</form>
</div>
<br><br>
<br><br>
<center><p><a href="review.php">Click here to add a new review!</a></p><br>
  	<p><a href="analyze.php">Queries List.</a></p><br>
  	<p><a href="rreportExcel.php" target="new">Export to EXCEL</a></p></center>

<?php include("endOfFile.php");?>
