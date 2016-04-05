<?php

include('beginningOfFile.php"');
include("constants.php");


$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);
if (mysqli_connect_errno()) {	
	echo 'ERROR -- COULD NOT CONNECT TO DB';
	exit;
}

//WRITE QUERY
$query = "SELECT Name FROM cigarlist c, review r WHERE c.CigID = r.CigarID";
//CONSTRUCTS STATMENT OBJECT THAT YOU WILL USE TO DO THE PROCESSING
$stmt = mysqli_prepare($dbc,$query);


//EXECUTE QUERY
mysqli_stmt_execute($stmt);

//BIND RESULTS
mysqli_stmt_bind_result($stmt,$CigId);
?>

<div class="container">
<form id="analyze" method="post" action="displayAllCigarsby.php">
  <label>Cigar Review List:</label>
  	<table class='analyze'><tr>
		<td>
		<select name="cigarlist">
		    <option value='0'>Select a Cigar</option>
		    <?php 
		    //LOOP THROUGH RESULTS OF CIGAR QUERY
		    //DISPLAY CIGARS ON THE PAGE
		    while(mysqli_stmt_fetch($stmt))  {
		     echo "<option value='$CigId'>$CigId</option>";
		    }?>
		</select>
		</td>
  		<td>
		<input type="submit" value="submit" name="submit">
		</td>
	</table>
<?php 

//BEGIN- ONLY EXECUTE IF THEY CLICKED SUBMIT
if (isset($_POST['submit'])) {
	
	   //GET THE COUNTY THEY SELECTED OFF OF THE FORM
	   $type = $_POST['cigarlist'];
	   
	   //GET A DB CONNECTION
	   $dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);
		
		if (mysqli_connect_errno()) {
		
		     echo 'ERROR -- COULD NOT CONNECT TO DB';
		     exit;
		}
		
		
		$query = "SELECT CigId, Brand, Name, TypeShape, Price, Score 
		FROM cigarlist c,review r
		WHERE c.CigId = r.CigarID";
		
		$stmt = mysqli_prepare($dbc,$query);
		
		//IF THEY SELECTED CIGARS -- YOU JUST HAVE TO
		//APPEND THE QUERY BIND ONE PARAMETER TO THE QUERY
		if ($CigId != 0) {			
			//$query .= " and cigars.cigarlist = ?";
			//CALL PREPARE WITH THE NEW QUERY
			$stmt = mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,'s',$CigId);
		}

		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_bind_result($stmt,$CigId,$Brand,$Name,$TypeShape,$Price,$Score);
		//for testing -- what does query look like?
		//echo $query;
		
		$result = mysqli_query($dbc,$query);
		
		echo "<div class='container'>";
		if ($type == 0) $type = "Cigar was not reviewed";
		echo "<h3>Results for cigar search: $CigId</h3>";
		echo "<table class='analyze'>";
		echo "<tr><td>ID</td><td>Brand</td><td>Name</td><td>Shape</td><td>Price</td><td>Score</td></tr>";

		while(mysqli_stmt_fetch($stmt))  {
				echo "<tr>";
				echo "<td>$CigId</td><td>$Brand</td><td>$Name</td><td>$TypeShape</td><td>$Price</td><td>$Score</td>";
				echo "</tr>";
		}

		
		echo "</table>";
		echo "</div>";
		

}
//END -- ONLY EXECUTE IF THEY CLICKED SUBMIT

?>

</form>
</div>
<br><br>
<center><p><a href="analyze.php">Return to query menu.</a></p></center>
<?php include("endOfFile.php");?>

