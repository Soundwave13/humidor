<?php

	include('beginningOfFile.php');

//CONNECT TO THE DATABASE 
	$currentPage = "humidor";
	include("constants.php");
	$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

//MAKE SURE WE HAVE A GOOD CONNECTION:
	if (mysqli_connect_errno()) {
     echo 'ERROR -- COULD NOT CONNECT TO DB';
     exit;
	}

//WRITE QUERY
	$query = 'select CigId,Brand,Name,TypeShape,Price from cigarlist';

//prepare statement
	$stmt = mysqli_prepare($dbc,$query);

//execute the statement
	mysqli_stmt_execute($stmt);

//bind variables to prepared statement
	mysqli_stmt_bind_result($stmt,$CigId,$Brand,$Name,$TypeShape,$Price);
?>

<div class="container">
	<form id='analyze'>
	
<?php
//WRITE THE RESULTS OF THE QUERY BELOW
	echo "<table class='analyze'>";
		echo "<tr><td>Cigar ID</td><td>Brand</td><td>Name</td><td>Shape</td><td>Price</td><td>Update</td><td>Delete</td></tr>";
		//LOOP THROUGH EACH ROW THE QUERY RETURNED
		while (mysqli_stmt_fetch($stmt)) {
			echo "<tr>";
			echo "<td>$CigId</td><td>$Brand</td><td>$Name</td><td>$TypeShape</td><td>$Price</td>";
			echo "<td><a href='humidorupdate.php?id=$CigId'>Update</td>";
			echo "<td><a href='delete.php?id=$CigId'>Delete</td>";
			echo "</tr>";
		}
	echo "</table>";
?>

	</form>
</div>
<br><br>
<center><p><a href="humidor.php">Click here to add a new cigar!</a></p><br>
  	<p><a href="analyze.php">Queries List.</a></p><br>
  	<p><a href="reportExcel.php" target="new">Export to EXCEL</a></p></center>


<?php include("endOfFile.php");?>
