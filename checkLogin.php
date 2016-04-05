<?php

include('beginningOfFile.php');

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
//NEW:

//GET THE USERID AND PASSWORD
//FROM THE FORM:
$UserID = $_POST['userid'];
$UserPassword = $_POST['password'];


require('constants.php');

//CHECK THE USERID AND PASSWORD
//AGAINST THE DATABASE:

//#1) CREATE DATABASE CONNECTION
$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

//#2) WRITE QUERY
//GET THE HASHED PASSWORD FOR THIS USER:
$query = "select UserID from userdb where UserID = ? and UserPassword = ?";

//#3) PREPARE STATEMENT
$stmt = mysqli_prepare($dbc,$query);

   
//#4) BIND PARAMETERS
//mysqli_stmt_bind_param($stmt,'ss',$userid,$saltedPassword);
mysqli_stmt_bind_param($stmt,'ss',$UserID,$UserPassword);

//#5) EXECUTE THE STATEMENT
mysqli_stmt_execute($stmt);

//#6) BIND THE QUERY RESULTS TO A VARIABLE NAME
mysqli_stmt_bind_result($stmt,$userid);

//#7) PULL RESULTS OUT OF QUERY
mysqli_stmt_fetch($stmt);

//CLOSE THE DATABASE CONNECTION
mysqli_close($dbc);


//USING http://www.openwall.com/phpass/
//INSTEAD OF md5 or sha1 to hash password in this example
//interesting:
//http://stackoverflow.com/questions/1581610/how-can-i-store-my-users-passwords-safely/1581919#1581919
//http://security.stackexchange.com/questions/17111/php-crypt-or-phpass-for-storing-passwords
//HASH THE PASSWORD WITH USING THE PHPass library
//INCLUDE THEIR FILE -- JUST LIKE WE INCLUDED PHPMailer
//include('PasswordHash.php');

//$pwdHasher = new PasswordHash(8, false);

//when you call the checkpassword function,
//you pass in the hashed password from the database
//along with the password the user typed in (for their login attempt)
//this will return true if it is a matach:
//if ($pwdHasher->CheckPassword($UserPassword, $hash_from_db)) {
//	    //authentication good -- save the userid to the session
//		session_start() ;
//		$_SESSION['uid']=$UserID;
//		//display the display page:
//		header( 'Location: index.php');
//}
if ($UserID == $userid) {
	//authentication good -- save the userid to the session
	session_start() ;
    $_SESSION['uid']=$UserID;
    //display the display page:
    header( 'Location: index.php');
}

//ELSE -- USERID AND PASSWORD COMBINATION NOT FOUND 
//INVALID LOGIN ATTEMPT
else {
	echo "<center>";
	echo "<font color='red'>Invalid logon attempt</font>";
	echo "<br><br>";
	echo "<a href='signinform.php'>Please try again.</a>";
	echo "</center>";
	//include('signinform.php');
}

//END NEW
////GET THESE VALUES FROM THE FORM
//1) userid 2) password 3) confirm password
//$userid = $_POST['userid'];
//$pswd = $_POST['password'];
//$conpswd = $_POST['confirmPassword'];


//if (($userid) !== ("admin")){
//	echo "Not a valid user.";
//}

//if (($pswd) !== ("andrew")){
//	echo "Invalid password";
//}

//if (($pswd) !== ($conpswd)){
//	echo "Your password and your confirmation password do not match.";
//} 

//if (($userid) == ("admin") && ($pswd) == ("andrew")){
//	echo "You have successfully signed in!";
	//load 'index.php'';
//}

include("endOfFile.php");?>  

