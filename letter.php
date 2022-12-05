<?php include 'sheader.php'; ?>
<?php 
	if(isset($_POST['warn'])){
		$title = $_POST['title'];
		$warning = $_POST['iko'];
		$emp = $_POST['emp'];
		
		$query = mysqli_query($conn,"INSERT INTO warning(Title,Warning,Date,EmpNo) VALUES ('$title','$warning',NOW(),'$emp')");
		if($query){
			echo "<script>alert('Served');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
		}
	}
?>
<head>
	<title>Warn</title>
	<style>
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
<body>
	<div class="bio">
		<div>
			<form method="post">
				<label>Employee No.</label>
				<input type="text" name="emp" required autocomplete="off">
				<label>Ref</label>
				<input type="text" name="title" required autocomplete="off">
				<label>Warning</label>
				<textarea name="iko"></textarea>
				<label>&nbsp;</label><input type="Submit" value="Submit" name="warn">
			</form>
		</div>
		<div>
			<table>
				<tr>
					<th>Employee</th>
					<th>Date</th>
					<th>Warning</th>
					<th></th>
				</tr>
				<?php 
					$qr = mysqli_query($conn,"SELECT * FROM warning");
					while($row=mysqli_fetch_assoc($qr)){
						?>
						<tr>
							<td><?php echo $row['EmpNo'];?></td>
							<td><?php echo $row['Date']; ?></td>
							<td><?php echo $row['Title']; ?></td>
						</tr>
						<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>