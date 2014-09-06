<?php
	/*
	This first bit sets the email address that you want the form to be submitted to.
	You will need to change this value to a valid email address that you can access.
	*/
	$to = "usmjfestival@gmail.com";

	/*
	This bit sets the URLs of the supporting pages.
	If you change the names of any of the pages, you will need to change the values here.
	*/
	$feedback_page = "jfcontactus.html";
	$error_page = "error_message.html";
	$thankyou_page = "thank_you.html";

	/*
	This next bit loads the form field data into variables.
	If you add a form field, you will need to add it here.
	*/
	$email_subject = "Message from usmjapanfestival.herokuapp.com website"
	$from_email_address = $_REQUEST['email_address'] ;
	$from_contact_number = $_REQUEST['contact_number']
	$from_sender_name = $_REQUEST['sender_name']

	$message = $_REQUEST['message'] ;
	$email_body = "From:\n".
				  "		Name          : $from_sender_name\n".
				  "		Contact Number: $from_contact_number\n".
				  "		Message: $message";


	// If the user tries to access this script directly, redirect them to the feedback form,
	if (!isset($from_email_address)) {
	header( "Location: $feedback_page" );
	}

	// If the form fields are empty, redirect to the error page.
	elseif (empty($from_email_address) || empty($from_contact_number) || empty($from_sender_name) || empty($message)) {
	header( "Location: $error_page" );
	}

	// If we passed all previous tests, send the email then redirect to the thank you page.
	else {
	mail( $to, $email_subject, $email_body, $from_email_address );

	header( "Location: $thankyou_page" );
	}
?>