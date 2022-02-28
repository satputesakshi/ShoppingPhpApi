<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config.php';
    include_once '../../class/products.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Products($db);
    $stmt = $items->getProducts();
 
    $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($prod);

?>