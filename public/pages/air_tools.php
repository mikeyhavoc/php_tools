<?php require_once('../../private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 7/13/17
 * Time: 5:47 AM
 */

    require_once '../../private/connection.php';
    if ($mysqli->connect_error) {
        die("$mysqli->connect_errno: $mysqli->connect_error");
    }
    $query = 'SELECT t.item, t.price, t.sold, i.image, b.brand FROM Tools AS t JOIN Images AS i ON t.t_id = i.t_id JOIN Brands AS b ON t.b_id = b.b_id';
    $stmt = $mysqli->query($query)
/* prepare statement */


    /* Bind variable for placeholder */



    /* execute statement */
  ;

    printf("rows inserted: %d\n", $stmt = $mysqli->affected_rows);

    /* close statement */
    $mysqli->close();




require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>


<section>
    <div class="row">
        <div class="col-xs-12">
           <ul class="breadcrumb ">
               <li><a href="<?php echo rawurlencode(url_for('/index.php')); ?>">Home</a></li>
               <li class="active"><a href="<?php echo rawurlencode(url_for('/public/pages/air_tools.php')); ?>">Air Tools</a></li>
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

                <?php
                if (isset($stmt)) {
                foreach ($stmt as $tool) : { ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <article class="card">
                        <img src="<?php echo url_for($tool['image']); ?>" alt="air tool" class="half img-thumbnail img-responsive center-block">
                        <p class="text-center">
                            Item: <?php echo $tool['i.item']; ?><br>
                            Brand: <?php echo $tool['b.brand']; ?><br>
                            Price: <?php echo $tool['t.price']; ?><br>
                            <button class="btn btn-default btn-lg">
                                <a href="#"><?php echo $tool['t.item']; ?></a>
                            </button>
                        </p>

                    </article>

                </div>
                <?php } endforeach; ?>
                <?php } ?>

            </div>

        </section>
    </main>

<?php require(SHARED_PATH . '/footer.php'); ?>