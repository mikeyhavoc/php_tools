
<?php require_once('private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 10/30/17
 * Time: 7:52 PM
 */

$cats_table = [
    'wrenches' => 'Wrenches',
    'files' => 'Files',
    'bits' => 'Bits',
    'air_tools' => 'Air_tools',
    'ratchets' => 'Ratchets',
    'crimps' => 'Crimps',
    'drills' => 'Drills',
    'sockets' => 'Sockets',
    'removers' => 'Removers',
    'extensions' => 'Extensions',
    'screwdrivers' => 'Screwdrivers',
    'bars' => 'Bars',
    'cables' => 'Cables',
    'jacks' => 'Jacks',
    'misc' => 'Misc',
    'discs' => 'Wheels',
    'cch' => 'Hcc',
    'chisels' => 'Chisels',
    'hammers' => 'Hammers',
    'spoons' => 'Spoons',
    'vise_grips' => 'Visegrips',
    'blades' => 'Blades'
];


$query = "SELECT t.item as item, t.price as price, t.sold as sold, i.image as image, b.brand as brand, c.category as category FROM Tools AS t JOIN Images AS i ON t.t_id = i.t_id JOIN Brands AS b ON t.b_id = b.b_id JOIN Categories AS c ON t.c_id = c.c_id WHERE category like 'pry%'";
?>
<?php
  if ( isset($_GET['cat']) ) {
      if ( $_GET['cat'] == 'wrenches') {
          $page_name = 'Wrenches';
      } elseif ( $_GET['cat'] == 'files') {
          $page_name = 'Files';
      } elseif ( $_GET['cat'] == 'pliers') {
          $page_name = 'Pliers';
      } elseif ( $_GET['cat'] == 'bits') {
          $page_name = 'Bits';
      } elseif ( $_GET['cat'] == 'air_tools') {
          $page_name = 'Air Tools';
      } elseif ( $_GET['cat'] == 'ratchets') {
          $page_name = 'Ratchets';
      } elseif ( $_GET['cat'] == 'crimps') {
          $page_name = 'Crimps';
      } elseif ( $_GET['cat'] == 'drills') {
          $page_name = 'Drills';
      } elseif ( $_GET['cat'] == 'sockets') {
          $page_name = 'Sockets';
      } elseif ( $_GET['cat'] == 'removers') {
          $page_name = 'Removers';
      } elseif ( $_GET['cat'] == 'extensions') {
          $page_name = 'Extensions';
      } elseif ( $_GET['cat'] == 'screwdrivers') {
          $page_name = 'Screwdrivers';
      } elseif ( $_GET['cat'] == 'bars') {
          $page_name = 'Pry and Pic Bars';
      } elseif ( $_GET['cat'] == 'cables') {
          $page_name = 'Cables';
      } elseif ( $_GET['cat'] == 'jacks') {
          $page_name = 'Jacks';
      } elseif ( $_GET['cat'] == 'misc') {
          $page_name = 'Misc';
      } elseif ( $_GET['cat'] == 'discs') {
          $page_name = 'Discs';
      } elseif ( $_GET['cat'] == 'cch') {
          $page_name = 'Clamps/Chains/Hooks';
      } elseif ( $_GET['cat'] == 'chisels') {
          $page_name = 'Chisels';
      } elseif ( $_GET['cat'] == 'hammers') {
          $page_name = 'Hammers';
      } elseif ( $_GET['cat'] == 'spoons') {
          $page_name = 'Spoons';
      } elseif ( $_GET['cat'] == 'vise_grips') {
          $page_name = 'Vise Grips';
      } elseif ( $_GET['cat'] == 'blades') {
          $page_name = 'Blades';
      } else {
          $page_name = 'Full Catalog';
      }

  }

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

            <?php
            if ($result = $mysqli->query($query)) {
                while ($obj = $result->fetch_object()) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <article class="card">
                            <img src="<?php echo url_for($obj->image); ?>" alt="air tool" class="box-image-width box-image-height img-thumbnail img-responsive center-block">
                            <p class="text-center">

                            </p>
                        </article>
                    </div>
                <?php } // end inner while block?>
                <?php  mysqli_free_result($result); ?>
            <?php   } ?>




        </div>

    </section>
</main>

<?php require(SHARED_PATH . '/footer.php'); ?>
