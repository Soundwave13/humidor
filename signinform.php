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
?>

  				<h4><p>O.L. Humidor is an online cigar inventory and review application designed specifically for cigar enthusiasts and afficianados, 
from the budding hobbiest to the serious collector. Please sign in or register free today to access this powerfull and unique 
organizational tool!</p></h4>
 
 
 <!------------------ FORM -------------------->
	  
  
 <form id="signin" name="loginform" method="post" action="checkLogin.php">
	<h3>Please sign in..</h3>
	<br>
	<table class='table table-bordered table-striped'>
		
		<tr>
			<td align='left'>
			  Userid
			</td>
			<td colspan="4">
			  <input type="text" name="userid" id="userid" size="20" maxlength="500" placeholder="admin" value="">
			</td>
		</tr>

		<tr>
			<td align='left'>
			  Password
			</td>
			<td colspan="4">
			  <input type="password" name="password" id="password" size="20" maxlength="500" placeholder="andrew" value="">
			</td>
		</tr>
		
		<!--  <tr>
			<td align='left'>
			  Confirm Password
			</td>
			<td colspan="4">
			  <input type="password" name="confirmPassword" id="confirmPassword" size="20" maxlength="500" value="">
			</td>
		</tr>-->


	</table>
	
	<br>

	<input type="submit" name="submit" value="Login">
	
  </form>

<!-------------------------------END FORM---------------------------------->                
<?php include("endOfFile.php");?>              
