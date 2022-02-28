<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config.php';
    include_once '../../class/customer.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Customer($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->custId = $data->custId;
    
    // customer values
    $item->custName = $data->custName;
    $item->email = $data->email;
    $item->custPswd = $data->custPswd;
    $item->dob = $data->dob;
    $item->addLine1 = $data->addLine1;
    $item->city = $data->city;
    $item->province = $data->province;
    $item->zip = $data->zip;
    $item->country = $data->country;
    
    if($item->updateCustomer()){
      echo json_encode([
        "message" =>"Customer updated successfully",
    ]);
  } else{
    echo json_encode([
      "message" =>"Customer not updated ",
  ]);
  }
?>