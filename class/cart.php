<?php
    class Cart{
        // Connection
        private $conn;
        // Table
        private $db_table = "Cart";
        // Columns
        public $cartid;
        public $userId;
        public $productId;
        public $quantity;
        public $shipping;
        public $total;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getCart(){
            $sqlQuery = "SELECT cartid,userId, productId, quantity, shipping, total  FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createCart(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    userId =:userId,
                    productId =:productId,
                    quantity =:quantity,
                    shipping =:shipping,
                    total =:total";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            //$this->cartid=htmlspecialchars(strip_tags($this->cartid));
            $this->userId=htmlspecialchars(strip_tags($this->userId));
            $this->productId=htmlspecialchars(strip_tags($this->productId));
            $this->quantity=htmlspecialchars(strip_tags($this->quantity));
            $this->shipping=htmlspecialchars(strip_tags($this->shipping));
            $this->total=htmlspecialchars(strip_tags($this->total));
        
            // bind data
            $stmt->bindParam(":userId", $this->userId);
            $stmt->bindParam(":productId", $this->productId);
            $stmt->bindParam(":quantity", $this->quantity);
            $stmt->bindParam(":shipping", $this->shipping);
            $stmt->bindParam(":total", $this->total);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleCart(){
            $sqlQuery = "SELECT
                        cartid, userId, productId, quantity, shipping,total 
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    userId = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->cartid = $dataRow['cartid'];
            $this->userId = $dataRow['userId'];
            $this->productId = $dataRow['productId'];
            $this->quantity = $dataRow['quantity'];
            $this->shipping = $dataRow['shipping'];
            $this->total = $dataRow['total'];
        }        
        // UPDATE
        public function updateCart(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    
                    userId =:userId,
                    productId =:productId,
                    quantity =:quantity,
                    shipping =:shipping, 
                    total =:total
                    WHERE 
                    cartid = :cartid";
        
            $stmt = $this->conn->prepare($sqlQuery);
           // $this->userId=htmlspecialchars(strip_tags($this->cartid));
            $this->userId=htmlspecialchars(strip_tags($this->userId));
            $this->productId=htmlspecialchars(strip_tags($this->productId));
            $this->quantity=htmlspecialchars(strip_tags($this->quantity));
            $this->shipping=htmlspecialchars(strip_tags($this->shipping));
            $this->total=htmlspecialchars(strip_tags($this->total));

        
            // bind data
            $stmt->bindParam(":cartid", $this->cartid);
            $stmt->bindParam(":userId", $this->userId);
            $stmt->bindParam(":productId", $this->productId);
            $stmt->bindParam(":quantity", $this->quantity);
            $stmt->bindParam(":shipping", $this->shipping);
            $stmt->bindParam(":total", $this->total);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteCart(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE userId = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->userId=htmlspecialchars(strip_tags($this->userId));
        
            $stmt->bindParam(1, $this->userId);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>