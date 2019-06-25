<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/external.css">
    <link rel="stylesheet" href="static/css/admin.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <p class= "title">admin </p><br>
            <p><a href="admindashboard.php">dashboard</a></p>
            <p><a href="adminstudents.php">students</a></p> 
            <p><a href="adminexaminer.php">examiners</a></p>
            <p><a href="adminprojects.php">projects</a></p>
            <p><a href="adminresults.php">results</a></p>
        </div>
        <div class="content">
            <div class="wrapper">
                <h2><p>Project List</p></h2>
                <hr>
                <ul>
                   <?php 
                        include "projectlist.php";
                    ?>                 
                </ul>
            </div>
            <div class="button">
                <input type="button" name="add" value="Add">
            </div>
        </div>
    </div>
</body>
</html>