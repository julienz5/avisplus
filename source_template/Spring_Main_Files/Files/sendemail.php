<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "youremail@mail.com" );


// Read the form values
$success = false;
$BoutiqueName = isset( $_POST['bname'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['bname'] ) : "";
$BoutiqueOwnerName = isset( $_POST['boname'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['boname'] ) : "";
$Stores = isset( $_POST['stores'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['stores'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";

// If all values exist, send the email
if ( $BoutiqueName && $BoutiqueOwnerName && $Stores && $senderEmail && $senderPhone) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderEmail . " <" . $BoutiqueOwnerName . ">";
  $msgBody = " Boutique Name: " . $BoutiqueName . " Boutique Owner Name: " . $BoutiqueOwnerName . " Stores: " . $Stores . " Phone Number: " . $senderPhone . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: index.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>