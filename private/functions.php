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
