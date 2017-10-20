<?php require_once('../../private/initialize.php'); ?>
<?php

$query = "SELECT t.item as item, t.price as price, t.sold as sold, i.image as image, b.brand as brand, c.category as category FROM Tools AS t JOIN Images AS i ON t.t_id = i.t_id JOIN Brands AS b ON t.b_id = b.b_id JOIN Categories AS c ON t.c_id = c.c_id WHERE category like 'cable%'";

$cable_query = $mysqli->query($query);
while ( $rows = mysqli_fetch_array($cable_query)) {
    var_dump($rows);
}
    if ( isset($rows) ){

    }

$cable = new Item();








require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>

    <section>
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb ">
                    <li><a href="<?php echo rawurlencode(url_for('/index.php')); ?>">Home</a></li>
                    <li class="active"><a href="<?php echo rawurlencode(url_for('/public/pages/cables.php')); ?>">Cables</a></li>
                </ul>
            </div>
        </div>
    </section>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center large">
                    Cables
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