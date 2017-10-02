<?php require_once('../../private/initialize.php');
      require_once '../../private/connection.php';
?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 7:02 PM
 */

    $wrench = 'wren%';
    $query = "SELECT t.item AS item, t.price AS price, t.sold AS sold, b.brand AS brand,
          c.category AS category FROM Tools AS t JOIN Images AS i ON t.t_id = i.t_id
          JOIN Brands AS b ON t.b_id = b.b_id JOIN Categories AS c ON t.c_id = c.c_id 
          WHERE category LIKE 'wren%'";






require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>

    <section>
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb ">
                    <li><a href="<?php echo rawurlencode(url_for('/index.php')); ?>">Home</a></li>
                    <li class="active"><a href="<?php echo rawurlencode(url_for('/public/pages/wrenches.php')); ?>">Wrenches</a></li>
                </ul>
            </div>
        </div>
    </section>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center large">
                    Wrenches
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="container-fluid">

            <?php
             if ($result = $mysqli->query($query)) {
                while ($obj = $result->fetch_object()) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <article class="card">
                            <img src="<?php echo url_for(IMAGES . $obj->image); ?>" alt="air tool" class="half img-thumbnail img-responsive center-block">
                            <p class="text-center">
                                Item: <?php echo $obj->item; ?><br>
                                Brand: <br>
                                Price: <?php echo $obj->price; ?><br>
                                <button class="btn btn-default btn-lg" value="<?php echo $obj->item; ?>">
                                    <a href="#"><?php echo $obj->item; ?></a>
                                </button>
                            </p>
                        </article>
                    </div>
                <?php } // end inner while block?>
                <?php  mysqli_free_result($result); ?>
                 <?php } ?>


        </section>
    </main>










<?php require(SHARED_PATH . '/footer.php'); ?>