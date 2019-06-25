<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=oss", $user, $password);

        $sql = "SELECT * FROM projects ";
        $a = 'SELECT name, topic FROM examiners INNER JOIN projects ON examiners.examiners_id = projects.examiners_id;';
        $pdosql = $conn->prepare($a);
        $pdosql->execute();
        $result=$pdosql->fetchAll();
 
if (count($result)>0) {

    foreach ($result as $res) {
        $topic = $res['topic'];
        $name = $res['name'];
        echo  '<p><b>' . $topic . '</p></b>';
        echo  '<p>' . $name . '</p><br>';
    }
    
}

    }
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }
?>
