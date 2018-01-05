
<?php require_once('private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 10/30/17
 * Time: 7:52 PM
 */

$multi_item_query = "SELECT t.t_id as id, t.item_code as code, t.item_name as name,
                                    t.retail_price as retail, t.sale_price as price,
                                    t.item_pieces as  pieces, t.qty as quantity,
                                    t.sold as sold, t.description as description,
                                    b.brand as brand, c.category as category,
                                    tt.tool_type as sections, i.image as image
                                   FROM Tools as t
                                   INNER JOIN Brands as b on t.b_id = b.b_id
                                   INNER JOIN Categories as c ON t.c_id = c.c_id
                                   INNER JOIN Images AS i ON t.t_id = i.t_id
                                   LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id
                                   WHERE tt.tool_type = :tool";

?>
<?php
  if ( isset($_GET['cat']) ) {
      if ( $_GET['cat'] == 'wrenches') {
          $page_name = 'Wrenches';
          $section = 'wrenches';
          $param = 'wrenches';
      } elseif ( $_GET['cat'] == 'files') {
          $page_name = 'Files';
          $section = 'files';
          $param = 'files';
      } elseif ( $_GET['cat'] == 'pliers') {
          $page_name = 'Pliers';
          $section = 'pliers';
          $param = 'pliers';
      } elseif ( $_GET['cat'] == 'bits') {
          $page_name = 'Bits';
          $section = 'bits';
          $param = 'bits';
      } elseif ( $_GET['cat'] == 'air_tools') {
          $page_name = 'Air Tools';
          $section = 'air-tools';
          $param = 'air-tools';
      } elseif ( $_GET['cat'] == 'ratchets') {
          $page_name = 'Ratchets';
          $section = 'ratchets';
          $param = 'ratchets';
      } elseif ( $_GET['cat'] == 'crimps') {
          $page_name = 'Crimps';
          $section = 'crimps';
          $param = 'crimps';

      } elseif ( $_GET['cat'] == 'sockets') {
          $page_name = 'Sockets';
          $section = 'sockets';
          $param = 'sockets';
      } elseif ( $_GET['cat'] == 'removers') {
          $page_name = 'Removers';
          $section = 'removers';
          $param = 'removers';
      } elseif ( $_GET['cat'] == 'extensions') {
          $page_name = 'Extensions';
          $section = 'extensions';
          $param = 'extensions';
      } elseif ( $_GET['cat'] == 'screwdrivers') {
          $page_name = 'Screwdrivers';
          $section = 'screwdrivers';
          $param = 'screwdrivers';
      } elseif ( $_GET['cat'] == 'bars') {
          $page_name = 'Pry and Pic Bars';
          $section = 'bars';
          $param = 'bars';
      } elseif ( $_GET['cat'] == 'cables') {
          $page_name = 'Cables';
          $section = 'cables';
          $param = 'cables';
      } elseif ( $_GET['cat'] == 'jacks') {
          $page_name = 'Jacks';
          $section = 'jacks';
          $param = 'jacks';
      } elseif ( $_GET['cat'] == 'misc') {
          $page_name = 'Misc';
          $section = 'misc';
          $param = 'misc';
      } elseif ( $_GET['cat'] == 'discs') {
          $page_name = 'Discs';
          $section = 'wheels';
          $param = 'wheels';
      } elseif ( $_GET['cat'] == 'cch') {
          $page_name = 'Clamps/Chains/Hooks';
          $section = 'hcc';
          $param = 'hcc';
      } elseif ( $_GET['cat'] == 'chisels') {
          $page_name = 'Chisels';
          $section = 'chisels';
          $param = 'chisels';
      } elseif ( $_GET['cat'] == 'hammers') {
          $page_name = 'Hammers';
          $section = 'hammers';
          $param = 'hammers';
      } elseif ( $_GET['cat'] == 'spoons') {
          $page_name = 'Spoons';
          $section = 'spoons';
          $param = 'spoons';
      } elseif ( $_GET['cat'] == 'vise_grips') {
          $page_name = 'Vise Grips';
          $section = 'vise_grips';
          $param = 'vise_grips';
      } elseif ( $_GET['cat'] == 'blades') {
          $page_name = 'Blades';
          $section = 'blades';
          $param = 'blades';
      } else {
          $page_name = 'Full Catalog';
          $section = null;

      }

  }

$con = $db;
$variables[':tool'] = $param;


?>

<?php

require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>


<header class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="text-center">
                <?php if (isset($page_name)) { echo $page_name;  } ?>
            </h1>
        </div>
    </div>
</header>
<main>
    <section class="container-fluid">

        <div class="row">
            <?php   $items = execute_query($con, $multi_item_query, $variables)->fetchAll(); ?>
            <?php foreach ( $items as $item) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <article class='card detail-top'>
                            <h1>Code:<?php echo $item['code']; ?></h1>
                            <aside><img class='half right catalog-images' src='<?php echo IMAGES . $item['image']; ?>' alt='<?php echo $item['description']; ?>'></aside>
                            <h3>Name:<?php echo $item['name']; ?></h3>

                            <h3>Brand:<?php echo $item['brand']; ?></h3>
                            <h4>Category:<?php echo $item['category']; ?></h4>
                            <h4>Quantity:<?php echo $item['quantity']; ?></h4>
                            <h4>Price:<?php echo $price = ($item['price'] = 0 ? 'Make offer' :  '$' . $item['price']); ?></h4>
                            <h4>Sold:<?php echo  $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>
                         </article>
                    </div>
            <?php } ?>

        </div>

    </section>
</main>

<?php require(SHARED_PATH . '/footer.php'); ?>
