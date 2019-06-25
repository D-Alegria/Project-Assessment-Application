<?php 

include_once('models/Admin.php');
include_once('models/Student.php');
include_once('models/Examiner.php');
include('validate.php');
$LoginError = "";
    session_start();
if (isset($_SESSION["LoggedInUserId"])){
    echo $_SESSION["LoggedInUserId"];
}
        if(isset($_POST["submit"])){

           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
            $admin = new Admin($db);
            $examiner = new Examiner($db);
            $student = new Student($db);

            
            
            $password = validateDataForm(htmlentities($_POST["password"]));
            $admin->id = validateDataForm(htmlentities($_POST["userId"]));
            $adminUser = $admin->getAdminById();
            var_dump($adminUser);

            $examiner->id = validateDataForm(htmlentities($_POST["userId"]));
            $examinerUser = $examiner->getExaminerById();
            var_dump($examinerUser);
            
            $student->id = validateDataForm(htmlentities($_POST["userId"]));
            $studentUser = $student->getStudentById();
            var_dump($studentUser);
            if ($adminUser > 0) {
               if(getDetails($admin,$password)){
                header("Location: admindashboard.php");
               }else{
                $LoginError = "<p><small>Wrong userId or Password. Please Try again.</small></p>";
               }
                
            } elseif ($examinerUser > 0) {
                if(getDetails($examiner,$password)){
                    header("Location: examinersEdited.php");
                   }
            } elseif ($studentUser > 0) {
                echo "4";
                if(getDetails($student,$password)){
                    header("Location: students.php");
                   }else {
                    $LoginError = "<p><small>Wrong userId or Password. Please Try again.</small></p>";
                   }
            } else {
                $LoginError = "<p><small>No such user</small></p>";
            }
            // die();
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/external.css">
    <link rel="stylesheet" href="static/css/index.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <div class="wrapper">
        <?php echo $LoginError;?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <?php  
                    if(isset($_SESSION["UserId"])){
                        echo '<p class = "wrap-input"><input class="" type="text" name="userId" placeholder="User ID" value='.$_SESSION["UserId"].'></p>';
                    }
                    else{
                        echo '<p class = "wrap-input"><input class="" type="text" name="userId" placeholder="User ID"></p>';
                    }
                ?>
                <p class = "wrap-input"><input class="" type="password" name="password" placeholder="Password"></p>
                <p><a href="signup.php">Create an account</a></p>
                <p class = "wrap-input"><input class="" type="submit" name="submit" value="Login"></p>
            </form>
        </div>
    </div>
    
</body>
</html>