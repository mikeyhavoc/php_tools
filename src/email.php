<?php require_once 'private/initialize.php';


 require '/vendor/autoload.php';

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP - requires a local mail server
//Faster and safer than using mail()
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->Port = 25;


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $first_name = trim(filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING));
        $last_name = trim(filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $phone_number = trim(filter_input(INPUT_POST, 'phone-number', FILTER_SANITIZE_STRING));
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
        $inquiry_questions = trim(filter_input(INPUT_POST, 'inquiry-questions', FILTER_SANITIZE_SPECIAL_CHARS));
        $full_name = $first_name . ' ' . $last_name;


        $mail->setFrom('garywsitems@gmail.com', 'seller tools');
        $mail->addAddress('garywsitems@gmail.com', 'Gary williams');

        if ($mail->addReplyTo($email, $first_name)) {
            $mail->Subject = $subject;
            $mail->isHTML(false);

            $mail->Body =<<<EOT
           Name: {$full_name}
           Email: {$email}
           Phone: {$phone_number}
           Subject: {$subject}
           Inquiry: {$inquiry_questions}         
EOT;

        }// send message check for errors;
        if (!$mail->send()) {
            // reason for failing send be in $mail->ErrInfo()
            // log in server.
            $msg = 'Sorry, Something went wrong. Please try again later.';
        } else  {
            $msg = 'thank you for your interest in our tools!';
            $msg .= 'We will try to get back to you as soon as possible!';
            //header("location:email.php?status=thanks");
        }

        //TODO. send email.

    }else {
        $msg = 'Invalid email address, message ignored.';
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
    ?>   <?php if(!empty($msg)) echo "<h2>$msg</h2>"; ?>
<!--   --><?php //if (isset($_GET['status']) && $_GET['status'] == 'thanks') {  ?>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">

<!--            <h2>Thank you for your interest in my tools!</h2>-->
<!--                <p>I will try to be as prompt as possible in responding back to your questions or inquiry in purchase.</p>-->
            </div>
        </div>
    </div>
<!--    --><?php //} else { ?>
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
<!--     --><?php //} ?>
   </section>
<?php include(SHARED_PATH . '/footer.php'); ?>