<?php include 'eheader.php'; ?>
<?php 
	$emp = $_SESSION['mtu'];
	if(isset($_POST['submit'])){
		$empno = $_POST['empno'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		$reason = $_POST['reason'];
		
		$Qry = mysqli_query($conn,"INSERT INTO empleave(EmpNo,LFrom,LTo,Reason) 
			VALUES ('$empno','$from','$to','$reason')");
		if($Qry){
			echo "<script>alert('Request Submitted Wait For Approval');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
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
			form {
			  width: 100%;
			  
			}
			label,
			input{
			  display: inline-block;
			}

			label {
			  width: 40%;
			  text-align: right;
			}

			label+input {
			  width: 40%;
			  margin: 1% 10% 0 2%;
			}

			input+input {
			  float: right;
			}
			textarea,select{
			  border-radius: 4px;
			  box-sizing: border-box;
			  width:40%;
			   margin: 1% 10% 0 2%;
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
		<script>
			function checkTime () {
				var stime = document.getElementById("start").value;
				var etime = document.getElementById("end").value;
			  if(stime<etime){
			   return true
			  }
			  else{
			   document.getElementById("end").value="";
			   document.getElementById("note").style.display='Block';
			  }
			}
		</script>
<body>
	<div class="bio">
		<div>
			<h3>Fill the Form Below to Request Leave</h3>
			<form method="post">
				<label>Employee Number</label>
				<input type="text" value="<?php echo $emp; ?>" name="empno" required autocomplete="off" readonly>
				<label>Leave From</label>
				<input type="date" name="from" id="start" onchange="checkTime()" required >
				<label>Leave To</label>
				<input type="date" name="to" id="end" onchange="checkTime()" required>
				<label>Reason</label>
				<textarea name="reason"></textarea>
				<label>&nbsp;</label><input type="submit" name="submit" value="Submit">
 			</form>
		</div>
		<div>
			<caption>Your Leave Requests</caption>
			<table>
				<tr>
					<th>LeaveNo.</th>
					<th>Supervisor</th>
					<th>Status</th>
				</tr>
				<?php 
				$Qva = mysqli_query($conn,"SELECT Id,SuperV,Status FROM empleave WHERE EmpNo='$emp'");
				while($rows=mysqli_fetch_assoc($Qva)){
					?>
					<tr>
						<td><?php echo $rows['Id']; ?></td>
						<td><?php echo $rows['SuperV']; ?> </td>
						<td><?php echo $rows['Status']; ?> </td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>