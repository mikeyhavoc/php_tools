<?php
/**
 * Created by PhpStorm.
 * User: mikey
 * Date: 12/21/17
 * Time: 11:02 AM
 */
 require_once('bootstrap.php');

$id_num = $_GET['id']; // grabbing Global Variable GET id
$id = filter_var($id_num, FILTER_SANITIZE_NUMBER_INT); // filtering and sanitizing number going into array for value.
$con = $db; // the connection to the db.
// single item SQL Query.
try {
    $single_item_full_query = "SELECT t.item_code AS code, t.item_name AS name, 
                      t.retail_price AS retail, t.sale_price AS price, 
                      t.item_pieces AS pieces, t.qty AS quantity, t.sold AS sold,
                      b.brand AS brand, c.category AS category, tt.tool_type AS tool_type,
                      t.description AS description,
                      i.image as images FROM Tools AS t
                      INNER JOIN Brands AS b ON t.b_id = b.b_id
                      INNER JOIN Categories AS c ON t.c_id = c.c_id
                      INNER JOIN Images AS i ON i.t_id = t.t_id 
                      LEFT OUTER JOIN Types AS tt ON tt.tt_id = t.tt_id
                      WHERE t.t_id = :id LIMIT 1";
    $variables[':id'] = $id;

    $items = execute_query($con, $single_item_full_query, $variables)->fetchAll();

}catch(PDOException $e) {
    echo $e->getMessage();
}
try {
    $single_images_item_query = "SELECT t.t_id as id,
                                  t.description as description,
                                  i.image as image
                                  FROM Tools as t
                                  JOIN Images as i
                                  ON t.t_id = i.t_id
                                  WHERE t.t_id = :image";
    $var[':image'] = $id_num;
    $images = execute_query($con, $single_images_item_query, $var)->fetchAll();

}catch(PDOException $e){
    echo $e->getMessage();
}

try {
    $single_item_breadcrumb_query = "SELECT t.item_code as code,  c.tool_type as category
                           FROM Tools as t
                           JOIN Types c ON t.tt_id = c.tt_id
                           WHERE t.t_id = :breadcrumb LIMIT 1";
    $crumbs[':breadcrumb'] = $id_num;
    $breadcrumb = execute_query($con, $single_item_breadcrumb_query, $crumbs);

}catch(PDOException $e) {
    echo $e->getMessage();
}
$pageTitle = 'Details';

require_once('views/details.view.php');