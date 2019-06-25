<?php
    // include_once('/../validate.php');

    class Student {
        //db stuff
        private $conn;
        private $table = 'student';

        //student properties
        public $id;
        public $name;
        public $faculty;
        public $department;
        public $project_id;
        public $admin_id;
        public $password;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get students
        public function getAllStudents(){
            $query = "SELECT * FROM ". $this->table ." WHERE admin_id = :admin_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['admin_id'=>$this->admin_id]);
            // $stmt = $stmt->fetchAll();
            return $stmt;
        }

        //get student by id
        public function getStudentById(){
            $query = "SELECT * FROM ". $this->table ." WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id'=>$this->id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();

            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->faculty = $row['faculty'];
            $this->department = $row['department'];
            $this->project_id = $row['project_id'];
            $this->admin_id = $row['admin_id'];
            $this->password = $row['password'];

            return $count;
        }

        //create student
        public function createStudent(){
            $query = "INSERT INTO `admin` (`id`, `name`, `faculty`, `department`, `project_id`, `admin_id`, `password`) 
            VALUES (:id, :email, :fullname, :faculty, :department, :project_id, :admin_id, :password)";
            // "INSERT INTO "
            // .$this->table.
            // " SET (id, name, password, faculty, department, project_id, admin_id) 
            // VALUES (:id, :name, :password, :faculty, :department, :project_id, :admin_id)";
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->name= validateDataForm($this->name);
            $this->faculty = validateDataForm($this->faculty);
            $this->department = validateDataForm($this->department);
            $this->project_id= validateDataForm($this->project_id);
            $this->admin_id = validateDataForm($this->admin_id);
            $this->password= validateDataForm($this->password);

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':faculty', $this->faculty);
            $stmt->bindParam(':department', $this->department);
            $stmt->bindParam(':project_id', $this->project_id);
            $stmt->bindParam(':admin_id', $this->admin_id);
            $stmt->bindParam(':password', $this->password);
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //update student
        public function updateStudent(){
            $query = "UPDATE "
            .$this->table.
            " SET (id, name, password, faculty, department, project_id, admin_id) 
            VALUES (:id, :name, :password, :faculty, :department, :project_id, :admin_id) WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->name= validateDataForm($this->name);
            $this->faculty = validateDataForm($this->faculty);
            $this->department = validateDataForm($this->department);
            $this->project_id= validateDataForm($this->project_id);
            $this->admin_id = validateDataForm($this->admin_id);
            $this->password= validateDataForm($this->password);

            $stmt-bindParam(':id', $this->id);
            $stmt-bindParam(':name', $this->name);
            $stmt-bindParam(':faculty', $this->faculty);
            $stmt-bindParam(':department', $this->department);
            $stmt-bindParam(':project_id', $this->project_id);
            $stmt-bindParam(':admin_id', $this->admin_id);
            $stmt-bindParam(':password', $this->password);
 
            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //delete student
        public function deleteStudent(){
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