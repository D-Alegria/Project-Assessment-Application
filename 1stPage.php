<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  #nav{
      background-color: black;
  }
  </style>
</head>
<body>
  
<div class="container-fluid">
<div class="row">
  <div class="col-sm-2" class="text-black-50" id='nav'>
  <div class="container">
  <p><a href='#'> ADMIN </a></p>
        <p><a href='#'> DASHBOARD </a></p>
        <p><a href='#'> STUDENTS </a></p>
        <p><a href='#'> EXAMINERS </a></p>
        <p><a href='#'> PROJECTS </a></p>
        <p><a href='#'> RESULTS </a></p>
  </div>
</div>
  <div class="col-sm-10" id='con'>
  <div class="container">
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Project Name</h4>
      <p class="card-text">Student Name</p>
      <p class="card-text">Matric Number</p>
      <div class="list-group">


      <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=oss", $user, $password);

        $sql = "SELECT * FROM examiners ";
        $pdosql = $conn->prepare($sql);
        $pdosql->execute();
        $result=$pdosql->fetchAll();
 
if (count($result)>0) {

    foreach ($result as $examiner) {
        $field1name = $examiner["examiners_id"];
        $field2name = $examiner["name"];
        $field3name = $examiner["faculty"];
        $field4name = $examiner["department"];
 
        echo '<a href="#" class="list-group-item"> <p><b>'
        . $field1name.'</b></p>'.
        '<p>'.$field2name.'</p>'.
        '<p>'.$field3name.'</p>'.
        '<p>'.$field4name.'</p>'.
        '</a><br />';
        
    }

}

    }
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }
?>

    </div>
    <br>
    <div class='container'>
    <div class="row">
        <div class="col-sm-6">
        <button type="button" class="btn btn-dark">Assign</button>
        </div>
        <div class="col-sm-6">
        <button type="button" class="btn btn-dark">Auto</button>
        </div>
    </div>
</div>
</div>
</div>         
</div>

</body>
</html>


<!-- $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=oss", $user, $password);

        $sql = "SELECT * FROM students ";
        $pdosql = $conn->prepare($sql);
        $pdosql->execute();
        $result=$pdosql->fetchAll();
 
if (count($result)>0) {

    foreach ($result as $student) {
        $field1name = $student["ID"];
        $field2name = $student["fname"];
        $field3name = $student["sname"];
        $field4name = $student["matric"];
        $field5name = $student["pname"];
 
        echo '<b>'.$field2name.$field3name.'</b><br />';
        echo $field1name.'<br />';
        echo $field4name.'<br />';
        echo $field5name;
    }

}

    }
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }  -->