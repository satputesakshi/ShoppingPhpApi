<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config.php';
    include_once '../../class/cart.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Cart($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->userId = $data->userId;
    $item->userId = $data->userId;
    $item->productId = $data->productId;
    $item->quantity = $data->quantity;
    $item->shipping = $data->shipping;
    
    
    if($item->updateCart()){
      echo json_encode([
        "message" =>"Cart updated successfully",
    ]);
  } else{
    echo json_encode([
      "message" =>"Cart not updated ",
  ]);
  }
?>