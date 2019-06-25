<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=assessment", $user, $password);

        $sql = "SELECT * FROM examiner";
        $pdosql = $conn->prepare($sql);
        $pdosql->execute();
        $result=$pdosql->fetchAll();

        if (count($result)>0) 
        {

        foreach ($result as $examiner) {
            $field1name = $examiner["id"];
            $field2name = $examiner["fname"] . $examiner["sname"];
            $field3name = $examiner["faculty"];
            $field4name = $examiner["department"];

            echo '<li><a href=""><span class="left"><p>'
            . $field1name.'</p>'.
            '<p>'.$field2name.'</p>'.
            '<p>'.$field3name.'</p>'.
            '<p>'.$field4name.'</p>'.
            '</span>
            <span class="right">
                <input type="button" value="Assign">
            </span></a>
        </li>';
            
        }

    }

}
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }
?>