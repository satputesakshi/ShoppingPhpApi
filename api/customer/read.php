<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config.php';
    include_once '../../class/customer.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Customer($db);
    $stmt = $items->getCustomer();
 
    $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($customer);

?>