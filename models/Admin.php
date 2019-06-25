<?php
    // include_once('/../validate.php');
    class Admin {
        //db stuff
        private $conn;
        private $table = 'admin';

        //Admin properties
        public $id;
        public $fullname;
        public $email;
        public $faculty;
        public $department;
        public $lecturer_id;
        public $school;
        public $password;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get Admins
        public function getAllAdmins(){
            $query = "SELECT * FROM ". $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetchAll();
            return $stmt;
        }

        //get Admin by id
        public function getAdminById(){
            $query = "SELECT `id`, `fullname`, `email`, `faculty`, `department`, `lecturer_id`, `school`, `password` FROM `admin` WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id'=>$this->id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            
            $this->id = $row['id'];
            $this->fullname = $row['fullname'];
            $this->email = $row['email'];
            $this->faculty = $row['faculty'];
            $this->department = $row['department'];
            $this->lecturer_id = $row['lecturer_id'];
            $this->school = $row['school'];
            $this->password = $row['password'];

            return $count;
        }

        //create Admin
        public function createAdmin(){
            $query = 
            "INSERT INTO `admin` (`id`, `fullname`, `email`, `faculty`, `department`, `lecturer_id`, `school`, `password`) VALUES (:id, :email, :fullname, :faculty, :department, :lecturer_id, :school, :password)";

            echo $query;
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->email= validateDataForm($this->email);
            $this->fullname= validateDataForm($this->fullname);
            $this->faculty = validateDataForm($this->faculty);
            $this->department = validateDataForm($this->department);
            $this->lecturer_id= validateDataForm($this->lecturer_id);
            $this->school = validateDataForm($this->school);
            $this->password= validateDataForm($this->password);

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':fullname', $this->fullname);
            $stmt->bindParam(':faculty', $this->faculty);
            $stmt->bindParam(':department', $this->department);
            $stmt->bindParam(':lecturer_id', $this->lecturer_id);
            $stmt->bindParam(':school', $this->school);
            $stmt->bindParam(':password', $this->password);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //update Admin
        public function updateAdmin(){
            $query = "UPDATE "
            .$this->table.
            " SET (id, email, fullname, faculty, department, lecturer_id, school, password) 
            VALUES (:id, :email, :fullname, :faculty, :department, :lecturer_Id, :school, :password) WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->email= validateDataForm($this->email);
            $this->fullname= validateDataForm($this->fullname);
            $this->faculty = validateDataForm($this->faculty);
            $this->department = validateDataForm($this->department);
            $this->lecturer_id= validateDataForm($this->lecturer_id);
            $this->school = validateDataForm($this->school);
            $this->password= validateDataForm($this->password);

            $stmt-bindParam(':id', $this->id);
            $stmt-bindParam(':email', $this->email);
            $stmt-bindParam(':fullname', $this->fullname);
            $stmt-bindParam(':faculty', $this->faculty);
            $stmt-bindParam(':department', $this->department);
            $stmt-bindParam(':lecturer_id', $this->lecturer_id);
            $stmt-bindParam(':school', $this->school);
            $stmt-bindParam(':password', $this->password);
 
            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //delete Admin
        public function deleteAdmin(){
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