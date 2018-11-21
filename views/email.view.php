<?php
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

    <!doctype html>
    <html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="garys tools, tools contact, bradenton tool sale">
        <meta name="description" content="Garys tools, retired bodyman selling his body tools locally in bradenton fl.">
        <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo url_for(node_module('public/css/main.css')); ?>">

        <title><?php echo $page_title; ?></title>
    </head>
<body>
<header role="banner" class='container-fluid'>
    <section class='row'>
        <h1 class="col-12 col-md-4 tools logo__section logo">
            <a class="logo__title logo" href="<?php echo url_for( 'index.php'); ?>">Garys Tools</a>
        </h1>
    </section>
</header>

<?php if (isset($_GET['status']) && ($_GET['status'] == 'thanks')) { ?>
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
            <div class="form-group form-check row">
                <div class="col-sm-12">
                    <section class="ml-3">
                        <input type="checkbox" class="form-check-input " id="verify" required>
                        <label for="verify" class="form-check-label">confirm live in Manatee, Sarasota counties or nearby.</label>
                    </section>
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
    </form>
    </section>
<?php } ?>

<?php include(SHARED_PATH . '/footer.php'); ?>