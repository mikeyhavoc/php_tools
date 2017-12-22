
<?php require_once('private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 10/30/17
 * Time: 7:52 PM
 */




?>

<?php
  if ( isset($_GET['cat']) ) {
      if ( $_GET['cat'] == 'wrenches') {
          $page_name = 'Wrenches';
          $section = 'wrenches';
      } elseif ( $_GET['cat'] == 'files') {
          $page_name = 'Files';
          $section = 'files';
      } elseif ( $_GET['cat'] == 'pliers') {
          $page_name = 'Pliers';
          $section = 'pliers';
      } elseif ( $_GET['cat'] == 'bits') {
          $page_name = 'Bits';
          $section = 'bits';
      } elseif ( $_GET['cat'] == 'air_tools') {
          $page_name = 'Air Tools';
          $section = 'air-tools';
      } elseif ( $_GET['cat'] == 'ratchets') {
          $page_name = 'Ratchets';
          $section = 'ratchets';
      } elseif ( $_GET['cat'] == 'crimps') {
          $page_name = 'Crimps';
          $section = 'crimps';
      } elseif ( $_GET['cat'] == 'drills') {
          $page_name = 'Drills';
          $section = 'drills';
      } elseif ( $_GET['cat'] == 'sockets') {
          $page_name = 'Sockets';
          $section = 'sockets';
      } elseif ( $_GET['cat'] == 'removers') {
          $page_name = 'Removers';
          $section = 'removers';
      } elseif ( $_GET['cat'] == 'extensions') {
          $page_name = 'Extensions';
          $section = 'extensions';
      } elseif ( $_GET['cat'] == 'screwdrivers') {
          $page_name = 'Screwdrivers';
          $section = 'screwdrivers';
      } elseif ( $_GET['cat'] == 'bars') {
          $page_name = 'Pry and Pic Bars';
          $section = 'bars';
      } elseif ( $_GET['cat'] == 'cables') {
          $page_name = 'Cables';
          $section = 'cables';
      } elseif ( $_GET['cat'] == 'jacks') {
          $page_name = 'Jacks';
          $section = 'jacks';
      } elseif ( $_GET['cat'] == 'misc') {
          $page_name = 'Misc';
          $section = 'misc';
      } elseif ( $_GET['cat'] == 'discs') {
          $page_name = 'Discs';
          $section = 'wheels';
      } elseif ( $_GET['cat'] == 'cch') {
          $page_name = 'Clamps/Chains/Hooks';
          $section = 'hcc';
      } elseif ( $_GET['cat'] == 'chisels') {
          $page_name = 'Chisels';
          $section = 'chisels';
      } elseif ( $_GET['cat'] == 'hammers') {
          $page_name = 'Hammers';
          $section = 'hammers';
      } elseif ( $_GET['cat'] == 'spoons') {
          $page_name = 'Spoons';
          $section = 'spoons';
      } elseif ( $_GET['cat'] == 'vise_grips') {
          $page_name = 'Vise Grips';
          $section = 'vise_grips';
      } elseif ( $_GET['cat'] == 'blades') {
          $page_name = 'Blades';
          $section = 'blades';
      } else {
          $page_name = 'Full Catalog';
          $section = null;
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

<!--            --><?php
                    $tools = select_query();
                    foreach($tools as $obj)  {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <article class="card">
<!--                            <img src="--><?php //echo url_for($obj->image); ?><!--" alt="air tool" class="box-image-width box-image-height img-thumbnail img-responsive center-block">-->
                            <p class="text-center">
                                Item: <?php echo $obj->name; ?><br>
                                Brand: <br>
                                Price: <?php echo $obj->price; ?><br>
                                <button class="btn btn-default btn-lg" value="<?php echo $obj->name; ?>">
                                    <a href="#"><?php echo $obj->code; ?></a>
                                </button>
                            </p>
                        </article>
                    </div>
                    <?php }  ?>







        </div>

    </section>
</main>

<?php require(SHARED_PATH . '/footer.php'); ?>
