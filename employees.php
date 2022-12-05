<?php include 'sheader.php'; ?>
<?php
	if(isset($_POST['save'])){
		$fname = $_POST['fname'];
		$idno = $_POST['idno'];
		$Email = $_POST['Email'];
		$dob = $_POST['DOB'];
		$pno = $_POST['Pno'];
		$gender = $_POST['gender'];
		$level = $_POST['level'];
		$sect = $_POST['sect'];
		$empno = rand(100,500).'PC'.rand(50,300);
		$filename = $_FILES["photo"]["name"];
		$tempname = $_FILES["photo"]["tmp_name"];
		$folder = "/images";
		 
		$Query = mysqli_query($conn,"SELECT Email FROM employees WHERE Email='$Email'");
		if(mysqli_num_rows($Query)>0){
			echo "<script>alert('Already exist')</script>";
		}else{
			$add = mysqli_query($conn,"INSERT INTO employees(Name,IdNo,Email,DOB,Pno,Gender,Level,Section,EmpNo,Image) 
			VALUES ('$fname','$idno','$Email','$dob','$pno','$gender','$level','$sect','$empno','$filename')");
			if($add){
				move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name']);
				echo "<script>alert('Success');</script>";
			}else{
				echo "Failed" .mysqli_error($conn);
			}
		}
	}
?>
<html>
	<head>
		<title>Employees</title>
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
			.ghed{
			background-color:#00cc99;
			color:white; 
			text-align:center;
			padding:auto 10px;
			font-weight:bold;
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
		</style>
	</head>
		<script>     
			if ( window.history.replaceState ) {
			  window.history.replaceState( null, null, window.location.href );
			} 
		</script>
	<body>
		<div class="bio">
			<div>
				<div class="ghed" style="background-color:#999900; font-size:15px;">Add Employees</div>
				<form method="post" enctype="multipart/form-data">
					<label>Full Names</label>
					<input type="text" name="fname" value="" required autocomplete="off">
					    
						<label>ID Number</label>
					<input type="text" name="idno" value="" required autocomplete="off">
						<label>Email address</label>
					<input type="email" name="Email" value="" required autocomplete="off">
					
						<label>Date of birth</label>
					<input type="date" name="DOB" value="" required autocomplete="off">
						<label>phone number</label>
					<input type="text" name="Pno" value="" required autocomplete="off">
					
					<label>Gender</label>
					<select name="gender">
						<option value="">SELECT GENDER</option>
						<option>Male</option>
						<option>Female</option>
					</select>
					<label>Level</label>
					<select name="level">
						<option value="">SELECT LEVEL</option>
						<option>Supervisor</option>
						<option>Worker</option>
					</select>
				
					<label>Section</label>
					<select name="sect">
						<option value="">SELECT SECTION</option>
						<?php
							$sect = mysqli_query($conn,'SELECT * FROM sections');
							while($sections = mysqli_fetch_assoc($sect)){?>
							
								<option value='<?php echo $sections['Code']; ?>'><?php echo $sections['Name']; ?></option>
						<?php	}
						?>
					</select>
					<label>Passport</label>
					<input type="file" name="photo" required>
					<label>&nbsp;</label><input type="submit" name="save" value="Add">
				 </form>
			</div>
			<div>
				<div class="ghed" style="background-color:#999900; font-size:15px;">Employees</div>
				<table>
					<tr>
						<th>Name</th>
						<th>Section</th>
						<th>Level</th>
					</tr>
					<?php
						$all = mysqli_query($conn,"SELECT Name,(SELECT Name FROM sections WHERE sections.Code=employees.Section)Section,Level FROM employees");
						while($rows = mysqli_fetch_assoc($all)){
							?>
							<tr>
								<td><?php echo $rows['Name'];?></td>
								<td><?php echo $rows['Section'];?></td>
								<td><?php echo $rows['Level'];?></td>
							</tr>
							<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
<?php include 'footer.php'; ?>
