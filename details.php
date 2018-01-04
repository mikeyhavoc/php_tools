

<?php require_once('private/initialize.php');

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 12/21/17
 * Time: 11:52 PM
 */

// single item
$query_single_item = 'SELECT t.item_code AS code, '
                     . 't.item_name AS name, t.retail_price AS retail, '
                     . 't.sale_price AS price, t.item_pieces AS pieces, t.qty AS quantity, '
                     . 't.sold AS sold, b.brand AS brand, c.category AS category, '
                     . 'tt.tool_type AS tool_type, '
                     . 't.description AS description '
                     . 'FROM Tools AS t '
                     . 'INNER JOIN Brands AS b ON t.b_id = b.b_id '
                     . 'INNER JOIN Categories AS c ON t.c_id = c.c_id '
                     . 'LEFT OUTER JOIN Types AS tt ON tt.tt_id = t.tt_id '
                     . 'WHERE t.t_id = :id';




if (isset($_GET['id'])) {
    $id_num = $_GET['id'];
    $id = filter_var($id_num, FILTER_SANITIZE_NUMBER_INT);
    // pulls the id from the catalog page. with the $_GET global variable.
    // and transfers it to $id_num to use in this page. filter_var for SQL/Injections
    // workaround from other form. $id equals item number to pull item from group.
    $item_result = single_item_query($id);


    $image_num = single_item_images_query($id_num);
    //$image_num_result = filter_var($image_num, FILTER_SANITIZE_NUMBER_INT);
    // single_item_images_query -> query all images, pulls all images into an array.
}
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
            <?php
                   foreach($image_num as $image) {
                          $pics = detail_images($image); ?>
            <div class="col-xs-12 col-sm-6">
                <?php echo $pics; ?>

            </div>
                       <?php } ?>
        </div>
    </div>
</article>
<?php
require(SHARED_PATH . '/footer.php');
?>
