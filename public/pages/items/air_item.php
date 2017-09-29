<?php require_once('../../private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 9/5/17
 * Time: 10:04 PM
 */
// dummy data testing !! take out for database later
require(PRIVATE_PATH . '/dum_data.php');
// !! future removal


require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');
?>

    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <ul class="bradcrumb">
                    <li><a href="<?php echo rawurlencode(url_for(WWW_ROOT . 'index.php')); ?>">Home</a></li>
                    <li><a href="<?php echo rawurlencode(url_for(WWW_ROOT . '/public/pages/air_tools.php')); ?>">Air Tools</a></li>
                    <li class="active"><a href="<?php echo rawurlencode(url_for(WWW_ROOT . '/public/pages/items/air_item.php')); ?>">Item</a></li>
                </ul>
            </div>
        </div>
    </header>
