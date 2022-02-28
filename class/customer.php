<?php
    class Customer{
        // Connection
        private $conn;
        // Table
        private $db_table = "Customer";
        // Columns
        public $custId;
        public $custName;
        public $email;
        public $custPswd;
        public $dob;
        public $addLine1;
        public $city;
        public $province;
        public $zip;
        public $country;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getCustomer(){
            $sqlQuery = "SELECT custId, custName, email,custPswd, dob, addLine1, city, province, zip, country  FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createCustomer(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                       custName = :custName,
                        email = :email,
                        custPswd = :custPswd,
                        dob = :dob,
                        addLine1 = :addLine1,
                        city = :city,
                        province = :province,
                        zip = :zip,
                        country = :country";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->custName=htmlspecialchars(strip_tags($this->custName));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->dob=htmlspecialchars(strip_tags($this->dob));
            $this->addLine1=htmlspecialchars(strip_tags($this->addLine1));
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->zip=htmlspecialchars(strip_tags($this->zip));
            $this->country=htmlspecialchars(strip_tags($this->country));
        
            // bind data
            $stmt->bindParam(":custName", $this->custName);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":custPswd", $this->custPswd);
            $stmt->bindParam(":dob", $this->dob);
            $stmt->bindParam(":addLine1", $this->addLine1);
            $stmt->bindParam(":city", $this->city);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":zip", $this->zip);
            $stmt->bindParam(":country", $this->country);
            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleCustomer(){
            $sqlQuery = "SELECT
                        custid, 
                        custName, 
                        email, 
                        dob, 
                        addline1,
                        city,
                        province,
                        zip,
                        country 
                        
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       custid = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->custname = $dataRow['custname'];
            $this->email = $dataRow['email'];
            $this->dob = $dataRow['dob'];
            $this->addline1 = $dataRow['addline1'];
            $this->city = $dataRow['city'];
            $this->province = $dataRow['province'];
            $this->zip = $dataRow['zip'];
            $this->country = $dataRow['country'];
            
        }        
        // UPDATE
        public function updateCustomer(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    
                    custName = :custname,
                    email = :email,
                    custPswd = :custPswd,
                    dob = :dob,
                    addLine1 = :addLine1,
                    city = :city,
                    province = :province,
                    zip = :zip,
                    country = :country
                    WHERE 
                        custId = :custId";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->custName=htmlspecialchars(strip_tags($this->custName));
            $this->custPswd=htmlspecialchars(strip_tags($this->custPswd));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->dob=htmlspecialchars(strip_tags($this->dob));
            $this->addLine1=htmlspecialchars(strip_tags($this->addLine1));
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->zip=htmlspecialchars(strip_tags($this->zip));
            $this->country=htmlspecialchars(strip_tags($this->country));
            $this->custId=htmlspecialchars(strip_tags($this->custId));

        
            // bind data
            $stmt->bindParam(":custId", $this->custId);
            $stmt->bindParam(":custname", $this->custName);
            $stmt->bindParam(":custPswd", $this->custPswd);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":dob", $this->dob);
            $stmt->bindParam(":addLine1", $this->addLine1);
            $stmt->bindParam(":city", $this->city);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":zip", $this->zip);
            $stmt->bindParam(":country", $this->country);
            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteCustomer(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE custId = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->custId=htmlspecialchars(strip_tags($this->custId));
        
            $stmt->bindParam(1, $this->custId);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>