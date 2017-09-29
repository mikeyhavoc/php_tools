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

    $query = "SELECT t.item, t.price, t.sold, i.image, b.brand, c.category FROM Tools AS t JOIN Images AS i ON t.t_id = i.t_id JOIN Brands AS b ON t.b_id = b.b_id JOIN Categories AS c ON t.c_id = c.c_id WHERE c.category LIKE 'wren%'";
//    $stmt = $mysqli->query($query)
?>
<?php
if ($mysqli->multi_query($query)) {
    do {
        if ($result = $mysqli->use_result()) {
            while ($row = $result->fetch_row()) {
?>
                Item: <?php echo $row[0]; ?><br>
                Brand: <?php echo $row[4]; ?><br>
                Price: <?php echo $row[1]; ?><br>
                <?php $result->close(); ?>
                            <?php } // end inner while block?>
                            <?php  $result->close(); ?>
                        <?php      }
    } while ($mysqli->next_result());
    $mysqli->close();
} ?>


<?php

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
                if ($mysqli->multi_query($query)) {
                        do{
                            if ($result = $mysqli->use_result()) {
                                while ($row = $result->fetch_row()); { ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <article class="card">
<!--                        <img src="--><?php //echo url_for($row[2]); ?><!--" alt="air tool" class="half img-thumbnail img-responsive center-block">-->
                        <p class="text-center">
                            Item: <?php echo $row[0]; ?><br>
                            Brand: <br>
                            Price: <?php echo $row[1]; ?><br>
                            <button class="btn btn-default btn-lg">
                                <a href="#"></a>
                            </button>
                        </p>
                    </article>
                </div>
                              <?php } // end inner while block?>
                              <?php  $result->close(); ?>
                         <?php   }
                    }while($mysqli->next_result()); // end while block?>
                <?php } // end if multi_query?>


            </div>

        </section>
    </main>

<?php require(SHARED_PATH . '/footer.php'); ?>
