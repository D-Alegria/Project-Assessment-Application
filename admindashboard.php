<?php 
// include("config/connect.php");
// include_once('models/Admin.php');
// include('validate.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/external.css">
    <link rel="stylesheet" href="static/css/admin.css">
    <title>Document</title>
    <style>
        .right{
            display:flex;
            align-items: center;
            justify-content: center;
        }

        li {
            background-color: #ffffff;
            border:1px black solid;
            padding: 10px;
            border-radius: 5px;
            display: grid;
            grid-template-columns: repeat(2,1fr);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <p class= "title">admin </p><br>
            <p><a href="admindashboard.php"  >dashboard</a></p>
            <p><a href="adminstudents.php">students</a></p> 
            <p><a href="adminexaminer.php">examiners</a></p>
            <p><a href="adminprojects.php">projects</a></p>
            <p><a href="adminresults.php">results</a></p>
        </div>
        <div class="content">
            <div class="wrapper">
                <h2><p>New Submissions</p></h2>
                <hr>
                <ul>
                    <li>
                        <span class="left">
                            <p>Matric No.</p>
                            <p>Student Name</p>
                            <p>Project name</p>
                            <p>Submission Date</p>
                        </span>
                        <span class="right">
                            <input type="button" value="Assign">
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <p>Matric No.</p>
                            <p>Student Name</p>
                            <p>Project name</p>
                            <p>Submission Date</p>
                        </span>
                        <span class="right">
                            <input type="button" value="Assign">
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <p>Matric No.</p>
                            <p>Student Name</p>
                            <p>Project name</p>
                            <p>Submission Date</p>
                        </span>
                        <span class="right">
                            <input type="button" value="Assign">
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <p>Matric No.</p>
                            <p>Student Name</p>
                            <p>Project name</p>
                            <p>Submission Date</p>
                        </span>
                        <span class="right">
                            <input type="button" value="Assign">
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <p>Matric No.</p>
                            <p>Student Name</p>
                            <p>Project name</p>
                            <p>Submission Date</p>
                        </span>
                        <span class="right">
                            <input type="button" value="Assign">
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <p>Matric No.</p>
                            <p>Student Name</p>
                            <p>Project name</p>
                            <p>Submission Date</p>
                        </span>
                        <span class="right">
                            <input type="button" value="Assign">
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>