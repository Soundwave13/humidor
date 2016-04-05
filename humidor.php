<?php

    session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

	$currentPage = "humidor";
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

?>


<h4><p>Please fill in the "Humidor Form" to add cigars to your online inventory. Once you are done, be sure to submit it to the inventory before moving on to Review a cigar or Analyze the inventory and reviews compliled.</p>
<p>Thank you and enjoy!</p>
</h4>

 <!------------------ FORM -------------------->               

<form id="humidor" name="humidorform" method="post" action="insert.php">
	<h3>Add a new cigar:</h3>
	<br>
	<table>
		<input type="hidden" name="CigID" value="">
		<tr>
			<td align='right'>
			  Name
			</td>
			<td colspan="4">
			  <input type="text" name="Name" id="Name" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Ring
			</td>
			<td colspan="4">
			  <input type="text" name="RingGage" id="RingGage" size="30" maxlength="150" value="">
			</td>
		</tr>

		<tr>
			<td align='right'>
			  Brand
			</td>
			<td colspan="4">
			  <input type="text" name="Brand" id="Brand" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Purchased
			</td>
			<td colspan="4">
			  <input type="text" name="PurchaseDate" id="PurchaseDate" size="30" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Manufacturer
			</td>
			<td colspan="4">
			  <input type="text" name="Manufacturer" id="Manufacturer" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Location
			</td>
			<td colspan="4">
			  <input type="text" name="PointOfSale" id="PointOfSale" size="30" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Origin
			</td>
			<td colspan="4">
			  <input type="text" name="OriginCountry" id="OriginCountry" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Price
			</td>
			<td colspan="4">
			  <input type="text" name="Price" id="Price" size="30" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Shape
			</td>
			<td colspan="4">
			  <input type="text" name="TypeShape" id="TypeShape" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Removed
			</td>
			<td colspan="4">
			  <input type="text" name="DateRemoved" id="DateRemoved" size="30" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Length
			</td>
			<td colspan="4">
			  <input type="text" name="Length" id="Length" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Picture
			</td>
			<td colspan="4">
			  <input type="file" name="Picture" id="Picture" size="30" maxlength="150" value="">
			</td>
		</tr>
		
		<tr>
			<td align='right'>
			  Mfg. Date
			</td>
			<td colspan="4">
			  <input type="text" name="MfgDate" id="MfgDate" size="30" maxlength="150" value="">
			</td>
			<td align='right'>
			  Box Code
			</td>
			<td colspan="4">
			  <input type="text" name="BoxCode" id="BoxCode" size="30" maxlength="150" value="">
			</td>
		</tr>

	</table>
	
	<br>

	<input type="submit" name="submit" value="Submit to inventory!">
	<center><p><a href="displayAllCigars.php">Display full Cigar List.</a></p></center>
  </form>
  
<!-------------------------------END FORM---------------------------------->

	
<?php include("endOfFile.php");?>   
