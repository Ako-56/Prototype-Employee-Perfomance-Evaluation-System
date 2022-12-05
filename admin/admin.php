<?php include 'header.php'; ?>
<?php 
	$message = '';
	if(isset($_POST['see'])){
		$pass= $_POST['pass'];
		$emp = $_POST['emp'];
		
		$chek = mysqli_query($conn,"SELECT Password FROM employees WHERE Password='$pass' AND Level='Admin'");
		if(mysqli_num_rows($chek)>0){
			$ret = mysqli_query($conn,"SELECT Password FROM employees WHERE EmpNo='$emp'");
			$row = mysqli_fetch_assoc($ret);
			$password = $row['Password'];
			$message = $password;
			//echo $message;
		}
	}
?>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Reenie+Beanie|Lato:700">
	<style>
		.bio {
			  display: grid;
			  grid-template-columns: 70% 25%;
			  justify-content:center;
			  grid-gap: 5px;
			  padding: 1px;
			}

			.bio > div {
			  padding: 2px 0;
			  font-size: 20px;
			}
			.x {
				margin: 0 auto;
			  font-family: 'Lato';
			  background:#666;
			  color:#fff;
			}

			*{
			  margin:0;
			  padding:0;
			}

			h2 {
			  font-weight: bold;
			  font-size: 2rem;
			}
			p {
			  font-family: 'Reenie Beanie';
			  font-size: 2rem;
			}
			ul,li{
			  list-style:none;
			}
			ul{
			  display: flex;
			  flex-wrap: wrap;
			  justify-content: center;
			}
			ul li a{
			  text-decoration:none;
			  color:#000;
			  background:#ffc;
			  display:block;
			  height:10em;
			  width:10em;
			  padding:1em;
			  box-shadow: 5px 5px 7px rgba(33,33,33,.7);
			  transform: rotate(-6deg);
			  transition: transform .15s linear;
			}

			ul li:nth-child(even) a{
			  transform:rotate(4deg);
			  position:relative;
			  top:5px;
			  background:#cfc;
			}
			ul li:nth-child(3n) a{
			  transform:rotate(-3deg);
			  position:relative;
			  top:-5px;
			  background:#ccf;
			}
			ul li:nth-child(5n) a{
			  transform:rotate(5deg);
			  position:relative;
			  top:-10px;
			}

			ul li a:hover,ul li a:focus{
			  box-shadow:10px 10px 7px rgba(0,0,0,.7);
			  transform: scale(1.25);
			  position:relative;
			  z-index:5;
			}

			ul li{
			  margin:1em;
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
	</style>
</head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>     
			if ( window.history.replaceState ) {
			  window.history.replaceState( null, null, window.location.href );
			} 
		</script>
	<script>
		$(document).ready(function () {
		  all_notes = $("li a");
		 
		  all_notes.on("keyup", function () {
			note_title = $(this).find("h2").text();
			note_content = $(this).find("p").text();
		 
			item_key = "list_" + $(this).parent().index();
		 
			data = {
			  title: note_title,
			  content: note_content
			};
		 
			window.localStorage.setItem(item_key, JSON.stringify(data));
		  });
		 
		  all_notes.each(function (index) {
			data = JSON.parse(window.localStorage.getItem("list_" + index));
		 
			if (data !== null) {
			  note_title = data.title;
			  note_content = data.content;
		 
			  $(this).find("h2").text(note_title);
			  $(this).find("p").text(note_content);
			}
		  });
		});
	</script>												
<body>
	<div class="bio">
		<div>
		<div class="ghed" style="background-color:#999900; font-size:15px;">Schedule Reminder</div>
			<div class="x">
				<ul>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #1</h2>
					  <p>Text Content #1</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #2</h2>
					  <p>Text Content #2</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #3</h2>
					  <p>Text Content #3</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #4</h2>
					  <p>Text Content #4</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #5</h2>
					  <p>Text Content #5</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #6</h2>
					  <p>Text Content #6</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #7</h2>
					  <p>Text Content #7</p>
					</a>
				  </li>
				  <li>
					<a href="#" contenteditable>
					  <h2>Title #8</h2>
					  <p>Text Content #8</p>
					</a>
				  </li>
				</ul>
			</div>
			<div style="margin-bottom:150px;">&nbsp; </div>
		</div>
		<div>
			<div class="ghed" style="background-color:#999900; font-size:15px;">Retrieve Password</div>
			<form method="post">
				<label>Employee No:</label>
				<input type="text" name="emp" required autocomplete="off">
				<label>Admin Pass:</label>
				<input type="password" name="pass" required>
				<label>&nbsp;</label><input type="submit" name="see" value="Retrieve">
			</form>
			<div <?php if($message==''){?>style="display:none"<?php } ?>>Recovered Password is -> &nbsp; <u><?php echo $message; ?></u></div>
		</div>
	</div>
</body>
<?php include '../footer.php'; ?>