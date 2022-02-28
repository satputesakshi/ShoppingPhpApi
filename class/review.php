<?php
    class Review{
        // Connection
        private $conn;
        // Table
        private $db_table = "Review";
        // Columns
        public $reviewId ;
        public $productId;
        public $custName;
        public $rate;
        public $comment;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getReview(){
            $sqlQuery = "SELECT reviewId, productId, custName, rate, comment  FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createReview(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    productId =:productId,
                    custName =:custName,
                    rate =:rate,
                    comment =:comment";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->productId=htmlspecialchars(strip_tags($this->productId));
            $this->reviewId=htmlspecialchars(strip_tags($this->reviewId));
            $this->custName=htmlspecialchars(strip_tags($this->custName));
            $this->rate=htmlspecialchars(strip_tags($this->rate));
            $this->comment=htmlspecialchars(strip_tags($this->comment));
        
            // bind data
            $stmt->bindParam(":productId", $this->productId);
            //$stmt->bindParam(":serialNumber", $this->serialNumber);
            $stmt->bindParam(":custName", $this->custName);
            $stmt->bindParam(":rate", $this->rate);
            $stmt->bindParam(":comment", $this->comment);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleReview(){
            $sqlQuery = "SELECT
                        productId, 
                        serialNumber, 
                        custName, 
                        rate, 
                        comment
                        
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    reviewId = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->productId = $dataRow['productId'];
            $this->serialNumber = $dataRow['serialNumber'];
            $this->custName = $dataRow['custName'];
            $this->rate = $dataRow['rate'];
            $this->comment = $dataRow['comment'];
        }        
        // UPDATE
        public function updateReview(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    productId =:productId,
                    custName =:custName,
                    rate =:rate,
                    comment =:comment
                    WHERE 
                    reviewId = :reviewId";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->productId=htmlspecialchars(strip_tags($this->productId));
            //$this->serialNumber=htmlspecialchars(strip_tags($this->serialNumber));
            $this->custName=htmlspecialchars(strip_tags($this->custName));
            $this->rate=htmlspecialchars(strip_tags($this->rate));
            $this->comment=htmlspecialchars(strip_tags($this->comment));
        
            // bind data
            $stmt->bindParam(":productId", $this->productId);
            $stmt->bindParam(":reviewId", $this->reviewId);
            $stmt->bindParam(":custName", $this->custName);
            $stmt->bindParam(":rate", $this->rate);
            $stmt->bindParam(":comment", $this->comment);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteReview(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE reviewId = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->custid=htmlspecialchars(strip_tags($this->productId));
        
            $stmt->bindParam(1, $this->productId);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>