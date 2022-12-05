<?php include 'header.php'; ?>
<?php 
	if(isset($_POST['approve'])){
		$emps = $_POST['mtu'];
		
		foreach($emps AS $all){
			$Qvq = mysqli_query($conn,"UPDATE employees SET Password='1234',Status='1' WHERE EmpNo='$all'");
			if($Qvq){
				echo "<script>alert('Approved');</script>";
			}else{
				echo "failed" .mysqli_error($conn);
			}
		}
	}
?>
<head>
	<title>Approve</title>
	<style>
		.bio {
			  display: grid;
			  grid-template-columns: 40% 55%;
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
			
			.j{
				visibility:hidden;
				display:none;
			}
			.ghed{
			background-color:#00cc99;
			color:white; 
			text-align:center;
			padding:auto 10px;
			font-weight:bold;
		}
		.fixTableHead_1 {
			  overflow-y: auto;
			  height: 300px;
			}
			.fixTableHead_1 thead th {
			  position: sticky;
			  top: 0;
			}
	</style>
</head>
		<script>     
			if ( window.history.replaceState ) {
			  window.history.replaceState( null, null, window.location.href );
			} 
		</script>
		<script language="JavaScript">
		function toggle(source) {
		checkboxes = document.getElementsByName('mtu[]');
		  for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		  }
		}
	</script>
<body>
	<div class="bio">
		<div>
		<form method="post">
			<div class="ghed" style="background-color:#999900; font-size:15px;">Approve the Employees Below</div>
				<div class="fixTableHead_1">
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Section</th>
								<th align="left"><input type="checkbox" onClick="toggle(this)" />All</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$Qry = mysqli_query($conn,"SELECT * FROM employees WHERE Status='0'");
							while($rows = mysqli_fetch_assoc($Qry)){
								?>
								<tr>
									<td></td>
									<td><?php echo $rows['Name']; ?></td>
									<td><?php echo $rows['Section']; ?></td>
									<td><input type="checkbox" name="mtu[]" value="<?php echo $rows['EmpNo']; ?>"></td>
								</tr>
								<?php
							}
						?>
						</tbody>
					</table>
				</div>
				<input type="submit" name="approve" value="Approve" style="float:right">
			</form>
		</div>
		<div>
			<div class="ghed" style="background-color:#999900; font-size:15px;">Approved Employees</div>
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Section</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$Qry = mysqli_query($conn,"SELECT * FROM employees WHERE Status='1'");
							while($rows = mysqli_fetch_assoc($Qry)){
								?>
								<tr>
									<td></td>
									<td><?php echo $rows['Name']; ?></td>
									<td><?php echo $rows['Section']; ?></td>
								</tr>
								<?php
							}
						?>
						</tbody>
					</table>
		</div>
	</div>
</body>
<?php include '../footer.php'; ?>