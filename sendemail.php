<?php

// Define some constants
define( "RECIPIENT_NAME", "CONTACT avisplus" );
define( "RECIPIENT_EMAIL", "contact@avisplus.fr" );


// Read the form values
$success = false;
$pname = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$busname = isset( $_POST['busname'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['busname'] ) : "";
$topic = isset( $_POST['topic'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['topic'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$body = isset( $_POST['descr'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['descr'] ) : "";

// If all values exist, send the email
if ( $pname && $busname && $topic && $senderEmail && $senderPhone) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderEmail . " <" . $busname . ">";
  $msgBody = " Nom contact: " . $pname . " Business name: " . $busname . " Topic: " . $topic . " Phone Number: " . $senderPhone . "" . " Body: " . $body . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: index.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>