<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/18/17
 * Time: 10:56 AM
 */
$user = 'mikey';
$pass = 'DroidsLie#9';
$base = 'gary';
$host = 'localhost';



try {
    $mysqli = new MySQLi('localhost', 'mikey', 'DroidsLie#9', 'Tools');
}catch(Exception $e){
    echo $error = $e->getMessage();
}
