<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config.php';
    include_once '../../class/review.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Review($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->productId = $data->productId;
    
    if($item->deleteReview()){
      echo json_encode([
        "message" =>"Review deleted successfully",
    ]);
  } else{
    echo json_encode([
      "message" =>"Review not deleted ",
  ]);
}
?>