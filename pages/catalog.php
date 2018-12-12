<?php
/**
 * Created by PhpStorm.
 * User: mikey
 * Date: 12/21/17
 * Time: 10:36 AM
 */

 require_once('../bootstrap.php');

if ( isset($_GET['cat']) ) {
    if ( $_GET['cat'] == 'wrenches') {
        $page_name = 'Wrenches';
        $section = 'wrenches';
        $param = 'wrenches';
    } elseif ( $_GET['cat'] == 'files') {
        $page_name = 'Files';
        $section = 'files';
        $param = 'files';
    } elseif ( $_GET['cat'] == 'pliers') {
        $page_name = 'Pliers';
        $section = 'pliers';
        $param = 'pliers';
    } elseif ( $_GET['cat'] == 'bits') {
        $page_name = 'Bits';
        $section = 'bits';
        $param = 'bits';
    } elseif ( $_GET['cat'] == 'air-tools') {
        $page_name = 'Air Tools';
        $section = 'air-tools';
        $param = 'air-tools';
    } elseif ( $_GET['cat'] == 'ratchets') {
        $page_name = 'Ratchets';
        $section = 'ratchets';
        $param = 'ratchets';
    } elseif ( $_GET['cat'] == 'crimps') {
        $page_name = 'Crimps';
        $section = 'crimps';
        $param = 'crimps';

    } elseif ( $_GET['cat'] == 'sockets') {
        $page_name = 'Sockets';
        $section = 'sockets';
        $param = 'sockets';
    } elseif ( $_GET['cat'] == 'removers') {
        $page_name = 'Removers';
        $section = 'removers';
        $param = 'removers';
    } elseif ( $_GET['cat'] == 'extensions') {
        $page_name = 'Extensions';
        $section = 'extensions';
        $param = 'extensions';
    } elseif ( $_GET['cat'] == 'screwdrivers') {
        $page_name = 'Screwdrivers';
        $section = 'screwdrivers';
        $param = 'screwdrivers';
    } elseif ( $_GET['cat'] == 'bars') {
        $page_name = 'Pry and Pic Bars';
        $section = 'bars';
        $param = 'bars';
    } elseif ( $_GET['cat'] == 'cables') {
        $page_name = 'Cables';
        $section = 'cables';
        $param = 'cables';
    } elseif ( $_GET['cat'] == 'jacks') {
        $page_name = 'Jacks';
        $section = 'jacks';
        $param = 'jacks';
    } elseif ( $_GET['cat'] == 'misc') {
        $page_name = 'Misc';
        $section = 'misc';
        $param = 'misc';
    } elseif ( $_GET['cat'] == 'discs') {
        $page_name = 'Discs';
        $section = 'wheels';
        $param = 'wheels';
    } elseif ( $_GET['cat'] == 'cch') {
        $page_name = 'Clamps/Chains/Hooks';
        $section = 'hcc';
        $param = 'hcc';
    } elseif ( $_GET['cat'] == 'chisels') {
        $page_name = 'Chisels';
        $section = 'chisels';
        $param = 'chisels';
    } elseif ( $_GET['cat'] == 'hammers') {
        $page_name = 'Hammers';
        $section = 'hammers';
        $param = 'hammers';
    } elseif ( $_GET['cat'] == 'spoons') {
        $page_name = 'Spoons';
        $section = 'spoons';
        $param = 'spoons';
    } elseif ( $_GET['cat'] == 'vise_grips') {
        $page_name = 'Vise Grips';
        $section = 'vise_grips';
        $param = 'vise_grips';
    } elseif ( $_GET['cat'] == 'blades') {
        $page_name = 'Blades';
        $section = 'blades';
        $param = 'blades';
    } else {
        $page_name = 'home';
        $section = null;
    }
}

$con = $db; // grab db to con for connection into queries.
try {
    if (isset($param)) {
        $first_item_query = "SELECT t.t_id AS id, t.item_code AS code, t.item_name AS name,
                       t.retail_price AS retail, t.sale_price AS price,
                       t.item_pieces AS  pieces, t.qty AS quantity,
                       t.sold AS sold, t.description AS description,
                       b.brand AS brand, c.category AS category,                                  
                       tt.tool_type AS section, i.image AS image
                       FROM Tools AS t
                       INNER JOIN Brands AS b ON t.b_id = b.b_id
                       INNER JOIN Categories AS c ON t.c_id = c.c_id
                       INNER JOIN Images AS i ON t.t_id = i.t_id
                       LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id
                       WHERE tt.tool_type = :tool AND i.image_num = 1";
        $variables[':tool'] = $param;
        $items = execute_query($con, $first_item_query, $variables);
    }
}catch(PDOException $e) {
    $e->getMessage();
    exit;
}

try {
    if (isset($param)) {
        $breadcrumb_query = "SELECT c.tool_type AS category
                     FROM Tools AS t
                     JOIN Types c ON t.tt_id = c.tt_id
                     WHERE c.tool_type = :breadcrumb LIMIT 1";
        $crumbs[':breadcrumb'] = $param;
        $breadcrumb = execute_query($con, $breadcrumb_query, $crumbs);
    }
}catch(PDOException $e) {
    $e->getMessage();
    exit;
}

 $page_title = 'Tool Catalog';


require ('../views/catalog.view.php');
