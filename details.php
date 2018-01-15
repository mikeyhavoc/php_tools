

<?php require_once('private/initialize.php');

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 12/21/17
 * Time: 11:52 PM
 */
$id_num = $_GET['id']; // grabbing Global Variable GET id
$id = filter_var($id_num, FILTER_SANITIZE_NUMBER_INT); // filtering and sanitizing number going into array for value.
$con = $db; // the connection to the db.
// single item SQL Query.
try {
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
$variables[':id'] = $id;

    $items = execute_query($con, $single_item_full_query, $variables)->fetchAll();

}catch(PDOException $e) {
   echo $e->getMessage();
}
try {
    $single_images_item_query = "SELECT t.t_id as id,
                                  t.description as description,
                                  i.image as image
                                  FROM Tools as t
                                  JOIN Images as i
                                  ON t.t_id = i.t_id
                                  WHERE t.t_id = :image";
    $var[':image'] = $id_num;
    $images = execute_query($con, $single_images_item_query, $var)->fetchAll();

}catch(PDOException $e){
    echo $e->getMessage();
}

try {
    $single_item_breadcrumb_query = "SELECT t.item_code as code,  c.tool_type as category
                           FROM Tools as t
                           JOIN Types c ON t.tt_id = c.tt_id
                           WHERE t.t_id = :breadcrumb LIMIT 1";
    $crumbs[':breadcrumb'] = $id_num;
    $breadcrumb = execute_query($con, $single_item_breadcrumb_query, $crumbs);

}catch(PDOException $e) {
    echo $e->getMessage();
}
$pageTitle = 'Details';
include(SHARED_PATH . '/header.php');
include (SHARED_PATH . '/nav.php');
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo url_for('index.php'); ?>">Home</a></li>
                <?php if(isset($breadcrumb)) { ?>
                <?php foreach ($breadcrumb as $crumb) { ?>
                    <li class="breadcrumb-item"><a href="catalog.php?cat=<?php echo $crumb['category']; ?>"><?php echo $crumb['category']; ?></a></li>
                    <li class="breadcrumb-item active"><?php echo $crumb['code']; ?></li>
                <?php } ?>
                <?php } /* isset for breadcrumb*/?>
            </ol>
        </nav>
    </div><!--/col-12-->
</div><!-- /.row -->


<section>
    <div class="container">
        <div class="row">
                <?php if(isset($items)) {   ?>
                <?php foreach ( $items as $item) { ?>
                    <div class="col-12 col-sm-6">
                        <article role="article" class='card'>
                            <h1>Code: <?php echo $item['code']; ?></h1>
                            <h3>Name: <?php echo $item['name']; ?></h3>
                            <h3>Brand:<?php echo $item['brand']; ?></h3>
                            <h4>Category: <?php echo $item['category']; ?></h4>
                            <h4>Pieces: <?php echo $item['pieces']; ?></h4>
                            <h4>Quantity: <?php echo $item['quantity']; ?></h4>
                            <h4>Retail Price $ <?php echo $retail = ($item['retail'] == 0 ? ' N/A' : $item['retail']); ?></h4>
                            <h4>Price: <?php echo $price = ($item['price'] == 0 ? 'Make offer' : '$' . $item['price']); ?></h4>
                            <h4 class="sale">Sold: <?php echo  $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>
                            <h4>Code: <?php echo $item['code']; ?></h4>
                            <p>Description: <?php echo $item['description']; ?></p>

                        </article>
                    </div>

                <?php } ?>
            <?php } /* isset for $items */?>
                <?php if(isset($images)) { ?>
                <?php  foreach ($images as $image) { ?>
                    <div class="col-12 col-sm-6">
                        <img class='card' src='<?php echo IMAGES . $image['image']; ?>' alt='<?php echo $image['description']; ?>'>
                    </div>
                <?php  } ?>
            <?php } /* images isset */?>

    </div>
<section/>
<?php
require(SHARED_PATH . '/footer.php');
?>
