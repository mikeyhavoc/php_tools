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

/**
 * @param $id
 * @return mixed
 */
function multi_item_query($id) {
    try {
        include('connection.php');
        if(isset($db))
        $tools = $db->prepare("SELECT t.item_code as code, t.item_name as name, t.retail_price as retail,
                                t.sale_price as price, t.item_pieces as pieces, t.qty as quantity,
                                 t.sold as sold, b.brand as brand, c.category as category 
                                 FROM Tools AS t 
                                 JOIN Brands AS b ON t.b_id = b.b_id 
                                 JOIN Categories AS c ON t.c_id = c.c_id 
                                 LEFT OUTER JOIN Types as tt ON tt.tt_id = t.tt_id
                                 WHERE tt.tool_type LIKE '$id'");
        $tools->execute();
        $tool = $tools->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        echo 'unable to retrieve data';
        echo $e->getMessage();
        exit();
    }

    return $tool;
}

// full catalog query function.
function select_query () {
    try {
        include('connection.php');
        if (isset($db))
        $tools = $db->prepare("SELECT item_code, item_name, retail_price, sale_price,
                            qty, description FROM Tools");
        $tools->execute();
        $tool = $tools->fetchAll(PDO::FETCH_ASSOC);

    }catch (Exception $e) {
        echo 'unable to retrieve results';
        echo $e->getMessage();
        exit();
    }
    return $tool;
}