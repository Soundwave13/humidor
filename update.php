<?php

	//**ONLY ALLOW UPDATE IF THE USER IS LOGGED IN**
    session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

	//CONSTANTS FILE 
	require("constants.php");
	
	
	//ESTABLISH DATABASE CONNECTION 
	$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);
	
	if (mysqli_connect_errno()) {
		echo "COULD NOT CONNECT TO DATABASE";
		exit;
	}
	
	// Report all errors except E_NOTICE
	error_reporting(E_ALL ^ E_NOTICE);

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
	
	//var_dump($_POST);
	//require('handlephoto.php');
	
	
	//CONSTRUCT INSERT STATEMENT 
	$sql = "UPDATE cigarlist 
			SET Name = ?, 
				RingGage = ?, 
				Brand = ?, 
				PurchaseDate = ?, 
				Manufacturer = ?, 
				PointOfSale = ?, 
				OriginCountry = ?, 
				Price = ?, 
				TypeShape = ?, 
				DateRemoved = ?, 
				Length = ?, 
				MfgDate = ?, 
				BoxCode = ?
			WHERE CigID = ?";

	//prepare statement:
	$stmt = mysqli_prepare($dbc,$sql);

	//BIND PARAMETERS:
	//echo $photoname;
	mysqli_stmt_bind_param($stmt,'sssssssisssssi',$name,$rgauge,$brand,$pdate,$mfg,$pos,$ocountry,$price,$tshape,$dremoved,$length,$mdate,$bcode,$cigid);
	
	
	//EXECUTE UPDATE QUERY
	mysqli_stmt_execute($stmt);
	
	//RE-DISPLAY THE LIST OF cigarsS:
	require('displayAllCigars.php');
?>