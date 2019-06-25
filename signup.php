a<?php 
include_once('config/connect.php');
include_once('models/Admin.php');
include('validate.php');

$password ="";
$passwordError ="";
        
        if(isset($_POST["submit"])){
            $database = new Database();
            $db = $database->connect();
            $admin = new Admin($db);

            $sname = htmlentities($_POST["sname"]);
            $fname = htmlentities($_POST["fname"]);

            $admin->id = createAdminId($fname,$sname);
            $admin->fullname = getName($fname,$sname);

            $admin->email = htmlentities($_POST["email"]);
            $admin->faculty = htmlentities($_POST["faculty"]);
            $admin->department = htmlentities($_POST["department"]);
            $admin->lecturer_id = htmlentities($_POST["ID"]);
            $admin->school = htmlentities($_POST["school"]);

            $password1 = htmlentities($_POST["password1"]);
            $password2 = htmlentities($_POST["password2"]);
            
            if (checkpassword($password1,$password2)){
                $admin->password = password_hash($password1,PASSWORD_DEFAULT);
            }else {
                $passwordError = "<p><small>Password doesn't match</small></p>";
            }

            
            
            if($admin->password){
                session_start();

                $_SESSION["LoggedInUserId"] = $admin->id; 
                echo $_SESSION["LoggedInUserId"]; 
                $admin->createAdmin();

                header("Location: index.php");
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/external.css">
    <link rel="stylesheet" href="static/css/signup.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
                <p><input class="" type="text" name="sname" placeholder="First Name" required value ></p>
                <p><input class="" type="text" name="fname" placeholder="Second Name" required></p>
                <p><input class="" type="email" name="email" placeholder="Email" required></p>
                <p><input class="" type="text" name="faculty" placeholder="Faculty" required></p>
                <p><input class="" type="text" name="department" placeholder="Department" required></p>
                <p><input class="" type="text" name="ID" placeholder="Lecturer ID" required></p>
                <p><input class="" type="text" name="school" placeholder="Name of School" required></p>
                <p><input class="" type="password" name="password1" placeholder="Password" required></p>
                <?php echo $passwordError ?>;
                <p><input class="" type="password" name="password2" placeholder="Password Confirmation" required></p>
                <p><a href="index.php">Login</a></p>

                <p><input class="" type="submit" name="submit" value="Sign Up"></p>
            </form>
        </div>
    </div>
</body>
</html>