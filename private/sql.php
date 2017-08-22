<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 1:49 PM
 */
try {
    require_once '../inc/connection.php';
    $sql = 'SELECT item, price, sold
            FROM tools limit 10';
    $tools = $con->query($sql);
}catch(Exception $e){
    echo $error = $e->getMessage();

}