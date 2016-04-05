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
	$revid = $_POST['ReviewID'];
	$date = $_POST['ReviewDate'];
	$blend = $_POST['Blend'];
	$strength = $_POST['Strength'];
	$const = $_POST['Construction'];
	$flav = $_POST['Flavor'];
	$burn = $_POST['Burn'];
	$pair = $_POST['Pairing'];
	$overall = $_POST['Overall'];
	$score = $_POST['Score'];
	$cigid = $_POST['CigarID'];
//$picture = $_POST['Picture'];
	
//var_dump($_POST);
//require('handlephoto.php');
	
	
//CONSTRUCT INSERT STATEMENT 
	$sql = "UPDATE review 
			SET CigarID = ?,
				ReviewDate = ?, 
				Blend = ?, 
				Strength = ?, 
				Construction = ?, 
				FlavorProfile = ?, 
				Burn = ?, 
				Pairing = ?, 
				Overall = ?, 
				Score = ? 
			WHERE ReviewID = ?";
//echo $cigid,$date,$blend,$strength,$const,$flav,$burn,$pair,$overall,$score,$revid;
//prepare statement:
	$stmt = mysqli_prepare($dbc,$sql);

//BIND PARAMETERS:
	//echo $photoname;
	mysqli_stmt_bind_param($stmt,'ssssssssssi',$cigid,$date,$blend,$strength,$const,$flav,$burn,$pair,$overall,$score,$revid);


	
//EXECUTE UPDATE QUERY
	mysqli_stmt_execute($stmt);
	
//RE-DISPLAY THE LIST OF reviews:
	require('displayAllReviews.php');
?>
