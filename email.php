<?php require_once 'private/initialize.php';
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require_once ('private/initialize.php');
//require './vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = trim(filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING));
    $last_name = trim(filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $phone_number = trim(filter_input(INPUT_POST, 'contact-number', FILTER_SANITIZE_STRING));
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
<?php   require (SHARED_PATH . '/header.php');
            require (SHARED_PATH . '/nav.php');
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
    <div>
    <form action="email.php" method="POST">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-12 my-2  my-sm-3">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" placeholder="First name" required>
                </div>
                <div class="col-12 my-2 my-sm-3">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Last Name">
                </div>
                <div class="col-12 my-2 my-sm-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email">
               </div>
                <div class="col-12 my-2 my-sm-3">
                    <label for="area-near">Area Near or Located</label>
                    <select name="area-near" id="area-near" required>
                        <option value="">select</option>
                        <option value="bradenton">Bradenton</option>
                        <option value="sarasota">Sarasota</option>
                        <option value="lakewood-ranch">Lakewood Ranch</option>
                        <option value="palmetto">Palmetto</option>
                    </select>
                </div>
                <div class="col-12 my-2 my-sm-3">
                    <label for="contact-number">Contact Number</label>
                    <input type="tel" id="phone-number" name="contact-number" placeholder="941-000-0000">
                    <div style="display:none;">
                        <label for="address">address</label>
                        <input type="text" id="address" name="address">
                        <p>please leave this field blank</p>
                    </div>
                </div>
                <div class="col-12 my-2 my-sm-3">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject">
                </div>
                <div class="col-12 my-2 my-sm-3">
                    <label for="inquiry-questions">Questions Inquiries</label><br>
                    <textarea name="inquiry-questions" id="inquiry-questions" cols="30" rows="10" placeholder="Questions about an item or an offer on an item.."></textarea>
                </div>
                    <div class="col-12 my-2 my-sm-3 ">
                        <input class="btn btn-lg btn-outline-success submit-width"  type="submit" value="submit">
                    </div>
                    <div class="col-12 my-2  my-sm-3 ">
                        <input class="btn btn-lg btn-outline-danger submit-width" type="reset" value="reset">
                    </div>

            </div>
        </div>
    </form>
   <?php } ?>
</div>
<?php include (SHARED_PATH . '/footer.php'); ?>