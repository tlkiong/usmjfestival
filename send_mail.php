<?php

	require 'vendor/autoload.php';
	

	
	$senders_email_address = $_REQUEST['sender_email_address'] ;
	$senders_contact_number = $_REQUEST['sender_contact_number'];
	$senders_name = $_REQUEST['sender_name'];

	$senders_message = $_REQUEST['sender_message'] ;
	

	$sendgrid_username = 'app29290012@heroku.com';
	$sendgrid_password = 'USMJapanFestival';
	$to                = 'usmjfestival@gmail.com';
	$email_subject = "Message from usmjapanfestival.herokuapp.com website by ".$senders_name;
	$email_body = "From:<br>".
				  "		Name          : ".$sender_name."<br>".
				  "		Contact Number: ".$senders_contact_number."<br>".
				  "		Message: ".$senders_message;

	$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
	$email    = new SendGrid\Email();
	$email->addTo($to)->
	       setFrom($to)->
	       setSubject($email_subject)->
	       setHtml($email_body);

	$response = $sendgrid->send($email);
	//var_dump($response);
	header("jfcontactus.html");
?>