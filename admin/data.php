<?php
	include '../config/config.php';
	header('Content-Type: application/json');

	$sqlQuery = "SELECT (SELECT Name FROM employees WHERE employees.EmpNo=empvaluate.Employee)Name,
				 (SELECT Name FROM sections WHERE sections.Code=empvaluate.Section)Section,ROUND(AVG(Rating),1) AS Rat FROM empvaluate GROUP BY Employee ORDER BY Employee";

	$result = mysqli_query($conn,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	echo json_encode($data);
?>