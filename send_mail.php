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
				  "&nbsp;&nbsp;&nbsp;&nbsp;Name          : ".$senders_name."<br>".
				  "&nbsp;&nbsp;&nbsp;&nbsp;Contact Number: ".$senders_contact_number."<br>".
				  "&nbsp;&nbsp;&nbsp;&nbsp;Message: ".$senders_message;

	$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
	$email    = new SendGrid\Email();
	$email->addTo($to)->
	       setFrom($senders_email_address)->
	       setSubject($email_subject)->
	       setHtml($email_body);

	$response = $sendgrid->send($email);
	//var_dump($response);
	header("Location: jfcontactus.html");
?>