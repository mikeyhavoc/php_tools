<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 2/6/18
 * Time: 1:45 PM
 */
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=Sales;host=127.0.0.1';
$user = 's';
$password = ;

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}