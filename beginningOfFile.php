<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
    
	<link rel="stylesheet" href="nivo-slider.css" type="text/css"/>
    <link rel="stylesheet" href="themes/default/default.css" type="text/css"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
	 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ONLINE HUMIDOR | SIGN-IN</title>
<link href="styles.css" rel="stylesheet" type="text/css" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php 
// Report all errors except E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
//start session
session_start() ;
$uid = $_SESSION['uid'];
?>
</head>

<body>
	<div id="dochead">
    	<div id="header">
  			<div id="logo"><a href="index.php"><img src="images/logo.png"/></a></div>
   			<div id="docnav"><ul id="nav">
            	<li <?php if ($currentPage == "home") echo "class='current-page'";?>><a href="index.php">HOME</a></li>
                <li <?php if ($currentPage == "humidor") echo "class='current-page'";?>><a href="humidor.php">HUMIDOR</a></li>
                <li <?php if ($currentPage == "review") echo "class='current-page'";?>><a href="review.php">REVIEW</a></li>
                <li <?php if ($currentPage == "analyze") echo "class='current-page'";?>><a href="analyze.php">ANALYZE</a></li>
        	</ul></div>
       	</div>
    </div>
  <div id="wrap">
  		
  		<div id="container">
            
  			<div id="docbody">
  			<p><?php if (isset($uid)) { echo "<center>"; echo "You are logged in as: $uid"; echo "</center>"; echo "<br><br>"; }
	else {
		echo "<center>";
		echo "<a href='signinform.php'>Please log in.</a>";
		echo "</center>";
		echo "<br><br>";} ?></p>
		