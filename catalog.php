
<?php require_once('private/initialize.php'); ?>
<?php /**
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
      } elseif ( $_GET['cat'] == 'air-tools') {
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
          $page_name = 'home';
          $section = null;
      }
  }

$con = $db; // grab db to con for connection into queries.

if (isset($param)) {
    $first_item_query = "SELECT t.t_id AS id, t.item_code AS code, t.item_name AS name,
                       t.retail_price AS retail, t.sale_price AS price,
                       t.item_pieces AS  pieces, t.qty AS quantity,
                       t.sold AS sold, t.description AS description,
                       b.brand AS brand, c.category AS category,                                  
                       tt.tool_type AS section, i.image AS image
                       FROM Tools AS t
                       INNER JOIN Brands AS b ON t.b_id = b.b_id
                       INNER JOIN Categories AS c ON t.c_id = c.c_id
                       INNER JOIN Images AS i ON t.t_id = i.t_id
                       LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id
                       WHERE tt.tool_type = :tool AND i.image_num = 1";
    $variables[':tool'] = $param;
    $items = execute_query($con, $first_item_query, $variables);

    }



//    $multi_item_query = "SELECT t.t_id AS id, t.item_code AS code, t.item_name AS name,
//                                    t.retail_price AS retail, t.sale_price AS price,
//                                    t.item_pieces AS  pieces, t.qty AS quantity,
//                                    t.sold AS sold, t.description AS description,
//                                    b.brand AS brand, c.category AS category,
//                                    tt.tool_type AS section, i.image AS image
//                                   FROM Tools AS t
//                                   INNER JOIN Brands AS b ON t.b_id = b.b_id
//                                   INNER JOIN Categories AS c ON t.c_id = c.c_id
//                                   INNER JOIN Images AS i ON t.t_id = i.t_id
//                                   LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id
//                                   WHERE tt.tool_type = :tool";
//}
if (isset($param)) {
    $breadcrumb_query = "SELECT c.tool_type AS category
                     FROM Tools AS t
                     JOIN Types c ON t.tt_id = c.tt_id
                     WHERE c.tool_type = :breadcrumb LIMIT 1";
    $crumbs[':breadcrumb'] = $param;
    $breadcrumb = execute_query($con, $breadcrumb_query, $crumbs);
}
?>
<?php
$page_title = 'Tool Catalog';
require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>

<section id="#top" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">
                <?php if (isset($page_name)) { echo $page_name;  } ?>
            </h1>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="" aria-current="page" href="<?php echo url_for('index.php'); ?>">Home</a></li>
                <?php if(isset($breadcrumb)) { ?>
                    <?php foreach ($breadcrumb as $crumb) { ?>
                        <li class="breadcrumb-item active">
                            <a href="catalog.php?cat=<?php echo $crumb['category']; ?>"><?php echo $crumb['category']; ?></a>
                        </li>
                    <?php } //end foreach?>
                <?php } ?>
            </ol>

        </nav>
    </div>
</section>

    <section class="container-fluid">
        <div class="row">
           <?php if (isset($items)) { ?>
            <?php foreach ( $items as $item) { ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="container-fluid">
                        <article class="cards">
                                  <div class="col-12">

                                       <section class="card-holder" id="<?php echo $item['code']; ?>">

                                            <section class="card code">
                                                <h2 class="cat-order-code bottom-drop center" data-code="<?php echo $item['code']; ?>">Code: <?php echo $item['code']; ?></h2>

                                                <h3 class="cat-order-name center"><?php echo $item['name']; ?></h3>

                                                <img class="cat-order-image thumbnail box-image-width" src="<?php echo IMAGES .  $item['image']; ?>" alt="<?php echo $item['description']; ?>">


                                                <h4 class="cat-order-price" data-value="<?php echo $item['price']; ?>">Price: <?php echo $price = ($item['price'] = 0 ? 'Make offer' :  '$' . $item['price']); ?></h4>

                                                <h4 class="cat-order-sold sale"><?php echo $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>

                                                <a class="cat-order-btn btn btn-lg btn-outline-danger btn-width center-block"  href='details.php?id=<?php echo $item['id']; ?>'>
                                                    More Info
                                                </a>
                                            </section>
                                       </section><!--/card-holder-->
                                  </div>
                                    <!-- /.row -->
                        </article>
                </div>
            </div>
                   <!-- /.col-sm-6 -->
            <?php } //end foreach?>
            <?php } //end isset items?>
        </div>
        <!-- /.row -->
    </section>
</main>
<?php include(SHARED_PATH . '/footer.php'); ?>
