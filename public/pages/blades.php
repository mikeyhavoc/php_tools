<?php require_once('../../private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 9/7/17
 * Time: 5:41 PM
 */

$sql = "SELECT t.item as item, t.price as price, t.sold as sold, i.image as image, b.brand as brand, c.category as category FROM Tools AS t JOIN Images AS i ON t.t_id = i.t_id JOIN Brands AS b ON t.b_id = b.b_id JOIN Categories AS c ON t.c_id = c.c_id WHERE category like 'blade%'";



require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>

    <section>
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb ">
                    <li><a href="<?php echo rawurlencode(url_for('/index.php')); ?>">Home</a></li>
                    <li class="active"><a href="<?php echo rawurlencode(url_for('/public/pages/blades.php')); ?>">Blades</a></li>
                </ul>
            </div>
        </div>
    </section>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center large">
                    Blades
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="container-fluid">

            <div class="row">
                <?php
                if ($result = $mysqli->query($sql)) {
                    while ($bits = $result->fetch_object()) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <article class="card">
                                <img src="<?php echo url_for(IMAGES .  $bits->image); ?>" alt="bits" class="box-size-images box-size-blade img-thumbnail img-responsive center-block">
                                <p class="text-center">
                                    Item: <?php echo $bits->item; ?><br>
                                    Brand: <br>
                                    Price: <?php echo $bits->price; ?><br>
                                    <button class="btn btn-default btn-lg" value="<?php echo $bits->item; ?>">
                                        <a href="#"><?php echo $bits->item; ?></a>
                                    </button>
                                </p>
                            </article>
                        </div>
                    <?php } // end inner while block?>
                    <?php  mysqli_free_result($result); ?>
                <?php } ?>
            </div>

        </section>
    </main>










<?php require(SHARED_PATH . '/footer.php'); ?>