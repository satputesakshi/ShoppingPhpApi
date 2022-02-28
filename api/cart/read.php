<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config.php';
    include_once '../../class/cart.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Cart($db);
    $stmt = $items->getCart();
 
    $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cart);

?>