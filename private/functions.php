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
################################################# queries to database,
function single_item_query($id) {
    try {
        include('connection.php');
        if(isset($db))
        $tools = $db->prepare("SELECT t.item_code as code, t.item_name as name, t.retail_price as retail,
                                t.sale_price as price, t.item_pieces as pieces, t.qty as quantity,
                                 t.sold as sold, b.brand as brand, c.category as category, tt.tool_type as tool_type, 
                                 i.image as image
                                 FROM Tools AS t 
                                 INNER JOIN Brands AS b ON t.b_id = b.b_id 
                                 INNER JOIN Categories AS c ON t.c_id = c.c_id
                                 INNER JOIN Images AS i ON t.t_id = i.t_id                                  
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
            $tools = $db->prepare("SELECT t.t_id as id, t.item_code as code, t.item_name as name,
                                    t.retail_price as retail, t.sale_price as price,
                                    t.item_pieces as  pieces, t.qty as quantity,
                                    t.sold as sold, t.description as description,
                                    b.brand as brand, c.category as category,
                                    tt.tool_type as sections, i.image as image
                                   FROM Tools as t
                                   INNER JOIN Brands as b on t.b_id = b.b_id
                                   INNER JOIN Categories as c ON t.c_id = c.c_id
                                   INNER JOIN Images AS i ON t.t_id = i.t_id
                                   LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id");
        $tools->execute();

    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    return $tool;
}

function query_group_by_param($param) {
    try {
        include('connection.php');
        if(isset($db))
            $tools = $db->prepare("SELECT t.t_id as id, t.item_code as code, t.item_name as name,
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
                                   WHERE tt.tool_type = ?");
        $tools->bindParam(1, $param, PDO::PARAM_STR);
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
                            qty, description FROM Tools limit 1");
        $tools->execute();


    }catch (Exception $e) {
        echo 'unable to retrieve results';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    return $tool;
}
################################################## End DB Queries.!
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
        . $item["image"] . "' alt='"
        . $item["item"] . "' />"
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}
// pull by item.
function item_data($item) {
    $output = "<ul>"
        . "<li>ITEM: " . $item['name'] .  "</li>"
        . "<li>Retail: "  . $item['retail'] . "</li>"
        . "<li>Sales Price: "  .  $item['price'] .  "</li>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='box-image-width box-image-height img-responsive img-thumbnail' >"
        . "<li>Description: " . $item['description'] . "</li>"
        . "</ul>";
    return $output;
}

// same as item_data
function item_info($item) {
    $output = "<ul>"
        . "<li>Item Code: " . $item['code'] .  "</li>"
        . "<li>Sales Price: "  .  $item['price'] .  "</li>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='box-image-width box-image-height img-responsive img-thumbnail' >"
        . "</ul>";
    return $output;
}

// going to replace item_info
function item_info_link($item) {
    $output = "<ul>"
        . "<li>Item Code: " . $item['code'] .  "</li>"
        . "<li>Sales Price: "  .  $item['price'] .  "</li>"
        . "<a href='details.php?id=" . $item['id'] . "'>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='box-image-width box-image-height img-responsive img-thumbnail' ></a>"
        . "</ul>";
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

function get_single_item($item, $id)  {
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




