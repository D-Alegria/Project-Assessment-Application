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
  #nav > p{
    color: white;
  }
  </style>
</head>
<body>
  
<div class="container-fluid"> 
<div class="row">

  <div class="col-sm-2" class="text-black-50" id='nav'>
  <br>
  <p><b>EXAMINERS PAGE </b></p>
  <p>Students</p>
      <div class="card">
        <div class='container'>
          <h5 class="card-title">Project Topic</h5>
          <p class="card-text">Supervisor Name</p>
        </div>
      </div>
<br>
      <div class="card">
        <div class='container'>
          <h5 class="card-title">Project Topic</h5>
          <p class="card-text">Supervisor Name</p>
        </div>
      </div>
      

      <br>
      <div class="card">
        <div class='container'>
          <h5 class="card-title">Project Topic</h5>
          <p class="card-text">Supervisor Name</p>
        </div>
      </div>
      
  </div>
  

  <div class="col-sm-8" class="text-black-50">

  <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=oss", $user, $password);

        $sql = "SELECT * FROM projects ";
        $pdosql = $conn->prepare($sql);
        $pdosql->execute();
        $result=$pdosql->fetchAll();
 
if (count($result)>0) {

    foreach ($result as $examiner) {
        $field1name = $examiner["ID"];
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

  <div class="col-sm-2" class="text-black-50" id='nav'>

  
  </div>

</div>
</div>
</body>
</html>
<!-- create table projects
(
id int primary key auto_increment,
topic CHARACTER not null,
supervisor_id int not null,
student_id int not null,
duedate date not null,
foreign key(supervisor) references examiners(ID),
foreign key(student) references students(ID)  
); -->