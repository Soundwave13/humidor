
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
	
//MAKE SURE WE HAVE A GOOD CONNECTION:
	if (mysqli_connect_errno()) {
     echo 'ERROR -- COULD NOT CONNECT TO DB';
     exit;
	}

// Report all errors except E_NOTICE
	error_reporting(E_ALL ^ E_NOTICE);

//PULL VALUE OUT OF THE URL & SANITIZE
	$idToUpdate = mysqli_real_escape_string($dbc,trim($_GET['id']));
	
//CONSTRUCT QUERY STRING
	$query = "SELECT ReviewID,CigarID,c.Name,c.OriginCountry,ReviewDate,Blend,Strength,Construction,FlavorProfile,Burn,Pairing,Overall,Score 
	FROM review r, cigarlist c
	WHERE r.CigarID = c.CigID
	AND ReviewID = ?";

//CONSTRUCTS STATEMENT OBJECT FOR PROCESSING
	$stmt = mysqli_prepare($dbc,$query);	

//BIND PAREMETERS
	mysqli_stmt_bind_param($stmt,'i',$idToUpdate);
	
//EXECUTE QUERY
	mysqli_stmt_execute($stmt);
	
//#5 BIND & FETCH RESULTS
	mysqli_stmt_bind_result($stmt,$revid,$cigid,$name,$ocountry,$date,$blend,$strength,$const,$flav,$burn,$pair,$overall,$score);
	mysqli_stmt_fetch($stmt);

?>

		
<h4><p>Please update your reveiw. Once you are done, be sure to submit it to the database before moving on to Analyze the reviews and inventory compliled. </p>
<p>Thank you and enjoy!</p>
</h4>



 <!------------------ FORM -------------------->               

<form id="review" name="reviewform" method="post" action="updater.php">
		
	
	<table>
	<h3><td>Update your review: # <?php echo $revid; ?></td>  <td>Name: <?php echo $name; ?></td>  <td>Origin Country: <?php echo $ocountry; ?></td></h3>
	</table>
	<table class='review'>
	<input type="hidden" name="ReviewID" value="<?php echo $revid; ?>">
		<input type = "hidden" name="CigarID" value="<?php echo $cigid; ?>">
		<tr>
			<td align='right'>
			  Date
			</td>
			<td colspan="4">
			  <input type="text" name="ReviewDate" id="ReviewDate" size="10" maxlength="10" value="<?php echo $date; ?>">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Blend
			</td>
			<td colspan="4">
			  <input type="text" name="Blend" id="Blend" size="60" maxlength="250" value="<?php echo $blend; ?>">
			</td>
			
		</tr>

		<tr>
			<td align='right'>
			  Strength
			</td>
			<td colspan="4">
			  <input type="text" name="Strength" id="Strength" size="60" maxlength="150" value="<?php echo $strength; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Construction
			</td>
			<td colspan="4">
			  <input type="text" name="Construction" id="Construction" size="60" maxlength="150" value="<?php echo $const; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Flavor
			</td>
			<td colspan="4">
			  <input type="text" name="Flavor" id="Flavor" size="60" maxlength="150" value="<?php echo $flav; ?>">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Burn
			</td>
			<td colspan="4">
			  <input type="text" name="Burn" id="Burn" size="60" maxlength="150" value="<?php echo $burn; ?>">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Pairing
			</td>
			<td colspan="4">
			  <input type="text" name="Pairing" id="Pairing" size="60" maxlength="150" value="<?php echo $pair; ?>">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Overall
			</td>
			<td colspan="4">
			  <input type="text" name="Overall" id="Overall" size="60" maxlength="150" value="<?php echo $overall; ?>">
			</td>
			
		</tr>
		
		<tr>
			<td align='right'>
			  Score
			</td>
			<td colspan="4">
			  <input type="text" name="Score" id="Score" size="10" maxlength="150" value="<?php echo $score; ?>">
			</td>
			
		</tr>

	</table>
	
	<br>

	<input type="submit" name="submit" value="Submit Update to Reviews!">
	<center><p><a href="review.php">Click here to add a new review!</a></p>
  	<p>or</p>
  	<p><a href="displayAllReviews.php">Return to Review List.</a></p></center>
  </form>



	
<!-------------------------------END FORM---------------------------------->	
<?php include("endOfFile.php");?>   
