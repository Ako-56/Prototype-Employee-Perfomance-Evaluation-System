<?php include 'header.php'; ?>
<?php
	if(isset($_POST['submit'])){
		$names = $_POST['names'];
		$depts = $_POST['dept'];
		$sect = $_POST['sect'];
		$rating = $_POST['rating'];
		$remarks = $_POST['remarks'];
		
		$Qry = mysqli_query($conn,"INSERT INTO evaluate(Name,Section,Department,Remarks,Rating,Date) VALUES ('$names','$sect','$depts','$remarks','$rating',NOW())");
		if($Qry){
			echo "<script>alert('Thanks for the Review');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
		}
	}
	
	if(isset($_POST['s2'])){
		$sect = $_POST['sect'];
		$emp = $_POST['emp'];
		$rating = $_POST['rating'];
		$remark = $_POST['remark'];
		
		$Qva = mysqli_query($conn,"INSERT INTO empvaluate(Employee,Section,Rating,Remarks,Date) VALUES ('$emp','$sect','$rating','$remark',NOW())");
		if($Qva){
			echo "<script>alert('Thank for your Feedback');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
		}
	}
	
	if(isset($_POST['view'])){
		$id = $_POST['view'];
		function fetch_data($conn){
			$id = $_POST['view'];
			$quer = mysqli_query($conn,"SELECT * FROM snews WHERE Id='$id'");
			$zote = mysqli_fetch_assoc($quer);
				$output ="
					<table width='100%'>
						<tr>
							<th align='right'>Dated:&nbsp;".$zote['Date']."</th>
						</tr>
						<tr>
							<th>Memo/Announcement</th>
						</tr>
						<tr>
							<th><h3>".$zote['Title']."</h3></th>
						</tr>
						<tr>
							<td>".$zote['Subject']."</td>
						</tr>
						<tr>
							<td><h3>CC</h3>".$zote['Cc']."</td>
						</tr>
					</table>
				";
				return $output;
			}
			include('pdf.php');
			$file_name= $id .'.pdf';
			$html_table = fetch_data($conn);
			$pdf = new pdf();
			$pdf->load_html($html_table);
			$pdf->render();
			$file=$pdf->output();
			file_put_contents($file_name,$file);
			$c = mysqli_query($conn,"SELECT Id FROM snews WHERE Id='$id'");
			if(mysqli_num_rows($c)>0){
				//header("location: view.php?x=$id");
				echo "<script>window.open('http://localhost/axxx/admin/view.php?x=$id');</script>";
			}
			
	}
?>
<head>
	<title>home</title>
	<style>
		.bio {
			  display: grid;
			  grid-template-columns: 55% 40%;
			  grid-gap: 5px;
			  //background-image:linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url(../images/k_logo.jpg);
			  padding: 1px;
			  justify-content:center;
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
			  border-collapse:collapse;
			  width: 100%;
			}

			td {
			  text-align: left;
			  padding: 8px;
			}
			tr:nth-child(even) {
			  background-color: #f2f2f2;
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
			
			<div style="display:flex;justify-content:center;">
				<h4 >Fill the form below to Evaluate our Staff Perfomance<h4>
				</div>
				<div style="display:flex;justify-content:center;">
					<span style="color:red;font-family:italic;">*0 is the lowest-10 is the highest in rating</span>
				</div>
				<div style="display:flex;justify-content:center;">
					<form method="post">
						<label>Full Names</label>
						<input type="text" name="names" required autocomplete="off">
						<label>Department</label>
						<select name="dept">
							<option value="">SELECT</option>
							<?php 
							$dts = array('Hospitality','Computer','Mechanical','Electrical','Other');
							foreach($dts AS $Depts){
								?>
								<option><?php echo $Depts; ?></option>
								<?php
							}
							?>
						<select>
						<label>Section to Evaluate</label>
						<select name="sect">
						<option value="">SELECT SECTION</option>
						<?php
							$sect = mysqli_query($conn,'SELECT * FROM sections');
							while($sections = mysqli_fetch_assoc($sect)){?>
							
								<option value='<?php echo $sections['Code']; ?>'><?php echo $sections['Name']; ?></option>
						<?php	}
						?>
					</select>
					<label>Rating</label>
					<input type="number" max="10" name="rating" required autocomplete="off">
					<label>Remarks</label>
					<textarea name="remarks"></textarea>
					<label>&nbsp;</label><input type="submit" name="submit" value="Submit">
					</form>
					
			</div>
			<div style="display:flex;justify-content:center;">
					<span style="color:red;font-family:italic;">Individual Employee Evaluation</span>
				</div>
				<div style="display:flex;justify-content:center;">
					<span style="color:red;font-family:italic; font-size:14px;">Check employee No.<a href="staff.php">here</a></span>
				</div>
				<div style="display:flex;justify-content:center;">
					<form method="post">
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
						<label>Employee No.</label>
						<input type="text" name="emp" required autocomplete="off">
						<label>Rating</label>
						<input type="number" max="10" name="rating" required autocomplete="off">
						<label>Remarks</label>
						<textarea name="remark"></textarea>
						<label>&nbsp;</label><input type="submit" value="Submit" name="s2">
					</form>
				</div>
				<div style="display:flex;justify-content:center;">
					<span style="color:red;font-family:italic;"><u>!Disclaimer</u><br>
					Your Review is not shared to any third parties and is only used to help us in 
					improving service delivery in the organisation.Feel free to give your Honest Assesment.</span>
				</div>
		</div>
		<div>
			<div class="ghed" style="background-color:#999900; font-size:20px; color:white; display:flex;justify-content:center;">Events & Activities</div>
			<table>
				<tr></tr>
				<?php 
				$n=2; $b=$n%2;
					$qry= mysqli_query($conn,"SELECT * FROM snews");
					while($rows=mysqli_fetch_assoc($qry)){
						?>
						<form method="post" >
							<tr  <?php if($b!=0){?>bgcolor="#fff"<?php } else {?>  bgcolor="#CCCC99"<?php } ?> >
								<td></td>
								<td><?php echo "<b>".$rows['Title']."</b>"; ?></td>
								<td><?php echo $rows['Date']; ?></td>
								<td><input type="radio" name="view" value="<?php echo $rows['Id']; ?>" onclick="submit()">View</td>
							</tr>
						</form>
						
						<?php
					}
				?>
			</table>
		</div>
	</div>	
<div style="margin-bottom:50px;">&nbsp;</div>	
</body>
<?php include 'footer.php'; ?>