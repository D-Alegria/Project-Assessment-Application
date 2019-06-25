<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=assessment", $user, $password);

        $sql = "SELECT * FROM student";
        $pdosql = $conn->prepare($sql);
        $pdosql->execute();
        $result=$pdosql->fetchAll();

    if (count($result)>0) 
    {

    foreach ($result as $examiner) {
        $field1name = $examiner["project-topic"];
        $field2name = $examiner["duedate"];

        echo "<a href='examinersEdited.php'><li><p>"
        . $field1name.'</p>'.
        '<p>'.$field2name.'</p>'.'</a></li>';
        
    }

    }

}
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }
?>