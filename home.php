<?php include 'eheader.php'; ?>
<?php
	$empx = base64_decode(urldecode($_GET['xx']));
	$qrt = mysqli_query($conn,"SELECT EmpNo,Name FROM employees WHERE Email='$empx'");
	$result = mysqli_fetch_assoc($qrt);
	$mtu = $result['EmpNo'];
	$jina = $result['Name'];
	
	$_SESSION['mtu'] = $mtu;
	$_SESSION['jina'] = $jina;
	
	if(isset($_POST['s4'])){
		$date = $_POST['dt'];
		$culprit = $_POST['culprit'];
		$sect = $_POST['sect'];
		$expl = $_POST['expl'];
		
		$qri = mysqli_query($conn,"INSERT INTO complains(Date,Culprit,Section,Explanation,RDate) VALUES ('$date','$culprit','$sect','$expl',NOW())");
		if($qri){
			echo "<script>alert('We\'ll Look into your case soonest');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
		}
	}
?>
<head>
	<title>Employee</title>
	<style>
		.bio {
			  display: grid;
			  grid-template-columns: 60% 35%;
			  justify-content:center;
			  grid-gap: 5px;
			  padding: 1px;
			}

			.bio > div {
			  padding: 2px 0;
			  font-size: 20px;
			}
			.ghed{
			background-color:#00cc99;
			color:white; 
			text-align:center;
			padding:auto 10px;
			font-weight:bold;
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
			
			.leta{
				width:80%;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
				 font-family: 'Reenie Beanie';
			  font-size: 2rem;
			  background:#ffc;
			  display:block;
			  height:10em;
			  width:10em;
			  padding:1em;
			  box-shadow: 5px 5px 7px rgba(33,33,33,.7);
			}
	</style>
<head>
		<script>     
			if ( window.history.replaceState ) {
			  window.history.replaceState( null, null, window.location.href );
			} 
		</script>
<body>
	<div class="bio">
		<div >
			<div class="ghed" style="background-color:#999900; font-size:15px;">Warnings Letters</div>
				<?php
					$letrs = mysqli_query($conn,"SELECT * FROM warning WHERE EmpNo='$mtu' ORDER BY Date DESC");
					while($row=mysqli_fetch_assoc($letrs)){
						?>
						<div class="leta" style="margin:10px auto;">
							<table width="100%">
								<tr>
									<th align="right">Dated:&nbsp;<?php echo $row['Date']; ?></th>
								</tr>
								<tr>
									<th align="left"><u>Ref:&nbsp;&nbsp;<?php echo $row['Title'];?></u></th>
								</tr>
								<tr>
									<td><?php echo $row['Warning']; ?></td>
								</tr>
								<tr>
									<td align="left"><br></br>Yours<br><br>Supervisor</td>
								</tr>
							</table>
						</div>
						<?php
					}
				?>
		</div>
		<div>
			<div class="ghed" style="background-color:#999900; font-size:15px;">Report Harrasment</div>
			<form method="post">
				<label>Date of Harrasment</label>
				<input type="date" name="dt" required>
				<label>Name of Culprit</label>
				<input type="text" name="culprit" required autocomplete="off">
				<label>Section of Culprit</label>
					<select name="sect">
						<option value="">SELECT SECTION</option>
						<?php
							$sect = mysqli_query($conn,'SELECT * FROM sections');
							while($sections = mysqli_fetch_assoc($sect)){?>
							
								<option value='<?php echo $sections['Code']; ?>'><?php echo $sections['Name']; ?></option>
						<?php	}
						?>
					</select>
				<label>Briefly Explain:</label>
				<textarea name="expl"></textarea>
				<label>&nbsp;</label><input type="submit" name="s4" value="Save">
			</form>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>