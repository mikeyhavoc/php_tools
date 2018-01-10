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
 * @param $variables
 * @return mixed
 */
function execute_query($con, $query, $variables) {
    $stmt = $con->prepare($query);
    $stmt->execute($variables);
    return $stmt;

}
