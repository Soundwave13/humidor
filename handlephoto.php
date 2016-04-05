<?php

//init
$picture = "";

//JUST A FEW TEST LINES TO SEE INFO ABOUT THE FILE YOU JUST UPLOADED
echo "THANK YOU FOR UPLOADING THIS FILE:<BR>";
echo "Upload: " . $_FILES["Picture"]["name"] . "<br />";
echo "Type: " . $_FILES["Picture"]["type"] . "<br />";
echo "Size: " . ($_FILES["Picture"]["size"] / 1024) . " Kb<br />";

$pictureName = $_FILES["Picture"]["name"];
$randomno = uniqid();
//echo $pictureName . $randomno;
$picture = $randomno . $pictureName; 


//THE FILE IS INITIALLY STORED IN A DEFAULT TEMP
//FOLDER ON YOUR SERVER.  
//THIS IS JUST A TEMP LOCATION.  TO SAVE
//TO TRULY SAVE THE FILE YOU HAVE TO MOVE IT TO THE FOLDER
//OF YOUR CHOICE
//THIS IS HOW YOU UPLOAD THE PHOTO 
//IN THIS EXAMPLE, I'M PUTTING THE PHOTOS IN AN UPLOADEDIMAGES FOLDER IN
//IN THIS PROJECT 
    if(move_uploaded_file($_FILES['Picture']['tmp_name'], "uploadedImages/".$photoname)) {
         //Tells you if its all ok
         echo "<br>The file ". basename( $_FILES['Picture']['name']). " has been uploaded, and your information has been added to the directory";
         //create a name for the photo file
    }
    else {
		//Gives and error if its not
	     echo "Sorry, there was a problem uploading your file.";
	}