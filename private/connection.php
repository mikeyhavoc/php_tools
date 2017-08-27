<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/18/17
 * Time: 10:56 AM
 */
$user = '';
$pass = '';
$base = 'gary';
$dsn = 'mysql:host=localhost;dbname=gary';



try {
    $con = new PDO($dsn, $user, $pass);
}catch(Exception $e){
    echo $error = $e->getMessage();


}
?>