<?php
/**
 * Created by PhpStorm.
 * User: mikey
 * Date: 11/21/18
 * Time: 12:52 PM
 */

class Connection
{
    public static function make()
    {
        $dsn = 'mysql:dbname=;host=127.0.0.1'; // after dbname=  enter your Database.
        $user = '';  // DEV=> ENTER YOUR USERNAME in the Strings.
        $password = ''; // DEV=> enter Mysql password in Strings.

        try {
            return new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}

$db = Connection::make();