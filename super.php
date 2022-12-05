<?php
	include 'header.php';
?>
<?php 
	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$super = $_POST['super'];
		$chk = mysqli_query($conn,"SELECT Name FROM sections WHERE Name='$name'");
		if(mysqli_num_rows($chk)>0){
			echo "<script>alert('section already added')</script>";
		}else{
			$Qrey = mysqli_query($conn,"INSERT INTO sections (Name,Supervisor) VALUES ('$name','$super')");
			if($Qrey){
				echo "<script>alert('Added Succesfully');</script>";
			}else{
				echo "failed" .mysqli_error($conn);
			}
		}
	}
	
	$sect='';$supe='';$cod='';
	if(isset($_POST['edit'])){
		$cd = $_POST['edit'];
		$fetch = mysqli_query($conn,"SELECT * FROM sections WHERE Code='$cd'");
		$reslt = mysqli_fetch_assoc($fetch);
		$sect = $reslt['Name'];
		$supe = $reslt['Supervisor'];
		$cod = $reslt['Code'];
	}
	
	if(isset($_POST['update'])){
		$name = $_POST['name'];
		$code = $_POST['code'];
		$super = $_POST['super'];
		$edit = mysqli_query($conn,"UPDATE sections SET Name='$name',Supervisor='$super' WHERE Code='$code'");
		if($edit){
			echo "<script>alert('Update Succesfull');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
		}
	}
	
	
?>
<head>
	<title>Supervisor</title>
	<style>
		.bio {
			  display: grid;
			  grid-template-columns: 40% 55%;
			  grid-gap: 5px;
			  //background-image:linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url(../images/k_logo.jpg);
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
			<div class="ghed" style="background-color:#999900; font-size:15px;">Add Section</div>
			<form method="post">
				<input type="hidden" value="<?php echo $cod; ?>" name="code">
				<label>Section Name</label>
				<input type="text" value="<?php echo $sect; ?>" name="name" required autocomplete="off">
				<label>Supervisor</label>
				<select name="super" >
					<option value="">SELECT</option>
				<?php 
					$Qry = mysqli_query($conn,"SELECT * FROM employees WHERE Level='Supervisor'");
					while($row = mysqli_fetch_assoc($Qry)){
						$fd = $row['Email'];
						?>
						<option <?php if ($supe==$fd){ ?> selected="selected"<?php } ?> value="<?php echo $row['Email']; ?>"><?php echo $row['Name']; ?></option>
						<?php
					}
				?>
				</select>
				<label>&nbsp;</label><?php if(empty($cod)){ ?><input type="submit" name="save" value="Save" style=" background-color:#339900; color:#ffff; width:80px;">
			<?php }else{?><input type="submit" name="update" value="Update" style=" background-color:#339900; color:#ffff;width:80px;"><?php } ?>
			</form>
		</div>
		<div>
			<div class="ghed" style="background-color:#999900; font-size:15px;">&nbsp;<br></div>
			<table>
				<tr>
					<th>Section</th>
					<th>Supervisor</th>
					<th></th>
				<tr>
				<?php 
					$Qx = mysqli_query($conn,"SELECT Code,Name,Supervisor,(SELECT Name FROM employees WHERE employees.Email=sections.Supervisor)Supervisor FROM sections");
					while($rows = mysqli_fetch_assoc($Qx)){
						?>
						<form method="post">
							<?php if($cod==$rows['Code']){?>
							<tr bgcolor="#FF6600"><?php } ?>
								<td><?php echo $rows['Name']; ?></td>
								<td><?php echo $rows['Supervisor']; ?> </td>
								<td><input type="radio" name="edit" value="<?php echo $rows['Code'] ?>" onclick="submit()">Edit</td>
							</tr>
						</form>
						<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
<?php
	include 'footer.php';
?>