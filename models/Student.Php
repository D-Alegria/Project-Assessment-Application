<?php
    //include_once('/../validate.php');

    class Student {
        //db stuff
        private $conn;
        private $table = '`student`';

        //student properties
        public $id; 
        public $name;
        public $faculty;
        public $department;
        public $project_id;
        public $admin_id;
        public $password;
        public $abstract;
        public $LR;
        public $methodology;
        public $analysis;
        public $conclusion;
        public $submitted;
        public $marked;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get students
        public function getAllStudents(){
            $query = "SELECT * FROM ". $this->table ." WHERE admin_id = :admin_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['admin_id'=>$this->admin_id]);
            $stmt = $stmt->fetchAll();

            if (count($stmt)>0) {
                
                foreach ($stmt as $student) {
                    $field1name = $student["id"];
                    $field2name = $student["name"];
                    $field3name = $student["project_id"];

                    $edit = "'edit'";
                    $detail = "'detail'";
                    $delete = "'delete'";
                    echo '<li><span class="left"><p>'
                    . $field1name.'</p>'.
                    '<p>'.$field2name.'</p>'.
                    '<p>'.$field3name.'</p>'.
                    '</span>
                    <span class="right">
                        <p><input type="button" name="edit" id= "'.$field1name.'" value="Edit" onclick="getId('.$edit.',this.id)"></p>
                        <p><input type="button" name="details" id= "'.$field1name.'" value="Details" onclick="getId('.$detail.',this.id)"></p>
                        <p><input type="button" name="delete" id= "'.$field1name.'" value="Delete" onclick="getId('.$delete.',this.id)"></p>
                    </span>
                </li>';
                    
                }
            }else {
                echo '<h2>No Student added</h2>';
            }
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
            $query = "INSERT INTO ".$this->table." (`id`, `name`, `faculty`, `department`, `project_id`, `admin_id`, `password`) 
            VALUES (:id, :name, :faculty, :department, :project_id, :admin_id, :password)";
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
            $stmt->bindParam(':submitted', $this->submitted);
            $stmt->bindParam(':marked', $this->marked);
            
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

        //update Studentproject
        public function updateStudentProject(){
            $query = "UPDATE "
            .$this->table.
            " SET `abstract` = :abstract, `LR` =:LR , `methodology`=:methodology, `analysis`=:analysis, `conclusion` = :conclusion, `submitted`:=submitted 
            WHERE `id`=:id";
            $stmt = $this->conn->prepare($query);
            echo $query;
            $this->id = validateDataForm($this->id);
            $this->abstract = validateDataForm($this->abstract);
            $this->LR = validateDataForm($this->LR);
            $this->methodology = validateDataForm($this->methodology);
            $this->analysis = validateDataForm($this->analysis);
            $this->conclusion = validateDataForm($this->conclusion );

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':abstract', $this->abstract);
            $stmt->bindParam(':LR', $this->LR);
            $stmt->bindParam(':methodology', $this->methodology);
            $stmt->bindParam(':analysis', $this->analysis);
            $stmt->bindParam(':conclusion', $this->conclusion);
            $stmt->bindParam(':submitted', $this->submitted);

            
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

        public function getSubmittedStudents(){
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
    }