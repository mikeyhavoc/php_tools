<?php require_once('../../private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 7/13/17
 * Time: 5:47 AM
 */
// dummy data testing !! take out for database later
require(PRIVATE_PATH . '/dum_data.php');
// !! future removal


require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>

<section>
    <div class="row">
        <div class="col-xs-12">
           <ul class="breadcrumb ">
               <li><a href="<?php echo rawurlencode(url_for('/index.php')); ?>">Home</a></li>
               <li><a href="<?php echo rawurlencode(url_for('/public/pages/air_tools.php')); ?>">Air Tools</a></li>
           </ul>
        </div>
    </div>
</section>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center large">
                    Air Tools
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <article class="card">
                        <img src="<?php echo url_for(IMAGES . '/images/med_img/air/b48_air.jpg'); ?>" alt="air tool" class="half left">
                        <p class="f-right text-center">
                            Item: a22<br>
                            Brand: Matco<br>
                        </p>



                    </article>
                </div>
            </div>
        </section>
    </main>










<?php require(SHARED_PATH . '/footer.php'); ?>


