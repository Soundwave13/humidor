<?php
    
	session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }


//CONNECT TO THE DATABASE -- WITH A VALID USER ID THAT HAS PERMISSION FOR THIS DATABASE:
	include("constants.php");
	$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

//MAKE SURE WE HAVE A GOOD CONNECTION:
	if (mysqli_connect_errno()) {

     echo 'ERROR -- COULD NOT CONNECT TO DB';
     exit;
	}

// Report all errors except E_NOTICE
	error_reporting(E_ALL ^ E_NOTICE);

	if (isset($_POST['submit'])) {
	
	//PULL DATA OFF OF THE FORM
		$cigid = $_POST['CigID'];
		$name = $_POST['Name'];
		$rgauge = $_POST['RingGage'];
		$brand = $_POST['Brand'];
		$pdate = $_POST['PurchaseDate'];
		$mfg = $_POST['Manufacturer'];
		$pos = $_POST['PointOfSale'];
		$ocountry = $_POST['OriginCountry'];
		$price = $_POST['Price'];
		$tshape = $_POST['TypeShape'];
		$dremoved = $_POST['DateRemoved'];
		$length = $_POST['Length'];
		$mdate = $_POST['MfgDate'];
		$bcode = $_POST['BoxCode'];
	//$picture = $_POST['Picture'];
	
	//CONSTRUCT INSERT STATEMENT 
		$sql = "INSERT INTO cigarlist (Name, RingGage, Brand, PurchaseDate, Manufacturer, PointOfSale, OriginCountry, Price, TypeShape, DateRemoved, Length, MfgDate, BoxCode) values (?,?,?,?,?,?,?,?,?,?,?,?,?)";

	//prepare statement:
		$stmt = mysqli_prepare($dbc,$sql);

	//BIND PARAMETERS:
		mysqli_stmt_bind_param($stmt,'sssssssisssss',$name,$rgauge,$brand,$pdate,$mfg,$pos,$ocountry,$price,$tshape,$dremoved,$length,$mdate,$bcode);
	
	//EXECUTE UPDATE QUERY
		mysqli_stmt_execute($stmt);
	
	}

	require("displayAllCigars.php");
?>