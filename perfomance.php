<?php include 'sheader.php'; ?>
<head>
	<title>Evaluation</title>
	<style>
	.ghed{
			background-color:#00cc99;
			color:white; 
			text-align:center;
			padding:auto 10px;
			font-weight:bold;
		}
		.bio {
			  display: grid;
			  grid-template-columns: 45% 45%;
			  justify-content:center;
			  grid-gap: 5px;
			  padding: 1px;
			}

			.bio > div {
			  padding: 2px 0;
			  font-size: 20px;
			}
			table {
			  border-collapse: collapse;        
			  width: 100%;
			}
			th,
			td {
			  border: 1px solid #529432;
			}
			th {
			  background: #ABDD93;
			}
			th {
				cursor: pointer;
			}
			#chart-container {
			margin-bottom:200px;
			height: 250px;
			
			}
			#chart-container2 {
			margin-bottom:200px;
			height: 250px;
			
			}
			
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<script>
function sortex(){
	const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

	const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
    v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

// do the work...
	document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
    const table = th.closest('table');
    Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => table.appendChild(tr) );
	})));
}
</script>
<body>
	<div class="bio">
		<div>
			<div class="ghed" style="background-color:#999900; font-size:15px;">Perfomance per Section</div>
			<table>
				<tr>
					<th align="left" onclick="sortex()">Section</th>
					<th align="left" onclick="sortex()">Supervisor</th>
					<th align="left" onclick="sortex()">Rating(%)</th>
				</tr>
				<?php 
				 $qry = mysqli_query($conn,"SELECT (SELECT Name FROM employees WHERE employees.Section=evaluate.Section AND Level='Supervisor')Name,
				 (SELECT Name FROM sections WHERE sections.Code=evaluate.Section)Section,ROUND(AVG(Rating),1) AS Rat FROM evaluate GROUP BY Section ORDER BY Rat DESC");
				 if(!$qry){
					 echo "failed".mysqli_error($conn);
				 }
				 while($rows=mysqli_fetch_assoc($qry)){
					 ?>
					 <tr>
						<td><?php echo $rows['Section']; ?> </td>
						<td><?php echo $rows['Name']; ?></td>
						<td><?php echo $rows['Rat']*10; ?>%</td>
					 </tr>
					 <?php
				 }
				?>
			</table>
		</div>
		<div>
			<div class="ghed" style="background-color:#999900; font-size:15px;">Perfomance per Employees</div>
			<table>
				<tr>
					<th align="left" onclick="sortex()">Name</th>
					<th align="left" onclick="sortex()">Section</th>
					<th align="left" onclick="sortex()">Rating(%)</th>
				</tr>
				<?php 
				 $qry = mysqli_query($conn,"SELECT (SELECT Name FROM employees WHERE employees.EmpNo=empvaluate.Employee)Name,
				 (SELECT Name FROM sections WHERE sections.Code=empvaluate.Section)Section,ROUND(AVG(Rating),1) AS Rat FROM empvaluate GROUP BY Employee");
				 if(!$qry){
					 echo "failed".mysqli_error($conn);
				 }
				 while($rows=mysqli_fetch_assoc($qry)){
					 ?>
					 <tr>
						<td><?php echo $rows['Name']; ?></td>
						<td><?php echo $rows['Section']; ?> </td>
						<td><?php echo $rows['Rat']*10; ?>%</td>
					 </tr>
					 <?php
				 }
				?>
			</table>
		</div>
	</div>
	<div class="bio">
		<div>
			 <div id="chart-container2">
				<canvas id="graphCanvas2" height="200px" ></canvas>
			</div>
			<script>
				$(document).ready(function () {
					showGraph2();
				});


				function showGraph2()
				{
					{
						$.post("datas.php",
						function (data)
						{
							console.log(data);
							 var name = [];
							var rating = [];

							for (var i in data) {
								name.push(data[i].Section);
								rating.push(data[i].Rat);
							}

							var chartdata = {
								labels: name,
								datasets: [
									{
										label: 'Section Rating',
										backgroundColor: '#49e2ff',
										borderColor: '#46d5f1',
										hoverBackgroundColor: '#CCCCCC',
										hoverBorderColor: '#666666',
										data: rating
									}
								]
							};

							var graphTarget = $("#graphCanvas2");

							var barGraph = new Chart(graphTarget, {
								type: 'bar',
								data: chartdata
							});
						});
					}
				}
				</script>
		</div>
		<div>
			 <div id="chart-container">
				<canvas id="graphCanvas" height="200px" ></canvas>
			</div>
			<script>
				$(document).ready(function () {
					showGraph();
				});


				function showGraph()
				{
					{
						$.post("data.php",
						function (data)
						{
							console.log(data);
							 var name = [];
							var rating = [];

							for (var i in data) {
								name.push(data[i].Name);
								rating.push(data[i].Rat);
							}

							var chartdata = {
								labels: name,
								datasets: [
									{
										label: 'Employee Rating',
										backgroundColor: '#49e2ff',
										borderColor: '#46d5f1',
										hoverBackgroundColor: '#CCCCCC',
										hoverBorderColor: '#666666',
										data: rating
									}
								]
							};

							var graphTarget = $("#graphCanvas");

							var barGraph = new Chart(graphTarget, {
								type: 'bar',
								data: chartdata
							});
						});
					}
				}
				</script>
		</div>
	</div>
	<div style="margin-bottom:150px;">&nbsp; </div>
</body>
<?php include 'footer.php'; ?>