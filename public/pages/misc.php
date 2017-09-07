<?php require_once('../../private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 9/7/17
 * Time: 4:36 PM
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
                    <li class="active"><a href="<?php echo rawurlencode(url_for('/public/pages/misc.php')); ?>">Misc Tools</a></li>
                </ul>
            </div>
        </div>
    </section>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center large">
                    Misc Tools
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="container-fluid">

            <div class="row">
                <?php foreach ($tools as $tool) : { ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <article class="card">
                            <img src="<?php echo url_for(IMAGES . '/images/med_img/air/b48_air.jpg'); ?>" alt="air tool" class="half img-thumbnail img-responsive center-block">
                            <p class="text-center">
                                Item: <?php echo $tool['item']; ?><br>
                                Brand: <?php echo $tool['brand']; ?><br>
                                Price: <?php echo $tool['price']; ?><br>
                                <button class="btn btn-default btn-lg">
                                    <a href="#"><?php echo $tool['item']; ?></a>
                                </button>
                            </p>

                        </article>

                    </div>
                <?php } endforeach; ?>
            </div>

        </section>
    </main>










<?php require(SHARED_PATH . '/footer.php'); ?>