<?php
    // include "/../validate.php";
    class Project {
        //db stuff
        private $conn;
        private $table = '`project`';

        //Project properties
        public $id;
        public $topic;
        public $description;
        public $duedate;
        public $admin_id;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get Projects
        public function getAllProjects(){
            $query = "SELECT * FROM ".$this->table." WHERE `admin_id`= :admin_id ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['admin_id'=>$this->admin_id]);
            $stmt = $stmt->fetchAll();

            if (count($stmt)>0) {
                
                foreach ($stmt as $project) {
                    $field1name = $project["topic"];
                    $field2name = $project["duedate"];

                    echo '<li><a href=""><span class="left"><p>'
                    . $field1name.'</p>'.
                    '<p>'.$field2name.'</p>'.
                    '</span>
                    <span class="right">
                        <p><input type="button" name="edit" value="Edit"></p>
                        <p><input type="button" name="details" value="Details"></p>
                        <p><input type="button" name="delete" value="Delete"></p>
                    </span>
                </li>';
                    
                }
            // die();
            }else {
                echo '<h2>No Projects added</h2>';
            }
        }

        //get Project by id
        public function getProjectById(){
            $query = "SELECT * FROM ". $this->table ." WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id'=>$this->id]);
            $row = $stmt->fetch();

            $this->id =$row['id'];
            $this->topic =$row['topic'];
            $this->description =$row['description'];
            $this->duedate =$row['duedate'];
            $this->admin_id =$row['admin_id'];
        }

        //create Project
        public function createProject(){
            $query = "INSERT INTO "
            .$this->table.
            " SET (topic, description, duedate, admin_id) 
            VALUES (:topic, :description, :duedate, :admin_id)";
            $stmt = $this->conn->prepare($query);

            $this->topic= validateDataForm($this->topic);
            $this->description = validateDataForm($this->description);
            $this->duedate = validateDataForm($this->duedate);
            $this->admin_id = validateDataForm($this->admin_id);

            $stmt-bindParam(':name', $this->topic);
            $stmt-bindParam(':faculty', $this->description);
            $stmt-bindParam(':department', $this->duedate);
            $stmt-bindParam(':admin_id', $this->admin_id);
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //update Project
        public function updateProject(){
            $query = "UPDATE "
            .$this->table.
            " SET (topic, description, duedate, admin_id) 
            VALUES (:topic, :description, :duedate, :admin_id) WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $this->id = validateDataForm($this->id);
            $this->topic= validateDataForm($this->topic);
            $this->description = validateDataForm($this->description);
            $this->duedate = validateDataForm($this->duedate);
            $this->admin_id = validateDataForm($this->admin_id);

            $stmt-bindParam(':id', $this->id);
            $stmt-bindParam(':name', $this->topic);
            $stmt-bindParam(':faculty', $this->description);
            $stmt-bindParam(':department', $this->duedate);
            $stmt-bindParam(':admin_id', $this->admin_id);
 
            $stmt->execute();
            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //delete Project
        public function deleteProject(){
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