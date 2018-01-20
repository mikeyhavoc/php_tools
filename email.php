<?php use phpmailer\phpmailer\phpmailer;
      use phpmailer\phpmailer\Exception;
require_once ('private/initialize.php');
require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
//require 'vendor/to/PHPMailer/src/SMTP.php';
/**
 * Copyright (c) 2018. Michael Williams Manic Designer Developments.
 */
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 1/19/18
 * Time: 2:26 PM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim(filter_input(INPUT_POST,'first-name', FILTER_SANITIZE_STRING));
    $last_name = trim(filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));
    $phone_number = trim(filter_input(INPUT_POST,'contact-number', FILTER_SANITIZE_STRING));
    $inquiry_questions = trim(filter_input(INPUT_POST,'inquiry-questions',FILTER_SANITIZE_SPECIAL_CHARS));

    if ($first_name == '' || $last_name == '' || $email == '' || $phone_number == '' || $inquiry_questions == '') { echo 'Please enter first name';
        exit;
    }
    if ($_POST['address'] != '') {
        echo 'Bad form input';
        exit;
    }

    if ($last_name == '') { echo "Please enter Last Name"; }

    $email_body = "";

    $email_body .= 'First Name ' . $first_name . "<br>";
    $email_body .= 'last name ' . $last_name . "<br>";
    $email_body .= 'email ' . $email . "<br>";
    $email_body .= 'phone number ' . $phone_number . "<br>";
    $email_body .= 'questions ' . $inquiry_questions . "<br>";

    echo $email_body;

    // TO DO  SEND EMAIL  :: THANK YOU PAGE.
    header("location:email.php?status=thanks");
}

/**
 * Copyright (c) 2018. Michael Williams Manic Designer Developments.
 */

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 1/19/18
 * Time: 12:33 PM
 */

require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');

?>
<div class="container-fluid">
    <?php if (isset($_POST['status']) && $_POST['status'] == 'thanks') { ?>
         <div class="container-fluid">
        <div class="col-12 text-center">
            <h1>Thank you for inquiry or question.</h1>
            <p>We will try to reach you as soon as possible to complete the deal.</p>
        </div>
    </div>
   <?php } else { ?>

    <form action="email.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center m-3">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" placeholder="First name" required>
                </div>
                <div class="col-12 text-center m-3">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Last Name">
                </div>
                <div class="col-12 text-center m-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email">
               </div>
                <div class="col-12 text-center m-3">
                    <label for="area-near">Area Near or Located</label>
                    <select name="area-near" id="area-near" required>
                        <option value="">select</option>
                        <option value="bradenton">Bradenton</option>
                        <option value="sarasota">Sarasota</option>
                        <option value="lakewood-ranch">Lakewood Ranch</option>
                        <option value="palmetto">Palmetto</option>
                    </select>
                </div>
                <div class="col-12 text-center m-3">
                    <label for="contact-number">Contact Number</label>
                    <input type="tel" id="contact-number" name="contact-number" placeholder="941-000-0000">
                    <div style="display:none;">
                        <label for="address">address</label>
                        <input type="text" id="address" name="address">
                        <p>please leave this field blank</p>
                    </div>
                </div>
                <div class="col-12 text-center m-3">
                    <label for="inquiry-questions">Questions Inquiries</label><br>
                    <textarea name="inquiry-questions" id="inquiry-questions" cols="30" rows="10" placeholder="Questions about an item or an offer on an item.."></textarea>
                </div>
                    <div class="col-12 text-center m-3 ">
                        <input class="btn btn-lg btn-outline-success submit-width"  type="submit" value="submit">
                    </div>
                    <div class="col-12 text-center m-3 ">
                        <input class="btn btn-lg btn-outline-danger submit-width" type="reset" value="reset">
                    </div>

            </div>
        </div>

    </form>
    <?php } ?>
</div>
<?php include (SHARED_PATH . '/footer.php'); ?>