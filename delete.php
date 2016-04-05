<?php

    //**ONLY ALLOW DELETE IF THE USER IS LOGGED IN**
    session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

	//PULL THE ID FROM THE URL:
	$idToDelete = $_GET['id'];
	
	//CONSTANTS FILE 
	require("constants.php");
	
	//ESTABLISH THE CONNECTION:
	$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);
	
	if (mysqli_connect_errno()) {
		echo "COULD NOT CONNECT TO DATABASE";
		exit;
	}
	
	//PULL VALUE OUT OF THE URL & MAKE SURE WE SANITIZE!
	$idToDelete = mysqli_real_escape_string($dbc,trim($_GET['id']));
	
	//CONSTRUCT THE QUERY STRING
	//-->REMOVED:$sql = "delete from home where houseid = $idToDelete";
	//INSTEAD USE ? AS PLACEHOLDER FOR VALUES IN THE QUERY:
	$sql = "delete from cigarlist where CigID = ?";

	
	//prepare statement:
	$stmt = mysqli_prepare($dbc,$sql);

	//BIND PARAMETERS:
	mysqli_stmt_bind_param($stmt,'i',$idToDelete);
	
	//CALL THE QUERY
	//--REMOVED: $result=mysqli_query($dbc,$sql);
	mysqli_stmt_execute($stmt);
	
	
	//RE-DISPLAY THE LIST OF cigarsS:
	require('displayAllCigars.php');
	
	



?>