<?php 
if(isset($_POST['submit'])){
    $to = "usmjfestival@gmail.com"; // this is your Email address
    $from = $_POST['sender_email_address']; // this is the sender's Email address
    $senders_name = $_POST['sender_name'];
    $senders_contact_number = $_POST['sender_contact_number'];
    $subject = "Form submission";
    $message = $senders_name . " wrote the following:" . "\n\n" . $_POST['sender_message'];

    $headers = "From:" . $from;

    // If the user tries to access this script directly, redirect them to the feedback form,
    if (!isset($from)) {
    header( "Location: $feedback_page" );
    }

    // If the form fields are empty, redirect to the error page.
    elseif (empty("$from_email_address") || empty("$from_contact_number") || empty("$from_sender_name") || empty("$message")) {
    header( "Location: $error_page" );
    }

    // If we passed all previous tests, send the email then redirect to the thank you page.
    else {
    mail($to,$subject,$message,$headers);

    header( "Location: $thankyou_page" );
    }
    

    //echo "Mail Sent. Thank you " . $senders_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>