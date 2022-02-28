<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config.php';
    include_once '../../class/review.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Review($db);
    $stmt = $items->getReview();
 
    $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($review);

?>