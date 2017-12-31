<?php require_once('private/initialize.php');
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 12/21/17
 * Time: 11:52 PM
 */



if (isset($_GET['id'])) {
    $id_num = $_GET['id'];
    $id = filter_var($id_num, FILTER_SANITIZE_NUMBER_INT);
    // pulls the id from the catalog page. with the $_GET global variable.
    // and transfers it to $id_num to use in this page. filter_var for SQL/Injections
    // workaround from other form. $id equals item number to pull item from group.
    $item_result = single_item_query($id);


    $image_results = single_item_images_query($id);
    $image = filter_var($image_results, FILTER_SANITIZE_NUMBER_INT);
    // single_item_images_query -> query all images, pulls all images into an array.




    var_dump($image);

}


//if (empty($item)) {
//    header("location:catalog.php");
//    exit;
//}

$pageTitle = 'Details';

include(SHARED_PATH . '/header.php');
include (SHARED_PATH . '/nav.php');

?>

<article>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
             <?php
                $item = detail_single_item($item_result);
                echo $item;
             ?>
            </div>
            <?php  $pics = detail_images($item_result);
                 foreach($image_results as $pic) { ?>
            <div class="col-xs-12 col-sm-6">
                <?php $image = detail_images($pic);
                      echo $image; ?>
            </div>
                     <?php } ?>
        </div>
    </div>
</article>

























<?php //include (SHARED_PATH . '/footer.php');