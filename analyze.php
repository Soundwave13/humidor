<?php
	session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

	$currentPage = "analyze";
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
	//ini_set('display_errors', 1);
?>
<h4><p>Please select your query to review the database. You can then email us with additional query ideas, questions or feedback!</p>
<p>Thank you!</p></h4>
<br>
	<form id="analyze" name="reviewform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     	<h2>Query Menu:</h2>
      	<ul class="unstyled">
        	<li><a href="displayAllCigars.php">List All Cigars</a></li>
       		<li><a href="displayAllCigarsbyCountry.php">Display Cigars By Country</a></li>
       		<li><a href="displayAllReviews.php">Display All Reviews</a></li>
        	<li><a href="displayAllCigars90.php">Display Cigars With Score of 90 or More</a></li>
	  	</ul>
	  	<br>
<?php 
//IF THE SUBMIT BUTTON WAS CLICKED, SEND THE EMAIL AND DISPLAY A CONFIRMATION MESSAGE
	//OTHERWISE, DISPLAY THE FORM
	if (isset($_POST['submit'])) { 
		
		//PULL VALUES THAT WERE ENTERED ON THE FORM:
   	    $message = $_POST['message'];
		$email = $_POST['email'];

		//just testing to make sure the values comes through
		//echo $message;
		//echo $email;
		
	    //TELL THIS FILE ABOUT THE PHPMAILER CLASS:
		include_once("../PHPMailer/class.phpmailer.php");
		
		//INSTANTIATE THE PHPMAILER CLASS AND ASSIGN IT 
     	//TO THE $mail VARIABLE:
		$mail = new PHPMailer;
		
		//SET UP THE EMAIL BASED ON VALUES THE USER HAS ENTERED:
		$mail->AddAddress($email,'Test User');
		$mail->FromName='Test';
		$mail->Subject="Humidor Feedback Test";
		$mail->Body=$message;
	    if ($mail->Send()) {
		   	echo "<center><h2>Thank you for the feedback!!</h2></center>"; 
		}
	} 	else {
	
	  		echo "<h2>Send us your feedback or query requests:</h2>";
	 		echo "<table>";
	 		echo "<tr><input type='text' name='email' id='email' placeholder='Enter email address' value=''></tr>";
	  		echo "<tr><td><input type='textArea' name='message' id='message' size='40' style='height:100px;' value=''></td>";
	  		echo "<td><input type='submit' name='submit' value='Submit feedback!'></td></tr>";
	  		echo "</table>";
		}
?>
	</form>

<?php include("endOfFile.php");?>
