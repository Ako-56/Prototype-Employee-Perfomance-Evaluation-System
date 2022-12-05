<?php include 'header.php'; ?>
<?php 
	if(isset($_POST['s2'])){
		$id = $_POST['id'];
		
		$qry = mysqli_query($conn,"UPDATE complains SET Status='Closed' WHERE Id='$id'");
		if($qry){
			echo "<script>alert('Closed');</script>";
		}else{
			echo "failed" .mysqli_error($conn);
		}
	}
?>
<head>
	<title>complain</title>
	<style>
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
			.lab{	
				transform:rotate(-45deg);
			}
	</style>
</head>
		<script>     
			if ( window.history.replaceState ) {
			  window.history.replaceState( null, null, window.location.href );
			} 
		</script>
		<script>
		function printData()
			{
			   var divToPrint=document.getElementById("printTable");
			   newWin= window.open("");
			   newWin.document.write(divToPrint.outerHTML);
			   newWin.print();
			   newWin.close();
			}
			</script>
<body>
	<?php
					$letrs = mysqli_query($conn,"SELECT Id,RDate,Date,Culprit,Status,(SELECT Name FROM employees WHERE employees.EmpNo=complains.Employee)Employee,
					(SELECT Name FROM sections WHERE sections.Code=complains.Section)Section,Explanation FROM complains ORDER BY RDate DESC");
					while($row=mysqli_fetch_assoc($letrs)){
						?>
						<form method="post">
							<div class="leta" style="margin:10px auto;" >
								<table width="100%" id="printTable">
									<tr>
										<th align="right">Date Reported:&nbsp;<?php echo $row['RDate']; ?><br></th>
									</tr>
									<tr>
										<th align="left">Date Assulted/Harrased:&nbsp;<?php echo $row['Date']; ?></th>
									</tr>
									<tr>
										<th align="left">Culprit:&nbsp;<?php echo $row['Culprit']; ?></th>
									</tr>
									<tr>
										<th align="left">Employee:&nbsp;<?php echo $row['Employee']; ?></th>
									</tr>
									<tr>
										<th align="left">Section of Culprit:&nbsp;&nbsp;<?php echo $row['Section'];?></th>
									</tr>
									<tr>
										<td><u>Details</u><br><?php echo $row['Explanation']; ?></td>
									</tr>
								</table>
								<input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
								<input type="submit" name="s2" <?php if($row['Status'] =='Closed'){?>style="display:none"<?php } ?> value="Close" style="float:right; width:100px;">
								<div class="lab" <?php if($row['Status'] =='Pending'){?>style="display:none"<?php } ?>>
									<hr>
									<div style="display:flex;justify-content:center; font-size:40px;font-weight:bold;">
										CLOSED
									</div>
									<hr>
								</div>
								<!--<button onclick="printData()" class="noprint">Print</button>-->
							</div>
						</form>
						<?php
					}
				?>
</body>
<?php include '../footer.php'; ?>