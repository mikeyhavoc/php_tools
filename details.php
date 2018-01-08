

<?php require_once('private/initialize.php');

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 12/21/17
 * Time: 11:52 PM
 */



// single item SQL Query.
$single_item_full_query = "SELECT t.item_code AS code, t.item_name AS name, 
                      t.retail_price AS retail, t.sale_price AS price, 
                      t.item_pieces AS pieces, t.qty AS quantity, t.sold AS sold,
                      b.brand AS brand, c.category AS category, tt.tool_type AS tool_type,
                      t.description AS description,
                      i.image as images FROM Tools AS t
                      INNER JOIN Brands AS b ON t.b_id = b.b_id
                      INNER JOIN Categories AS c ON t.c_id = c.c_id
                      INNER JOIN Images AS i ON i.t_id = t.t_id 
                      LEFT OUTER JOIN Types AS tt ON tt.tt_id = t.tt_id
                      WHERE t.t_id = :id LIMIT 1";

$single_images_item_query = "SELECT t.t_id as id,
                                  t.description as description,
                                  i.image as image
                                  FROM Tools as t
                                  JOIN Images as i
                                  ON t.t_id = i.t_id
                                  WHERE t.t_id = :image";

$single_item_breadcrumb_query = "SELECT t.item_code as code,  c.tool_type as category
                           FROM Tools as t
                           JOIN Types c ON t.tt_id = c.tt_id
                           WHERE t.t_id = :breadcrumb LIMIT 1";

$id_num = $_GET['id']; // grabbing Global Variable GET id
$id = filter_var($id_num, FILTER_SANITIZE_NUMBER_INT); // filtering and sanitizing number going into array for value.

$con = $db;
$variables[':id'] = $id;
$var[':image'] = $id_num;

$crumbs[':breadcrumb'] = $id_num;



$pageTitle = 'Details';

include(SHARED_PATH . '/header.php');
include (SHARED_PATH . '/nav.php');

?>
<div class="col-xs-12">
    <ol class="breadcrumb">
        <li><a href="<?php echo url_for('index.php'); ?>">Home</a></li>
        <?php $breadcrumb = execute_query($con, $single_item_breadcrumb_query, $crumbs); ?>
        <?php foreach ($breadcrumb as $crumb) { ?>
            <li><a href="catalog.php?cat=<?php echo $crumb['category']; ?>"><?php echo $crumb['category']; ?></a></li>
            <li><a href="details.php?id='<?php echo $crumb['code']; ?>'"><?php echo $crumb['code']; ?></a></li>
        <?php } ?>
    </ol>
</div>

<article>
    <div class="container">
        <div class="row">
                <?php   $items = execute_query($con, $single_item_full_query, $variables)->fetchAll(); ?>
                <?php foreach ( $items as $item) { ?>
                    <div class="col-xs-12 col-sm-6">
                        <article class='card'>
                            <h1>Code: <?php echo $item['code']; ?></h1>
                            <h3>Name: <?php echo $item['name']; ?></h3>
                            <h3>Brand:<?php echo $item['brand']; ?></h3>
                            <h4>Category: <?php echo $item['category']; ?></h4>
                            <h4>Pieces: <?php echo $item['pieces']; ?></h4>
                            <h4>Quantity: <?php echo $item['quantity']; ?></h4>
                            <h4>Retail Price $ <?php echo $retail = ($item['retail'] == 0 ? ' N/A' : $item['retail']); ?></h4>
                            <h4>Price: <?php echo $price = ($item['price'] == 0 ? 'Make offer' : '$' . $item['price']); ?></h4>
                            <h4>Sold: <?php echo  $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>
                            <h4>Code: <?php echo $item['code']; ?></h4>
                            <p>Description: <?php echo $item['description']; ?></p>

                        </article>
                    </div>

                <?php } ?>

                <?php $images = execute_query($con, $single_images_item_query, $var)->fetchAll(); ?>
                <?php  foreach ($images as $image) { ?>
                    <div class="col-xs-12 col-sm-6">
                        <img class='third card' src='<?php echo IMAGES . $image['image']; ?>' alt='<?php echo $image['description']; ?>'>
                    </div>
                <?php  } ?>



    </div>
</article>
<?php
require(SHARED_PATH . '/footer.php');
?>
