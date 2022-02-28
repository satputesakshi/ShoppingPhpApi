<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config.php';
    include_once '../../class/products.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Products($db);
    $data = json_decode(file_get_contents("php://input"));
    //$item->id = $data->id;
    //$item->custName = $data->custName;
    $item->prodPrice = $data->prodPrice;
    $item->produrl = $data->produrl;
    $item->prodDesc = $data->prodDesc;
    $item->rate = $data->rate;
    $item->type = $data->type;
    $item->prodName = $data->prodName;
    if($item->createProducts()){
        echo json_encode([
          "message" =>"Products created successfully",
      ]);
    } else{
      echo json_encode([
        "message" =>"Products not created ",
    ]);
    }
?>