

<?php require_once('private/initialize.php');

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 12/21/17
 * Time: 11:52 PM
 */

$id_num = $_GET['id']; // grabbing Global Variable GET id
$id = filter_var($id_num, FILTER_SANITIZE_NUMBER_INT); // filtering and sanitizing number going into array for value.

// single item SQL Query.
$single_item_full_query = "SELECT t.item_code AS code, t.item_name AS name, 
                      t.retail_price AS retail, t.sale_price AS price, 
                      t.item_pieces AS pieces, t.qty AS quantity, t.sold AS sold,
                      b.brand AS brand, c.category AS category, tt.tool_type AS tool_type,
                      t.description AS description FROM Tools AS t
                      INNER JOIN Brands AS b ON t.b_id = b.b_id
                      INNER JOIN Categories AS c ON t.c_id = c.c_id 
                      LEFT OUTER JOIN Types AS tt ON tt.tt_id = t.tt_id
                      WHERE t.t_id = :id";

$single_images_item_query = "SELECT t.t_id as id,
                                  t.item_name as name,
                                  i.image as image
                                  FROM Tools as t
                                  JOIN Images as i
                                  ON t.t_id = i.t_id
                                  WHERE t.t_id = :id";

$con = $db;
$statements = array(); // Prepare a statement array.
$id = array(
            'string' => ':id',
            'value' =>  $id_num,
            'type' => PDO::PARAM_INT
);

$statement[] = $id;




$pageTitle = 'Details';

include(SHARED_PATH . '/header.php');
include (SHARED_PATH . '/nav.php');

?>

<article>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <?php   $items = execute_query($con, $multi_item_query, $variables)->fetchAll(); ?>
                <?php foreach ( $items as $item) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <article class='card detail-top'>
                            <h1>Code:<?php echo $item['code']; ?></h1>
                            <h3>Name:<?php echo $item['name']; ?></h3>
                            <aside><img class='half right' src='<?php echo IMAGES . $item['image']; ?>' alt='<?php echo $tool['description']; ?>'></aside>
                            <h3>Brand:<?php echo $item['brand']; ?></h3>
                            <h4>Category:<?php echo $item['category']; ?></h4>
                            <h4>Pieces:<?php echo $item['pieces']; ?></h4>
                            <h4>Quantity:<?php echo $item['quantity']; ?></h4>
                            <h4>Retail Price $<?php $item['retail']; ?></h4>
                            <h4>Price:<?php $price = ($item['price'] == 0 ? 'Make offer' : '$' . $item['price']); ?></h4>
                            <h4>Sold:<?php echo  $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>
                            <h4>Code:<?php echo $item['code']; ?></h4>
                            <p>Description:<?php echo $item['description']; ?></p>

                        </article>
                    </div>
                <?php } ?>








        </div>
    </div>
</article>
<?php
require(SHARED_PATH . '/footer.php');
?>
