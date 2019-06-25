<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=assessment", $user, $password);

		$abstract = $_POST['abstract'];
		$literature_review = $_POST['literature_review'];
		$methodology = $_POST['methodology'];
		$analysis = $_POST["analysis"];
		$conclusion = $_POST["conclusion"];

        $sql = "INSERT INTO `project_info`(`Abstract`, `Literature_Review`, `Methodology`, `Analysis`, `Conclusion`)
		 VALUES (:abstract,:literature_review,:methodology,:analysis,:conclusion) ";
		$pdosql = $conn->prepare($sql);
		$pdosql -> bindParam(':abstract', $abstract);
		$pdosql -> bindParam(':literature_review', $literature_review);
		$pdosql -> bindParam(':methodology', $methodology);
		$pdosql -> bindParam(':analysis', $analysis);
		$pdosql -> bindParam(':conclusion',$conclusion);
        $pdosql->execute();
        echo 'successful submission';
}
    catch(PDOexception $e){
        echo "Database error".$e->getMessage();
        die();
    }
?>