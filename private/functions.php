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
                                 WHERE t.t_id = $id");
        $tools->execute();
        $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }

    return $tool;
}

// full catalog query function.
function select_query () {
    try {
        include('connection.php');
        if (isset($db))
        $tools = $db->prepare("SELECT item_code, item_name, retail_price, sale_price,
                            qty, description FROM Tools");
        $tools->execute();
        $tool = $tools->fetchAll(PDO::FETCH_ASSOC);

    }catch (Exception $e) {
        echo 'unable to retrieve results';
        echo $e->getMessage();
        exit();
    }
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
function get_item_catalog($id, $item) {
        $output = "<article class='card'>"
         . "<img src=" .  $item['image'] . " alt='" .  $item['name'] . "'"
         .  "class='box-image-width box-image-height img-thumbnail img-responsive center-block'>"
         .  "<p class='text-center'> "
         .  "Item:" . $item['name'] . "<br>"
         .  "Brand: <br>"
         .  "Price:" . $item['price'] . "<br>"
         .  "<button class='btn btn-default btn-lg' value='" . $item['name'] . "'>"
         .      "<a href='details.php?id=" .  $id . "'></a><br>"
         .  "</button>"
         .  "</p>"
         .  "</article>";

     return $output;
}








