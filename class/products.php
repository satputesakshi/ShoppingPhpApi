<?php
    class Products{
        // Connection
        private $conn;
        // Table
        private $db_table = "Products";
        // Columns
        public $id;
        public $prodPrice;
        public $produrl;
        public $prodDesc;
        public $rate;
        public $type;
        public $prodName;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getProducts(){
            $sqlQuery = "SELECT id, prodPrice, produrl, prodDesc, rate, prodName, type  FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createProducts(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    prodPrice =:prodPrice,
                    produrl = :produrl,
                    prodDesc =:prodDesc,
                    rate =:rate,
                    type =:type,
                    prodName =:prodName";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->id=htmlspecialchars(strip_tags($this->id));
            //$this->custName=htmlspecialchars(strip_tags($this->custName));
            $this->prodPrice=htmlspecialchars(strip_tags($this->prodPrice));
            $this->produrl=htmlspecialchars(strip_tags($this->produrl));
            $this->prodDesc=htmlspecialchars(strip_tags($this->prodDesc));
            $this->rate=htmlspecialchars(strip_tags($this->rate));
            $this->type=htmlspecialchars(strip_tags($this->type));
            $this->prodName=htmlspecialchars(strip_tags($this->prodName));
        
            // bind data
           // $stmt->bindParam(":id", $this->id);
           // $stmt->bindParam(":custName", $this->custName);
            $stmt->bindParam(":prodPrice", $this->prodPrice);
            $stmt->bindParam(":produrl", $this->produrl);
            $stmt->bindParam(":prodDesc", $this->prodDesc);
            $stmt->bindParam(":rate", $this->rate);
            $stmt->bindParam(":type", $this->type);
            $stmt->bindParam(":prodName", $this->prodName);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleProduct(){
            $sqlQuery = "SELECT
                        id, 
                        prodPrice, 
                        produrl, 
                        prodDesc,
                        prodName,
                        type
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
           // $this->custname = $dataRow['custname'];
            $this->prodPrice = $dataRow['prodPrice'];
            $this->produrl = $dataRow['produrl'];
            $this->prodDesc = $dataRow['prodDesc'];
            $this->type = $dataRow['type'];
            $this->prodName = $dataRow['prodName'];

        }        
        // UPDATE
        public function updateProduct(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    id =:id,
                    prodPrice =:prodPrice,
                    produrl = :produrl,
                    prodDesc =:prodDesc,
                    rate =:rate,
                    type =:type,
                    prodName =:prodName
                    WHERE 
                    id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
            //$this->custName=htmlspecialchars(strip_tags($this->custName));
            $this->prodPrice=htmlspecialchars(strip_tags($this->prodPrice));
            $this->produrl=htmlspecialchars(strip_tags($this->produrl));
            $this->prodDesc=htmlspecialchars(strip_tags($this->prodDesc));
            $this->rate=htmlspecialchars(strip_tags($this->rate));
            $this->type=htmlspecialchars(strip_tags($this->type));
            $this->prodName=htmlspecialchars(strip_tags($this->prodName));
        
            // bind data
            $stmt->bindParam(":id", $this->id);
           // $stmt->bindParam(":custName", $this->custName);
            $stmt->bindParam(":prodPrice", $this->prodPrice);
            $stmt->bindParam(":produrl", $this->produrl);
            $stmt->bindParam(":prodDesc", $this->prodDesc);
            $stmt->bindParam(":rate", $this->rate);
            $stmt->bindParam(":type", $this->type);
            $stmt->bindParam(":prodName", $this->prodName);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteProduct(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>