<?php require_once('../../private/initialize.php'); ?>
<?php require_once '../../private/connection.php';
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 9/7/17
 * Time: 3:51 PM
 */



require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>


    <section>
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb ">
                    <li><a href="<?php echo rawurlencode(url_for('/index.php')); ?>">Home</a></li>
                    <li class="active"><a href="<?php echo rawurlencode(url_for('/public/pages/bars.php')); ?>">Pry and Pic Bars</a></li>
                </ul>
            </div>
        </div>
    </section>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center large">
                    Pry and Pic bars
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="container-fluid">

            <div class="row">

            </div>

        </section>
    </main>










<?php require(SHARED_PATH . '/footer.php'); ?>