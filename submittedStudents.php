<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="static/css/external.css">
    	<link rel="stylesheet" href="static/css/examiner.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
		<div class="nav">
		<p class="title">Examiner Page</p>
                <hr>
		</div>
			<div class="content">
			<div class="wrapper">
                <h2><p>SUbmitted Students</p></h2>
                <hr>
                <ul>
                   <?php 
                        include"model/Assignment.php";
						$assignment = new Assignment;
						session_start();
                        $assignment->examiner_id = $_SESSION["LoggedInUserId"];
                        $assignment->project_id = 
						$assignment->();
						foreach ($assignment as $assign) {
							echo $assign['project_topic'];
							# code...
						}
                    ?>                 
                </ul>
            </div>
            </div>
		</div>
</body>
</html>