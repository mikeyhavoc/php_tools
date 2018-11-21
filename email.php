<?php
/**
 * Created by PhpStorm.
 * User: mikey
 * Date: 12/21/17
 * Time: 10:22 AM
 */
require_once 'bootstrap.php';

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "@gmail.com"; // REMEMBER TO PUT USER EMAIL IN BEFORE RUNNING !!!! ------ DEV
//Password to use for SMTP authentication
$mail->Password = ''; // REMEMBER TO PUT PASS WORD IN BEFORE RUNNING !!!!!!------------DEV


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = trim(filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING));
    $last_name = trim(filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $phone_number = trim(filter_input(INPUT_POST, 'phone-number', FILTER_SANITIZE_STRING));
    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
    $inquiry_questions = trim(filter_input(INPUT_POST, 'inquiry-questions', FILTER_SANITIZE_SPECIAL_CHARS));
    $full_name = $first_name . ' ' . $last_name;

    $email_body .= 'Full Name:' . $full_name . "\n";
    $email_body .= 'Email: ' . $email . "\n";
    $email_subject = $subject;
    $email_body .= 'Phone number: ' . $phone_number . "\n";
    $email_body .= 'Subject: ' . $subject . "\n";
    $email_body .= 'Inquiry: ' . $inquiry_questions . "\n";



//Set who the message is to be sent from
    $mail->setFrom($email, $first_name);
//Set an alternative reply-to address
    $mail->addReplyTo($email, $full_name);
//Set who the message is to be sent to
    $mail->addAddress('garyws.items@gmail.com', 'gary tools');
//Set the subject line
    $mail->Subject = $email_subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->Body = $email_body;
//send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        header("location:email.php?status=thanks");
    }//Create a new PHPMailer instance

}
$page_title = 'Tool Inquiry';
$section = null;

require_once('views/email.view.php');