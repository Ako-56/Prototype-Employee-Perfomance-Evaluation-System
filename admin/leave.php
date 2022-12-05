<?php include 'header.php'; ?>
<?php
	if(isset($_POST['approve'])){
		$leav = $_POST['mtu'];
		
		foreach($leav AS $all){
			$Qvq = mysqli_query($conn,"UPDATE empleave SET Status='Approved' WHERE Id='$all'");
			if($Qvq){
				echo "<script>alert('Approved');</script>";
			}else{
				echo "failed" .mysqli_error($conn);
			}
		}
	}
?>
<head>
	<title>Leave</title>
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
				<table>
						<tr>
							<th align="left">LeaveNo.</th>
							<th align="left">Supervisor</th>
							<th align="left">Status</th>
							<th align="left"><input type="checkbox" onClick="toggle(this)" />All</th>
						</tr>
					<?php 
					$Qva = mysqli_query($conn,"SELECT Id,(SELECT Name  FROM employees WHERE employees.EmpNo=empleave.EmpNo)Emp,Status FROM empleave WHERE Status='Pending'");
					if(mysqli_num_rows($Qva)>0){
					while($rows=mysqli_fetch_assoc($Qva)){
						?>
						<tr>
							<td><?php echo $rows['Id']; ?></td>
							<td><?php echo $rows['Emp']; ?> </td>
							<td><?php echo $rows['Status']; ?> </td>
							<td><input type="checkbox" name="mtu[]" value="<?php echo $rows['Id']; ?>"></td>
						</tr>
						<?php
					}}else{
						?>
						<tr><td colspan=4 align="center"> No Leaves Approved</td>
						<?php
					}
					?>
				</table>
				<input type="submit" name="approve" value="Approve" style="float:right">
			</form>
		</div>
		<div>
			<form method="post">
				<table>
					<tr>
						<th align="left">LeaveNo.</th>
						<th align="left">Name</th>
						<th align="left">Status</th>
					</tr>
					<?php 
					$Qva = mysqli_query($conn,"SELECT Id,(SELECT Name  FROM employees WHERE employees.EmpNo=empleave.EmpNo)Emp,Status FROM empleave");
					if(mysqli_num_rows($Qva)>0){
					while($rows=mysqli_fetch_assoc($Qva)){
						?>
						<tr>
							<td><?php echo $rows['Id']; ?></td>
							<td><?php echo $rows['Emp']; ?> </td>
							<td><?php echo $rows['Status']; ?> </td>
						</tr>
						<?php
					}}else{
						?>
						<tr><td colspan=4 align="center"> No Leaves Approved</td>
						<?php
					}
					?>
				</table>
			</form>
		</div>
	</div>
</body>
<?php include '../footer.php'; ?>