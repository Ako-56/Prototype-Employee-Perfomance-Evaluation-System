<?php 

include 'config/config.php';

session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
		//header("Location: logout.php");

}

if (isset($_POST['submit'])){
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$x = urlencode(base64_encode($email));
	$sql= "SELECT * FROM employees WHERE Email='$email' and Password='$password'";
		$result= mysqli_query($conn,$sql);
		if($result->num_rows > 0)
		{	
			$row = mysqli_fetch_assoc($result);
			if ($password==$row['Password'] ) 
			{
				if($row['Level']=='Worker'){
					if($password != '1234'){
						header("Location: home.php?xx=$x");
					}else{
						header("Location: change.php?xx=$x");
					}					
				}elseif($row['Level']=='Supervisor'){
					if($password != '1234'){
						header("Location: homes.php?xx=$x");
					}else{
						header("Location: change.php?xx=$x");
					}						
				}elseif($row['Level']=='Admin'){
					header("Location: admin/admin.php");
				}else{
					echo "<script>alert('Woops! Unknown User.')</script>";
				}
			} 
			else 
			{
				echo "<script>alert('Woops! Password is Wrong.')</script>";
			}
		}
		else{
			echo "<script>alert('Email ID you entered is not registered.');</script>";
		}
}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="submit" name="submit" class="btn" value="Login">
			</div>
			<p class="login-register-text">Don't have an account? <a href="index.php">See Admin.Home</a></p>
		</form>
	</div>
</body>
</html>
<?php include 'footer.php'; ?>