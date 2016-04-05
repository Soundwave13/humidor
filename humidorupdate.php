<?php

    session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

	$currentPage = "humidor";
	include('beginningOfFile.php');

//CONNECT TO THE DATABASE WITH A VALID USER ID
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
	$query = "SELECT CigID, Name, RingGage, Brand, PurchaseDate, Manufacturer, PointOfSale, OriginCountry, Price, TypeShape, DateRemoved, Length, MfgDate, BoxCode, Picture 
	FROM cigarlist
	WHERE CigID = ?";

//CONSTRUCTS STATEMENT OBJECT FOR PROCESSING
	$stmt = mysqli_prepare($dbc,$query);	

//BIND PAREMETERS
	mysqli_stmt_bind_param($stmt,'i',$idToUpdate);
	
//EXECUTE QUERY
	mysqli_stmt_execute($stmt);
	
//#5 BIND & FETCH RESULTS
	mysqli_stmt_bind_result($stmt,$CigId,$name,$rgauge,$brand,$pdate,$mfg,$pos,$ocountry,$price,$tshape,$dremoved,$length,$mdate,$bcode,$picture);
	mysqli_stmt_fetch($stmt);
?>


		
<h4><p>Please update the "Humidor Form" to add cigars to your online inventory. Once you are done, be sure to submit it to the inventory before moving on to Review a cigar or Analyze the inventory and reviews compliled.</p>
<p>Thank you and enjoy!</p>
</h4>

 <!------------------ FORM -------------------->               

<form id="humidor" name="humidorform" method="post" action="update.php">
	<h3>Update cigar: # <?php echo $CigId; ?></h3>
	<br>
	<table>
		<input type="hidden" name="CigID" value="<?php echo $CigId; ?>">
		<tr>
			<td align='right'>
			  Name
			</td>
			<td colspan="4">
			  <input type="text" name="Name" id="Name" size="30" maxlength="150" value="<?php echo $name; ?>">
			</td>
			<td align='right'>
			  Ring
			</td>
			<td colspan="4">
			  <input type="text" name="RingGage" id="RingGage" size="30" maxlength="150" value="<?php echo $rgauge; ?>">
			</td>
		</tr>

		<tr>
			<td align='right'>
			  Brand
			</td>
			<td colspan="4">
			  <input type="text" name="Brand" id="Brand" size="30" maxlength="150" value="<?php echo $brand; ?>">
			</td>
			<td align='right'>
			  Purchased
			</td>
			<td colspan="4">
			  <input type="text" name="PurchaseDate" id="PurchaseDate" size="30" maxlength="150" value="<?php echo $pdate; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Manufacturer
			</td>
			<td colspan="4">
			  <input type="text" name="Manufacturer" id="Manufacturer" size="30" maxlength="150" value="<?php echo $mfg; ?>">
			</td>
			<td align='right'>
			  Location
			</td>
			<td colspan="4">
			  <input type="text" name="PointOfSale" id="PointOfSale" size="30" maxlength="150" value="<?php echo $pos; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Origin
			</td>
			<td colspan="4">
			  <input type="text" name="OriginCountry" id="OriginCountry" size="30" maxlength="150" value="<?php echo $ocountry; ?>">
			</td>
			<td align='right'>
			  Price
			</td>
			<td colspan="4">
			  <input type="text" name="Price" id="Price" size="30" maxlength="150" value="<?php echo $price; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Shape
			</td>
			<td colspan="4">
			  <input type="text" name="TypeShape" id="TypeShape" size="30" maxlength="150" value="<?php echo $tshape; ?>">
			</td>
			<td align='right'>
			  Removed
			</td>
			<td colspan="4">
			  <input type="text" name="DateRemoved" id="DateRemoved" size="30" maxlength="150" value="<?php echo $dremoved; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Length
			</td>
			<td colspan="4">
			  <input type="text" name="Length" id="Length" size="30" maxlength="150" value="<?php echo $length; ?>">
			</td>
			<td align='right'>
			  Picture
			</td>
			<td colspan="4">
			  <input type="file" name="Picture" id="Picture" size="30" maxlength="150" value="<?php echo $picture; ?>">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Mfg. Date
			</td>
			<td colspan="4">
			  <input type="text" name="MfgDate" id="MfgDate" size="30" maxlength="150" value="<?php echo $mdate; ?>">
			</td>
			<td align='right'>
			  Box Code
			</td>
			<td colspan="4">
			  <input type="text" name="BoxCode" id="BoxCode" size="30" maxlength="150" value="<?php echo $bcode; ?>">
			</td>
		</tr>

	</table>
	
	<br>

	<input type="submit" name="submit" value="Submit update to inventory!">
	<center><p><a href="humidor.php">Click here to add a new cigar!</a></p>
  	<p>or</p>
  	<p><a href="displayAllCigars.php">Return to Cigar List.</a></p></center>
  </form>



		
		
		
<!-------------------------------END FORM---------------------------------->	
<?php include("endOfFile.php");?>   