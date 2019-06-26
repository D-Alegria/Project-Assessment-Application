<?php
    // include_once "/../validate.php";
    class Assignment {
        //db stuff
        private $conn;
        private $table = 'assignment';

        //Assignment properties
        public $examiner_id;
        public $project_id;
        public $project_title;
        public $id;

        //contructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get Assignment
        public function getAllAssignmentForExaminer(){
        $query = "SELECT * FROM ". $this->table."WHERE examiner_id = :examiner_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(["examiner_id"=>$examiner_id]);
            $stmt->fetchAll(PDO::FETCH_ASSOC)
            return $stmt;
        }

        //get Assignment by id
        public function getSubmittedStudents(){
            $query = "SELECT student.id FROM ".$this->table." WHERE student_id =: student_id && admin_id =: admin_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['student_id'=>$this->student_id ,'admin_id'=>$this->admin_id]);
            $row = $stmt->fetch();
    }