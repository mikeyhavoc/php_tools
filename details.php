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
    $item_result = single_item_query($id);


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
         <div class="col-xs-12 col-sm-6 col-md4">
             <?php
                $item = detail_item($item_result);
                echo $item;
             ?>

         </div>
        </div>
    </div>
</article>

























<?php //include (SHARED_PATH . '/footer.php');