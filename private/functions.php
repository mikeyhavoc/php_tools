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


################################################# queries to database,
/**
 * @param $con
 * @param $query
 * @param $statements
 * @return mixed
 */
function execute_query($con, $query, $variables) {
    $stmt = $con->prepare($query);
    $stmt->execute($variables);
    return $stmt;

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
        . "<h4>Price: $" . $price = ($item['price'] == 0 ? 'Make offer' : $item['price']) . "</h4>"
        . "<h4>Sold: " . $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold') . "</h4>"
        . "<h4>Code: " . $item['code'] . "</h4>"
        . "<p>Description: " . $item['description'] . "</p>"
        . "<aside class='right'><img class='half' src='" . IMAGES . $item['image'] . "' alt='" . $tool['description'] . "'></aside>"
        . "</article>";
        return $output;
}

function detail_images($item) {
    $output =
        "<article class='card detail-top'>"
        . "<img src='".  IMAGES . $item['image'] . "' alt='" . $item['name'] . "' 
        class='detail-images img-responsive img-thumbnail' >"
        . "</article>";
    return $output;
}

