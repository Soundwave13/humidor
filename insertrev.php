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
		$revid = $_POST['ReviewID'];
		$cigid = $_POST['cigar'];
		$date = $_POST['ReviewDate'];
		$blend = $_POST['Blend'];
		$strength = $_POST['Strength'];
		$const = $_POST['Construction'];
		$flav = $_POST['Flavor'];
		$burn = $_POST['Burn'];
		$pair = $_POST['Pairing'];
		$overall = $_POST['Overall'];
		$score = $_POST['Score'];
		
	
	//CONSTRUCT INSERT STATEMENT 
		$sql = "INSERT INTO review (ReviewID,CigarID,ReviewDate,Blend,Strength,Construction,FlavorProfile,Burn,Pairing,Overall,Score) values (?,?,?,?,?,?,?,?,?,?,?)";

	//prepare statement:
		$stmt = mysqli_prepare($dbc,$sql);

	//BIND PARAMETERS:
		mysqli_stmt_bind_param($stmt,'issssssssss',$revid,$cigid,$date,$blend,$strength,$const,$flav,$burn,$pair,$overall,$score);
	
	//EXECUTE UPDATE QUERY
		mysqli_stmt_execute($stmt);
	
	}

	require("displayAllReviews.php");
?>