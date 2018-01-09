<?php
error_reporting(-1);
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 1:49 PM
 */


// __FILE__ returns the current path to this file => Private folder
// dirname() returns the path to the parent directory


define("PRIVATE_PATH", dirname(__FILE__));  # private folder for private items.
define("PROJECT_PATH", dirname(PRIVATE_PATH)); # private folder for shared things
define("PUBLIC_PATH", PROJECT_PATH . '/public'); # public folder
define("SHARED_PATH", PRIVATE_PATH . '/shared'); # shared folder


// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as web server
// * Can ser a hardcoded value:
// e.g define("WWW_ROOT", '/~mike/globebank/public');

// * Can be dynamically find everything in URL up to "/public"

//$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
//$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
//define("WWW_ROOT", $doc_root);

//ROOT of file.
define("WWW_ROOT", '');
define('FOLDER', WWW_ROOT . '/tools-site/');
define("IMAGES", 'public/');

define('WINDOWS', FOLDER . '/' . IMAGES);





require_once('functions.php');
require_once('connection.php');


