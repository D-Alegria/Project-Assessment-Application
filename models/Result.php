<?php
    // include_once "/../validate.php";
    class Result {
        //db stuff
        private $conn;
        private $table = 'result';

        //Result properties
        public $student_id;
        public $admin_id;
        public $abstract;
        public $LR;
        public $methodology;
        public $analysis;
        public $conclusion;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get Results
        public function getAllResults(){
            $query = "SELECT * FROM ". $this->table."WHERE admin_id = :admin_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(["admin_id"=>$admin_id]);
            return $stmt;
        }

        //get Result by id
        public function getResultById(){
            $query = "SELECT * FROM ".$this->table." WHERE student_id =: student_id && admin_id =: admin_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['student_id'=>$this->student_id ,'admin_id'=>$this->admin_id]);
            $row = $stmt->fetch();
            
            $this->student_id = $row['student_id'];
            $this->admin_id = $row['admin_id'];
            $this->abstract = $row['abstract'];
            $this->LR = $row['LR'];
            $this->methodology = $row['methodology'];
            $this->analysis = $row['analysis'];
            $this->conclusion = $row['conclusion'];
        }

        //create Result
        public function createResult(){
            $query = "INSERT INTO "
            .$this->table.
            " SET (id, name, password, faculty, department, project_id, admin_id) 
            VALUES (:id, :name, :password, :faculty, :department, :project_id, :admin_id)";
            $stmt = $this->conn->prepare($query);

            $this->student_id = validateDataForm($this->student_id);
            $this->admin_id = validateDataForm($this->admin_id);
            $this->abstract = validateDataForm($this->abstract);
            $this->LR = validateDataForm($this->LR);
            $this->methodology = validateDataForm($this->methodology);
            $this->analysis = validateDataForm($this->analysis);
            $this->conclusion = validateDataForm($this->conclusion );

            $stmt-bindParam(':student_id', $this->student_id);
            $stmt-bindParam(':admin_id', $this->admin_id);
            $stmt-bindParam(':abstract', $this->abstract);
            $stmt-bindParam(':LR', $this->LR);
            $stmt-bindParam(':methodology', $this->methodology);
            $stmt-bindParam(':analysis', $this->analysis);
            $stmt-bindParam(':conclusion', $this->conclusion);
 
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false; 
        }

        //update Result
        public function updateResult(){
            $query = "UPDATE "
            .$this->table.
            " SET (id, name, password, faculty, department, project_id, admin_id) 
            VALUES (:id, :name, :password, :faculty, :department, :project_id, :admin_id) WHERE student_id=:student_id $$ admin_id=:admin_id";
            $stmt = $this->conn->prepare($query);

            $this->student_id = validateDataForm($this->student_id);
            $this->admin_id = validateDataForm($this->admin_id);
            $this->abstract = validateDataForm($this->abstract);
            $this->LR = validateDataForm($this->LR);
            $this->methodology = validateDataForm($this->methodology);
            $this->analysis = validateDataForm($this->analysis);
            $this->conclusion = validateDataForm($this->conclusion );

            $stmt-bindParam(':student_id', $this->student_id);
            $stmt-bindParam(':admin_id', $this->admin_id);
            $stmt-bindParam(':abstract', $this->abstract);
            $stmt-bindParam(':LR', $this->LR);
            $stmt-bindParam(':methodology', $this->methodology);
            $stmt-bindParam(':analysis', $this->analysis);
            $stmt-bindParam(':conclusion', $this->conclusion);
 
            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false; 
        }

        //delete Result
        public function deleteResult(){
            $query = "DELETE FROM ".$this->table." WHERE student_id=:student_id $$ admin_id=:admin_id";

            $stmt = $this->conn->prepare($query);

            $this->student_id = validateDataForm($this->student_id);
            $this->admin_id = validateDataForm($this->admin_id);

            $stmt-bindParam(':student_id', $this->student_id);
            $stmt-bindParam(':admin_id', $this->admin_id);

            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }r