<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 2:31 PM
 */

function url_for($script_path) {
    // adds leading '/' if not present.
    if ($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }

    return WWW_ROOT . $script_path;
}

function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='"
        . $item["img"] . "' alt='"
        . $item["name"] . "' />"
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function get_item_info($id, $item) {
    $output =  "<p>Brand:</p> <br>"
    . "<p>Item:" . $item['item'] .  "</p><br>"
    . "<p>Price:" . $item['price'] . "</p><br>"
    . "<button class='btn btn-default btn-lg'>"
    .  "<a href='#'><" . $item['item'] . "></a>"
    . "</button>";
    return $output;
}

function array_category($catalog,$category) {
    $output = array();

    foreach ($catalog as $id => $item) {
        if ($category == null OR strtolower($category) == strtolower($item["category"])) {
            $sort = $item["title"];
            $sort = ltrim($sort,"The ");
            $sort = ltrim($sort,"A ");
            $sort = ltrim($sort,"An ");
            $output[$id] = $sort;
        }
    }

    asort($output);
    return array_keys($output);
}