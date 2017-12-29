<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 2:31 PM
 */

// script function to connect urls to root path.
function url_for($script_path) {
    // adds leading '/' if not present.
    if ($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }

    return WWW_ROOT . $script_path;
}

/**
 * @param $id
 * @return mixed
 */
function single_item_query($id) {
    try {
        include('connection.php');
        if(isset($db))
        $tools = $db->prepare("SELECT t.item_code as code, t.item_name as name, t.retail_price as retail,
                                t.sale_price as price, t.item_pieces as pieces, t.qty as quantity,
                                 t.sold as sold, b.brand as brand, c.category as category, tt.tool_type as tool_type 
                                 FROM Tools AS t 
                                 JOIN Brands AS b ON t.b_id = b.b_id 
                                 JOIN Categories AS c ON t.c_id = c.c_id 
                                 LEFT OUTER JOIN Types as tt ON tt.tt_id = t.tt_id
                                 WHERE t.t_id = ?");
        $tools->bindParam(1, $id, PDO::PARAM_INT);
        $tools->execute();

    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetch(PDO::FETCH_ASSOC);
    return $tool;
}

function multi_item_query() {
    try {
        include('connection.php');
        if(isset($db))
            $tools = $db->prepare("SELECT t.item_code as code, t.item_name as name, t.retail_price as retail,
                                t.sale_price as price, t.item_pieces as pieces, t.qty as quantity,
                                 t.sold as sold, b.brand as brand, c.category as category, tt.tool_type as tool_type 
                                 FROM Tools AS t 
                                 JOIN Brands AS b ON t.b_id = b.b_id 
                                 JOIN Categories AS c ON t.c_id = c.c_id 
                                 LEFT OUTER JOIN Types as tt ON tt.tt_id = t.tt_id");
        $tools->execute();

    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    return $tool;
}



// full catalog query function.
function select_tools_query () {
    try {
        include('connection.php');
        if (isset($db))
        $tools = $db->prepare("SELECT item_code, item_name, retail_price, sale_price,
                            qty, description FROM Tools");
        $tools->execute();


    }catch (Exception $e) {
        echo 'unable to retrieve results';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    return $tool;
}

// array AS OF NOW!! sort categories.
function array_category($catalog, $category) {
    $output = array();

    foreach($catalog as $id => $item) {
        if ( $category == null || strtolower($category) == strtolower($item['tool_type'])) {
            $sort = $item['name'];
            $sort = ltrim($sort, 'The ');
            $sort = ltrim($sort, 'A ');
            $sort = ltrim($sort, 'An ');
            $tool[$id] = $sort;
        }
    }
    asort($output);
    return array_keys($output);
}

// Get item html.
function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='"
        . $item["img"] . "' alt='"
        . $item["name"] . "' />"
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

/**
 * @param $id
 * @param $item
 * @return string
 */
function get_catalog_item($id, $item) {
        $output =
          "<img src=" .  $item['image'] . " alt='" .  $item['name'] . "'"
         .  "class='box-image-width box-image-height img-thumbnail img-responsive center-block'>"
         .  "<p class='text-center'> "
         .  "Item:" . $item['name'] . "<br>"
         .  "Brand: <br>"
         .  "Price:" . $item['price'] . "<br>"
         .  "<button class='btn btn-default btn-lg' value='" . $item['name'] . "'>"
         .      "<a href='details.php?id=" .  $id . "'></a><br>"
         .  "</button>"
         .  "</p>";

     return $output;
}

function get_catalog($item) {
    $output =
        "<img src=" .  $item['image'] . " alt='" .  $item['name'] . "'"
        .  "class='box-image-width box-image-height img-thumbnail img-responsive center-block'>"
        .  "<p class='text-center'> "
        .  "Item:" . $item['name'] . "<br>"
        .  "Brand: <br>"
        .  "Price:" . $item['price'] . "<br>"
        .  "<button class='btn btn-default btn-lg' value='" . $item['name'] . "'>"
        .      "<a href='details.php?id=" # "'></a><br>"
        .  "</button>"
        .  "</p>";

    return $output;
}
// TEST FUNCTIONS DELETE ONCE DONE QA'ING ----------------------------------------------------------------------
function get_single_item($item, $id)  {
    include('dum_data.php');
   $output =
       "<img src=" .  $item['item'] . " alt='" .  $item['item'] . "'"
       .  "class='box-image-width box-image-height img-thumbnail img-responsive center-block'>"
       .  "<p class='text-center'> "
       .  "Item:" . $item['item'] . "<br>"
       .  "Brand: <br>"
       .  "Price:" . $item['price'] . "<br>"
       .  "<button class='btn btn-default btn-lg' value='" . $item['item'] . "'>"
       .      "<a href='details.php?id=" .  $id . "'></a><br>"
       .  "</button>"
       .  "</p>";
   return $output;

}

/**
 * @param $id
 * @param $item
 * @return string
 */
function test_single_item_array($id, $item) {
    include('dum_data.php');
    $output =
        "<img src=" .  $item['image'] . " alt='" .  $item['name'] . "'"
        .  "class='box-image-width box-image-height img-thumbnail img-responsive center-block'>"
        .  "<p class='text-center'> "
        .  "Item:" . $item['name'] . "<br>"
        .  "Brand: <br>"
        .  "Price:" . $item['price'] . "<br>"
        .  "<button class='btn btn-default btn-lg' value='" . $item['name'] . "'>"
        .      "<a href='details.php?id=" .  $id . "'></a><br>"
        .  "</button>"
        .  "</p>";

    return $output;
}





