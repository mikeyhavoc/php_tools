<?php
/**
 * Created by PhpStorm.
 * User: mikey
 * Date: 7/10/18
 * Time: 8:18 PM
 */
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="description" content="Garys tools, Privacy Page">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <title>Privacy Page</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="controllers/index.php">Garys Tools</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="./index">Home <span class="sr-only">(current)</span></a>

        </div>
    </div>
</nav>
<main role="main">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 id="intro" class="text-center">Privacy Policy</h1>
                <br class="br privacy__br">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="privacy__box">At Garys Tools, we care about your privacy and like transparency about what goes on.
                    Although we are a very small site, in this day and age that still does not mean we should have
                    a privacy page, and transparently inform you what we do with your data so you can feel safe in a
                    digital age that mostly feels uneasy.
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <ul class="text-left privacy__box">
                        <li><a href="#acceptance">1. Accepting the Privacy Policy</a> <br></li>
                        <li><a href="#area">2. Areas of Service</a></li>
                        <li><a href="#info">3. Information collected or Received</a></li>
                        <li><a href="#retention">Retention</a></li>
                        <li><a href="#thirdparty">This Party Tools</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 id="acceptance" class="text-center">1. Accepting the Privacy Policy</h2>
                    <p class="privacy__box">This site's sole base is to sell body tools <em>locally</em>. By accepting these our terms of use.
                        You understand why we are asking for the information we are. We are asking for contact information,
                        to contact you back about local tool body sales. If you disagree with the terms that here lie in the
                        privacy policy we also have a paper version of the sales list if you prefer.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center" id="area">2. Areas of Service</h2>
                    <p class="privacy__box">
                        Due to the decision of not shipping tools, and selling local only. We are only accepting buyers
                        in <strong>mainly Manatee, Sarasota Counties</strong> Fl of the United States. Which breaks downs too -
                    </p>
                    <ul class="privacy__box">
                        <li>Bradenton</li>
                        <li>Sarasota</li>
                        <li>Palmetto</li>
                        <li>Lakewood Ranch</li>
                    </ul>
                    <p class="privacy__box">
                        If you are somewhere <em>very near</em> to these areas you may ask, but there are no guarantees to sales.
                        due to being out of our area. At this time if you are from the <strong>E.U</strong> we are unable to serve
                        you, I apologize for that.

                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center" id="info">3. Information Collected or Received</h2>
                    <p class="privacy__box">
                        Information collected, we collect information in a form to contact you back.
                        We do not reuse this information for any other purpose, this informations will
                        not be put on any mailing lists, or be used for any other uses.
                        we do not store your information in any databases, intending on something for future use.
                        It is <em>only</em> to contact to you back and that is it.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center" id="retention">Retention</h2>
                    <p class="privacy__box">
                        Garys Tools will retain your information only for as long as is necessary for the purposes set
                        in this policy, and / or  to complete the sale or discussion with the customer before deletion.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center" id="thirdparty">Third Party Tools</h2>
                    <p class="privacy__box">
                        We do use third party tools and analytics on our web site to verify our site is running well.
                        They do not get or receive any information from the form though that is only for us to see and
                        to delete. The analytics are just to inspect the web pages wellness, and what people are most
                        interested in. while we strive to protect your personal information, we cannot guarantee its
                        absolute security.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center" id="contact">Questions / Concerns</h2>
                    <p class="privacy__box">
                        If you have any questions, concerns, suggestions about our Privacy Policy. Do not hesitate to contact
                        us below.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Leave Comments Below</h3>
                </div>
                <div class="cols-sm-12 text-center">

                    <form method="POST" action="https://formspree.io/mikeyjhavoc@gmail.com">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control" type="email" name="email" placeholder="Your email">
                        </div>
                        <div class="form-control">
                            <label for="comment">Comments</label>
                            <textarea class="form-control" name="comments" placeholder="Your message"></textarea>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-primary" value="send" type="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
</main>
<script async src="./node_modules/jquery/dist/jquery.min.js"></script>
<script async src="./node_modules/popper.js/dist/popper.min.js"></script>
<script async src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>
