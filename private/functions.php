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
        $tools = $db->prepare("SELECT t.t_id as id, t.item_code as code,
                               t.item_name as name, t.retail_price as retail,
                               t.sale_price as price, t.item_pieces as pieces, t.qty as quantity,
                               t.sold as sold, b.brand as brand, c.category as category, tt.tool_type as tool_type,
                               i.image as image, t.description as description
                               FROM Tools AS t
                               INNER JOIN Brands AS b ON t.b_id = b.b_id
                               INNER JOIN Categories AS c ON t.c_id = c.c_id
                               
                               LEFT OUTER JOIN Types as tt ON tt.tt_id = t.tt_id
                               WHERE t.t_id = ?");
        $tools->bindParam(1, $id, PDO::PARAM_INT); // by binding keeping safe from SQL/Injection & only int can be used.
        $tools->execute();

    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetch(PDO::FETCH_ASSOC);
    $tools->closeCursor();
    return $tool;

}


function single_item_images_query() {
    try {
        include('connection.php');
        if (isset($db))
            $tool = $db->prepare("SELECT t.t_id as id, as image
                                  FROM Tools as t
                                  JOIN Images as i
                                  ON t.t_id = i.t_id
                                  WHERE t.t_id =  ?");
        $tool->bindParam(1, $id, PDO::PARAM_INT);
        $tool->execute();
    } catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit;
    }
    $tools = $tool->fetchAll(PDO::FETCH_ASSOC);
    $tool->closeCursor();
    return $tools;

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
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC); // fetching all from above sql statement.  USE SPARINGLY.

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
                                    tt.tool_type as sections, 
                                    (SELECT  i.image as images FROM Images limit 1)
                                     as image
                                   FROM Tools as t
                                   INNER JOIN Brands as b on t.b_id = b.b_id
                                   INNER JOIN Categories as c ON t.c_id = c.c_id
                                   INNER JOIN Images AS i ON t.t_id = i.t_id
                                   LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id
                                   WHERE tt.tool_type = ?");
        $tools->bindParam(1, $param, PDO::PARAM_STR); // blocks from SQL/Injection & only quries what we want.
        $tools->execute();

    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    $tools->closeCursor();
    return $tool;
}

// full catalog query function.
function select_tools_query () {
    try {
        include('connection.php');
        if (isset($db))
        $tools = $db->prepare("SELECT item_code, item_name, retail_price, sale_price,
                            qty, description FROM Tools limit :num");
        $tools->execute([':num' => 1]);


    }catch (Exception $e) {
        echo 'unable to retrieve results';
        echo $e->getMessage();
        exit();
    }
    $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    $tools->closeCursor();
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
    $output = "<li class='listing'><a href='details.php?id="
        . $id . "'><img src='"
        . $item["image"] . "' alt='"
        . $item["item"] . "' />"
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}
// pull by item.
function item_data($item) {
    $output = "<ul class='listing'>"
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
    $output = "<ul class='listing'>"
        . "<li>Item Code: " . $item['code'] .  "</li>"
        . "<li>Sales Price: "  .  $item['price'] .  "</li>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='box-image-width box-image-height img-responsive img-thumbnail' >"
        . "</ul>";
    return $output;
}

// going to replace item_info
function item_info_link($item) {
    $output = "<ul class='listing text-center'>"
        . "<li>Item Code: " . $item['code'] .  "</li>"
        . "<li>Sales Price: "  .  $item['price'] .  "</li>"
        . "<a href='details.php?id=" . $item['id'] . "'>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='box-image-width box-image-height img-responsive img-thumbnail' ></a>"
        . "<li>Sold: " . $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold') . "</li>"
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

function detail_single_item($item) {
    $output =
        "<article class='card detail-top'>"
        . "<h1>Name: " . $item['name'] .  "</h1>"
        . "<h3>Brand: " . $item['brand'] . "</h3>"
        . "<h4>Category: " . $item['category'] . "</h4>"
        . "<h4>Pieces: " . $item['pieces'] . "</h4>"
        . "<h4>Quantity: " . $item['quantity'] . "</h4>"
        . "<h4>Retail Price $" . $item['retail'] . "</h4>"
        . "<h4>Price: $" . $item['price'] . "</h4>"
        . "<h4>Sold: " . $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold') . "</h4>"
        . "<p>Description: " . $item['description'] . "</p>"
        . "</article>";
        return $output;
}

function detail_images($item) {
    $output =
        "<article class='card detail-top'>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='box-image-width box-image-height img-responsive img-thumbnail' >"
        . "</article>";
    return $output;
}








