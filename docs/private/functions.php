<?php
include 'initialize.php';

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 2:31 PM
 */

// script function to connect urls to root path.
/**
 * @param $script_path
 * @return string
 */
function url_for($script_path) {
    // adds leading '/' if not present.
    if ($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }

    return WWW_ROOT . $script_path;
}

/**
 * @param $node_modules
 * @return string
 */
function node_module($node_modules) {
    // leading ./ if not present.
    if ($node_modules[0] != './') {
        $node_modules = './' . $node_modules;
    }
    return $node_modules;
}



################################################# queries to database,
/**
 * @param $con
 * @param $query
 * @param $variables
 * @return mixed
 */
function execute_query($con, $query, $variables) {
    $stmt = $con->prepare($query);
    $stmt->execute($variables);
    return $stmt;

}
