<?php
// include_once "/../validate.php";
    class Examiner {
        //db stuff
        private $conn;
        private $table = 'examiner';

        //Examiner properties
        public $id;
        public $name;
        public $password;
        public $faculty;
        public $department;
        public $admin_id;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get Examiners
        public function getAllExaminers(){
            $query = "SELECT * FROM ".$this->table."WHERE admin_id = :admin_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(["admin_id"=>$this->admin_id]);
            return $stmt;
        }

        //get Examiner by id
        public function getExaminerById(){
            $query = "SELECT * FROM ".$this->table." WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(["id"=>$this->id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();

            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->password = $row['password'];
            $this->faculty = $row['faculty'];
            $this->department = $row['department'];
            $this->admin_id = $row['admin_id'];

            return $count;
        }

        //create Examiner
        public function createExaminer(){
            $query = "INSERT INTO "
            .$this->table.
            " SET ('id', 'name', 'password', 'faculty', 'department', 'admin_id') 
            VALUES (:id, :name, :password, :faculty, :department, :admin_id)";
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->name= validateDataForm($this->name);
            $this->faculty = validateDataForm($this->faculty);
            $this->department = validateDataForm($this->department);
            $this->admin_id = validateDataForm($this->admin_id);
            $this->password= validateDataForm($this->password);

            $stmt-bindParam(':id', $this->id);
            $stmt-bindParam(':name', $this->name);
            $stmt-bindParam(':faculty', $this->faculty);
            $stmt-bindParam(':department', $this->department);
            $stmt-bindParam(':admin_id', $this->admin_id);
            $stmt-bindParam(':password', $this->password);
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //update Examiner
        public function updateExaminer(){
            $query = "UPDATE "
            .$this->table.
            " SET (id, name, password, faculty, department, admin_id) 
            VALUES (:id, :name, :password, :faculty, :department, :admin_id) WHERE id= :id";
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->name= validateDataForm($this->name);
            $this->faculty = validateDataForm($this->faculty);
            $this->department = validateDataForm($this->department);
            $this->admin_id = validateDataForm($this->admin_id);
            $this->password= validateDataForm($this->password);

            $stmt-bindParam(':id', $this->id);
            $stmt-bindParam(':name', $this->name);
            $stmt-bindParam(':faculty', $this->faculty);
            $stmt-bindParam(':department', $this->department);
            $stmt-bindParam(':admin_id', $this->admin_id);
            $stmt-bindParam(':password', $this->password);
 
            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //delete Examiner
        public function deleteExaminer(){
            $query = "DELETE FROM ".$this->table." WHERE id:=id";

            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);

            $stmt-bindParam(':id', $this->id);

            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
