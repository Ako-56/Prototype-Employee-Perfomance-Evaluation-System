<?php
	include 'config/config.php';
	header('Content-Type: application/json');

	$sqlQuery = "SELECT (SELECT Name FROM employees WHERE employees.Section=evaluate.Section AND Level='Supervisor')Name,
				 (SELECT Name FROM sections WHERE sections.Code=evaluate.Section)Section,ROUND(AVG(Rating),1) AS Rat FROM evaluate GROUP BY Section ";

	$result = mysqli_query($conn,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	//mysqli_close($conn);

	echo json_encode($data);
?>