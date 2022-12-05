<?php require 'eheader.php'; ?>
<?php 
	if(isset($_POST['news'])){
		$title = $_POST['title'];
		$date = $_POST['tarehe'];
		$subject = $_POST['subject'];
		$cc = $_POST['cc'];
		
		$Query = mysqli_query($conn,"INSERT INTO snews(Title,Date,Subject,Cc) VALUES ('$title','$date','$subject','$cc')");
		if($Query){
			echo "<script>alert('Success')</script>";
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
	<title>News</title>
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
<body>
	<div class="bio">
		<div>
			<div style="display:flex;justify-content:center;">
				<span style="font-family:italic;"><u><h3>Add the Memos & News Below</h3></u></span>
			</div>
			<form method="post">
				<label>Title</label>
				<input type="text" name="title" required autocomplete="off">
				<label>Date</label>
				<input type="date" name="tarehe" required>
				<label>Subject</label>
				<textarea name="subject"></textarea>
				<label>CC</label>
				<textarea name="cc"></textarea>
				<label></label><input type="submit" name="news" value="Save">
			</form>
		</div>
		<div>
			<table>
				<tr>
					<th align="left">No.</th>
					<th align="left">Title</th>
					<th align="left">Date</th>
					<th></th>
				</tr>
				<?php 
					$qry= mysqli_query($conn,"SELECT * FROM snews");
					while($rows=mysqli_fetch_assoc($qry)){
						?>
						<form method="post">
							<tr>
								<td><?php echo $rows['Id']; ?></td>
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
</body>
<?php include 'footer.php'; ?>