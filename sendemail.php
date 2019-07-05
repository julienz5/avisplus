<?php

// Define some constants
define( "RECIPIENT_NAME", "CONTACT avisplus" );
define( "RECIPIENT_EMAIL", "contact@avisplus.fr" );

// Read the form values
$success = false;

$pname = htmlspecialchars( $_POST['pname'] );
$busname = htmlspecialchars( $_POST['busname'] );
$topic = htmlspecialchars( $_POST['topic'] );
$senderEmail = htmlspecialchars( $_POST['email'] );
$senderPhone = htmlspecialchars( $_POST['phone'] );
$body = htmlspecialchars( $_POST['descr'] );

// If necessary values exist, send the email
if ($pname && $busname && $senderEmail)
{
	$recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
	$headers = "From: " . $senderEmail . " <" . $busname . ">";
	$msgBody = " Nom contact: " . $pname . " Business name: " . $busname . " Topic: " . $topic . " Phone Number: " . $senderPhone . "" . " Body: " . $body . "";
	$success = mail( $recipient, $headers, $msgBody );

	// If necessary values exist, send the email
	if ($success)
	{
		header('Location: index.html?message=Success');
	}
	else{
		header('Location: index.html?message=Failed');
	}
}
else{
  	header('Location: index.html?message=Invalid');
}

?>
