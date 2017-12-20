<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/18/17
 * Time: 10:56 AM
 */
$user = 'mikey';
$pass = 'DroidsLie#9';
$base = 'Sales';
$host = 'localhost';



try {
    $dbh = new PDO("mysql:host=$host;dbname=$base;", $user, $pass);
}catch(Exception $e){
    echo $error = $e->getMessage();
}
echo 'connection good';
