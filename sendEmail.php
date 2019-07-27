<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];
    $contractType = $_POST['contractType'];
    $more = $_POST['more'];

    // If the email's not valid at this point, it's come in from the backend and it shouldn't have done so abandon ship.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return;
    }

    // $from = 'office@woodramconstruction.co.uk';
    $from = 'ash@ashios.com';
    $to = 'ash.duckett@outlook.com';

    // Hoping to avoid junk folder...
    $headers  = "From: " . $from . "\r\n";
    $headers .= "X-Sender: " . trim($email) . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "Return-Path: " . $from . "\r\n"; // Return path for errors
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=iso-8859-1\n";


    // the message
    $msg = "Hi,\n";
    $msg .= "\nYou have received a message from " . $name . ".\n";
    $msg .= "\nTheir email address is " . $email . " and their phone number is " . $contactNo . ".\n\n";
    $msg .= "They wish to talk about a contract of type " . $contractType . ".\n\n";
    $msg .= "More info: " . $more;
    $msg .= "\n\nThanks.";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 100);

    // send email
    mail($to, "Woodram Enquiry", $msg, $headers);
 



