<?php include "config/connect.php" ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="stylesheet" href="static/css/external.css">
    	<link rel="stylesheet" href="static/css/admin.css">
		<title>Document</title>
	</head>
	<body>
		<div class="container">
			<div class="nav">
				<p class= "title">Student Page</p><br>
				<p>Student Fullname</p>
				<p>Student Matric No.</p> 
				<p>Student Project Name</p>
				<p>Project Due date</p>
				
			</div>
			<div class="content">
				<form action="" method="post">
					<div>
						<p><label for="abstract">Abstract</label></p>
						<p><textarea name="abstract" id="abstract" cols="30" rows="10" placeholder="Type here..."></textarea></p>
					</div>
					<div>
						<p><label for="lr">Literature Review</label></p>
						<p><textarea name="lr" id="lr" cols="30" rows="10" placeholder="Type here..."></textarea></p>
					</div>
					<div>
						<p><label for="methodology">Methodology</label></p>
						<p><textarea name="methodology" id="methodology" cols="30" rows="10" placeholder="Type here..."></textarea></p>
					</div>
					<div>
						<p><label for="analysis">Analysis</label></p>
						<p><textarea name="analysis" id="analysis" cols="30" rows="10" placeholder="Type here..."></textarea></p>
					</div>
					<div>
						<p><label for="conclusion">Conclusion</label></p>
						<p><textarea name="conclusion" id="" cols="30" rows="10" placeholder="Type here..."></textarea></p>
					</div>
					<input type="button" value="Sumbit">
				</form>
			</div>
		</div>
	</body>
</html>
