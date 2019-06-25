<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=oss", $user, $password);

        $sql = "SELECT * FROM projects ";
        $a = 'SELECT AB, LR, ME, AN, CO FROM projectdet';
        $pdosql = $conn->prepare($a);
        $pdosql->execute();
        $result=$pdosql->fetchAll();
 
    if (count($result)>0) {

    foreach ($result as $res) {
        $AB = $res['AB'];
        $ME = $res['ME'];
        echo '<p><b> Abstract  </b></p>' . $AB . '<br>';
        echo '<p><b> METHODOLOGY  </b></p>' . $ME . '<br>';
        $LR = $res['LR'];
        echo '<p><b> LITERATURE REVIEW </b></p>' . $LR . '<br>';
        $AN= $res['AN'];
        echo '<p><b> ANALYSIS </b></p>' . $AN . '<br>';
        $CO = $res['CO'];
        echo '<p><b> CONCLUSION </b></p>' . $CO . '<br>';
    }
    
}

    }
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }
?>
