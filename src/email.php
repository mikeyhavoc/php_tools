<?php require_once 'private/initialize.php';
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require_once ('private/initialize.php');
//require './vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
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

    $to = 'garywsitems@gmail.com';
    $email_subject = $subject;
    $message = $email_body;



    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    // Additional headers
    $headers[] = 'To: Gw <garywsitems@gmail.com>';
    $headers[] = 'From: middleware <mikey.havocworkshop@gmail.com>';
    $headers[] = 'Cc: . '. $full_name . ' . '. $email . ' .  ';
    $headers[] = 'Bcc: migi <mikeyjhavoc@gmail.com>';



    mail($to, $email_subject, $message, implode("\r\n", $headers));




    //TODO. send email.
    header("location:email.php?status=thanks");
}





$page_title = 'Tool Inquiry';
$section = null;
/**
 * Copyright (c) 2018. Michael Williams Manic Designer Developments.
 */
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 1/19/18
 * Time: 2:26 PM
 */

?>
<?php require(SHARED_PATH . '/header.php');
      require(SHARED_PATH . '/nav.php');
    ?>
   <?php if (isset($_GET['status']) && $_GET['status'] == 'thanks') { ?>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
            <h2>Thank you for your interest in my tools!</h2>
                <p>I will try to be as prompt as possible in responding back to your questions or inquiry in purchase.</p>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <section>
    <form action="email.php" method="POST" class="mt-3">
        <legend Class="text-center">Contact Form</legend>
        <fieldset id="personal-info">
            <legend class="text-center">Personal Info:</legend>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label ml-2" for="first-name">First Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control bar-width"  id="first-name" name="first-name" placeholder="John">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label ml-2" for="last-name">Last Name</label>
               <div class="col-sm-8">
                   <input type="text" class="form-control bar-width" id="last-name" name="last-name" placeholder="Smith">
               </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label ml-2" for="email">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control bar-width" id="email" name="email" placeholder="Email" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label ml-2" for="phone-number">Contact Number</label>
                <div class="col-sm-8">
                    <input type="tel" class="form-control bar-width" id="phone-number" name="phone-number" placeholder="941-000-0000">
                </div>
            </div>
            <div class="form-group row">
                <div style="display:none;">
                    <label for="address">address</label>
                    <input type="text" id="address" name="address">
                    <p>please leave this field blank</p>
                </div>
            </div>
        </fieldset>
        <legend class="text-center">Tool Inquiry</legend>
        <fieldset id="inquiry-info">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label ml-2" for="subject">Subject:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control bar-width" id="subject" name="subject" placeholder="subject or inquiry about tool.">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label ml-2" for="inquiry-questions">Questions Inquiries</label>
                    <div class="col-sm-8">
                        <textarea class="form-control bar-width" name="inquiry-questions" id="inquiry-questions" cols="30" rows="10" placeholder="Questions about an item or an offer on an item.."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="bar-width col-sm-6">
                        <button  class="btn btn-lg btn-outline-success btn-block b-width b-right"  type="submit">Submit</button>
                    </div>
                    <div class="bar-width col-sm-6">
                        <button class="btn btn-lg btn-outline-danger btn-block b-width b-left" type="reset">Reset</button>
                    </div>
                </div>
        </fieldset>
            </div>
        </div>
    </form>
     <?php } ?>
   </section>
<?php include(SHARED_PATH . '/footer.php'); ?>