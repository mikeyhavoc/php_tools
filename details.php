<?php require_once('private/initialize.php');
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 12/21/17
 * Time: 11:52 PM
 */


if (isset($_get['t_id'])) {
    $id = filter_input(INPUT_GET, $test, FILTER_SANITIZE_NUMBER_INT);
    $tool = single_item_query($id);
    var_dump($tool);
}

//if (!isset($item)) {
//    header("location:catalog.php");
//    exit;
//}

$pageTitle = $item->name;
$section = null;

include(SHARED_PATH . '/header.php');
include (SHARED_PATH . '/nav.php');

?>

<?php

    ?>


























<?php //include (SHARED_PATH . '/footer.php');