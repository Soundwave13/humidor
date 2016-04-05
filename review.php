
<script>
//SELECT BOX ONCHANGE FUNCTION
function selectCig() {
	var e = document.getElementById("cigar");
	var cigar = e.options[e.selectedIndex].value;
	var newpage = "review.php" + "?id=" + cigar + "&name=" + e.options[e.selectedIndex].text;
	newpage = encodeURI(newpage);
	location.href = newpage;
	}
</script>

<?php
session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

	$currentPage = "review";
	include('beginningOfFile.php');

//CONNECT TO THE DATABASE
	include("constants.php");
	$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

//WRITE QUERY
	$query = "SELECT Name,CigID FROM cigarlist";
//CONSTRUCTS STATMENT OBJECT THAT YOU WILL USE TO DO THE PROCESSING
	$stmt = mysqli_prepare($dbc,$query);
//EXECUTE QUERY
	mysqli_stmt_execute($stmt);
//BIND RESULTS
	mysqli_stmt_bind_result($stmt,$name,$CigID);

	if (mysqli_connect_errno()) {
     echo 'ERROR -- COULD NOT CONNECT TO DB';
     exit;
	}

// Report all errors except E_NOTICE
	error_reporting(E_ALL ^ E_NOTICE);


?>

		
<h4><p>Please select which cigar you'd like to review. </p>
<p>Thank you and enjoy!</p>
</h4>



 <!------------------ FORM -------------------->               

<form id="review" name="reviewform" method="post" action="insertrev.php">
		<?php
			
			if (isset($_GET['id'])) {
				$currentid = ($_GET['id']);
				$name =  (urldecode($_GET['name']));
				echo "<h3>";
				echo "Cigar name: $name";
				echo "</h3>";
			}
			else { 
				$currentid = "Select cigar";?>
	<h3>Add your review:</h3>
		<?php }?>
	
	<table class='review'>
		<input type="hidden" name="ReviewID" value="">
		<input type = "hidden" name="CigarID" value="<?php echo $currentid?>">
		<tr>
			<td align='right'>
			  Date
			</td>
			<td colspan="4">
			  <input type="text" name="ReviewDate" id="ReviewDate" size="10" maxlength="10" value="">
			</td>
			<td align='right'>
			  Select:
			</td>
			<td colspan="4">
				<select name="cigar" id="cigar" onchange="selectCig(this)">
				<option value='0'>Make a selection</option>
				<?php 
				//LOOP THROUGH RESULTS OF CIGAR QUERY,DISPLAY CIGARS
				while(mysqli_stmt_fetch($stmt))  {
				  echo "<option value='$CigID'";
				  if ($CigID == $currentid) {
				     echo " SELECTED";
				  }
				  echo ">$name</option>";
				} ?>
  </select>
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Blend
			</td>
			<td colspan="4">
			  <input type="text" name="Blend" id="Blend" size="60" maxlength="250" value="">
			</td>
			
		</tr>

		<tr>
			<td align='right'>
			  Strength
			</td>
			<td colspan="4">
			  <input type="text" name="Strength" id="Strength" size="60" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Construction
			</td>
			<td colspan="4">
			  <input type="text" name="Construction" id="Construction" size="60" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Flavor
			</td>
			<td colspan="4">
			  <input type="text" name="Flavor" id="Flavor" size="60" maxlength="150" value="">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Burn
			</td>
			<td colspan="4">
			  <input type="text" name="Burn" id="Burn" size="60" maxlength="150" value="">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Pairing
			</td>
			<td colspan="4">
			  <input type="text" name="Pairing" id="Pairing" size="60" maxlength="150" value="">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Overall
			</td>
			<td colspan="4">
			  <input type="text" name="Overall" id="Overall" size="60" maxlength="150" value="">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Score
			</td>
			<td colspan="4">
			  <input type="text" name="Score" id="Score" size="10" maxlength="150" value="">
			</td>
			
		</tr>

	</table>
	
	<br>

	<input type="submit" name="submit" value="Submit to Reviews!">
	<center><p><a href="displayAllReviews.php">Display full Review List.</a></p></center>
  </form>



	
<!-------------------------------END FORM---------------------------------->	
<?php include("endOfFile.php");?>   
