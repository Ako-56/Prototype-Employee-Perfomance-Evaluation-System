<?php include 'header.php'; ?>
<?php
	if(isset($_POST['change'])){
		$emp = base64_decode(urldecode($_GET['xx']));
		$opass = $_POST['opass'];
		$npass = $_POST['npass'];
		$cpass = $_POST['cpass'];
		
		if($opass==$npass){
			echo "<script>alert('new password cannot be same as old');</script>";
		}else{
			if($npass==$cpass){
				$qry = mysqli_query($conn,"UPDATE employees SET Password='$npass' WHERE Email='$emp'");
				if($qry){
					echo "<script>alert('password change Succesfull');
					window.location.href='elogin.php';</script>";
				}else{
					echo "failed" .mysqli_error($conn);
				}
			}else{
				echo "<script>alert('password don\'t match');</script>";
			}
		}
	}
?>
<head>
	<style>
		form {
			  width: 60%;
			  
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
	</style>
</head>
<body>
	<div style="display:flex;justify-content:center;">
		<span style="color:red;font-family:italic;"><u><h3>To Login to your Account you need to change your password to a secure one.</h3></u></span>
	</div>
	<div style="display:flex;justify-content:center;">
		<form method="post">
			<label>Old Password:</label>
			<input type="password" name="opass" required >
			<label>New Password</label>
			<input type="password" name="npass" required>
			<label>Confirm Password</label>
			<input type="password" name="cpass" required>
			<label>&nbsp;</label><input type="submit" name="change" value="Change">
		</form>
	</div>
</body>
<?php include 'footer.php'; ?>