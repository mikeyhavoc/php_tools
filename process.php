<?php
/**
 * Copyright (c) 2018. Michael Williams Manic Designer Developments.
 */

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 1/22/18
 * Time: 3:44 PM
 */
$first_name = trim(filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING));
$last_name = trim(filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$phone_number = trim(filter_input(INPUT_POST, 'phone-number', FILTER_SANITIZE_STRING));
$subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
$inquiry_questions = trim(filter_input(INPUT_POST, 'inquiry-questions', FILTER_SANITIZE_SPECIAL_CHARS));
$full_name = $first_name . ' ' . $last_name;

$email_body = "<pre><br>";
$email_body .= 'Full Name:' . $full_name . "<br>";
$email_body .= 'Email: ' . $email . "<br>";
$email_body .= 'Phone number: ' . $phone_number . "<br>";
$email_body .= 'Subject: ' . $subject . "<br>";
$email_body .= 'Inquiry: ' . $inquiry_questions . "<br>";
$email_body .= "<pre>";

echo $email_body;