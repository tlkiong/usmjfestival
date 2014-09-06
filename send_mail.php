<?php

	require 'vendor/autoload.php';
	

	
	$senders_email_address = $_REQUEST['sender_email_address'] ;
	$senders_contact_number = $_REQUEST['sender_contact_number'];
	$senders_name = $_REQUEST['sender_name'];

	$senders_message = $_REQUEST['sender_message'] ;
	

	$sendgrid_username = 'app29290012@heroku.com';
	$sendgrid_password = 'USMJapanFestival';
	$to                = 'usmjfestival@gmail.com';
	$email_subject = "Message from usmjapanfestival.herokuapp.com website";
	$email_body = "From:\n".
				  "		Name          : $from_sender_name\n".
				  "		Contact Number: $from_contact_number\n".
				  "		Message: $message";

	$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
	$email    = new SendGrid\Email();
	$email->addTo($to)->
	       setFrom($to)->
	       setSubject($email_subject)->
	       setText($email_body)->

	       addHeader('X-Sent-Using', 'SendGrid-API')->
	       addHeader('X-Transport', 'web');

	$response = $sendgrid->send($email);
	var_dump($response);
	var_dump($sendgrid_username);
	var_dump($sendgrid_password);
?>