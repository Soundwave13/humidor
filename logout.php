<?php
//STEPS TO LOGOFF
//start session to make sure a session exits:
session_start();

//clear the uid session value
unset($_SESSION['uid']);

//destroy the session - since your user is logging out
session_destroy();


//one way to send the user back to the members page:
header("Location: signinform.php");
exit;
?>