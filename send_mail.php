<?php

	require 'vendor/autoload.php';

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
	$email_subject = "Message from usmjapanfestival.herokuapp.com website";
	$senders_email_address = $_REQUEST['sender_email_address'] ;
	$senders_contact_number = $_REQUEST['sender_contact_number'];
	$senders_name = $_REQUEST['sender_name'];

	$senders_message = $_REQUEST['sender_message'] ;
	$email_body = "From:\n".
				  "		Name          : $from_sender_name\n".
				  "		Contact Number: $from_contact_number\n".
				  "		Message: $message";

	$sendgrid_username = $_ENV['app29290012@heroku.com'];
	$sendgrid_password = $_ENV['USMJapanFestival'];

	$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password);
	$email    = new SendGrid\Email();
	$email->addTo($to)->
	       setFrom($senders_email_address)->
	       setSubject($email_subject)->
	       setText($email_body);

	$sendgrid->send($email);
?>