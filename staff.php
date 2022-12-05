<?php include 'header.php'; ?>
<head>
	<title>Staff</title>
	<style>
		table {
			  border-collapse: collapse;        
			  width: 80%;
			}
			th,
			td {
			  border: 1px solid #529432;
			}
			th {
			  background: #ABDD93;
			}
			.p img {
				transition: 0.5s all ease-in-out;
			}
			  
			.p:hover img {
				transform: scale(1.5);
			}
	</style>
</head>
<body>
	<div style="display:flex;justify-content:center;">
		<h4 >Below is the list of All our Employees<h4>
	</div>
	<div style="display:flex;justify-content:center;">
		<table>
					<tr>
						<th align="left">No.</th>
						<th align="left">Image</th>
						<th align="left">Name</th>
						<th align="left">Section</th>
					</tr>
					<?php
						$all = mysqli_query($conn,"SELECT EmpNo,Name,(SELECT Name FROM sections WHERE sections.Code=employees.Section)Section,Image FROM employees ORDER BY Section");
						while($rows = mysqli_fetch_assoc($all)){
							?>
							<tr>
								<td><?php echo $rows['EmpNo'];?></td>
								<td>
									<div class="p">
										  <img src="images/<?php echo $rows['Image']; ?>" width="50px" height="50px">
									</div>
								</td>
								<td><?php echo $rows['Name'];?></td>
								<td><?php echo $rows['Section'];?></td>
							</tr>
							<?php
						}
					?>
				</table>		
	</div>
</body>
<?php include 'footer.php'; ?>