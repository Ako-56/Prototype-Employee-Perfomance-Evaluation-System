<?php
	session_start();

	include 'config/config.php'; ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
		body {margin:0;font-family:Arial}

		.topnav {
		  overflow: hidden;
		  background-color: #333;
		}

		.topnav a {
		  float: left;
		  display: block;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.active {
		  background-color: #04AA6D;
		  color: white;
		}

		.topnav .icon {
		  display: none;
		}

		.dropdown {
		  float: left;
		  overflow: hidden;
		}

		.dropdown .dropbtn {
		  font-size: 17px;    
		  border: none;
		  outline: none;
		  color: white;
		  padding: 14px 16px;
		  background-color: inherit;
		  font-family: inherit;
		  margin: 0;
		}

		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
		  float: none;
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}

		.topnav a:hover, .dropdown:hover .dropbtn {
		  background-color: #555;
		  color: white;
		}

		.dropdown-content a:hover {
		  background-color: #ddd;
		  color: black;
		}

		.dropdown:hover .dropdown-content {
		  display: block;
		}

		@media screen and (max-width: 600px) {
		  .topnav a:not(:first-child), .dropdown .dropbtn {
			display: none;
		  }
		  .topnav a.icon {
			float: right;
			display: block;
		  }
		}

		@media screen and (max-width: 600px) {
		  .topnav.responsive {position: relative;}
		  .topnav.responsive .icon {
			position: absolute;
			right: 0;
			top: 0;
		  }
		  .topnav.responsive a {
			float: none;
			display: block;
			text-align: left;
		  }
		  .topnav.responsive .dropdown {float: none;}
		  .topnav.responsive .dropdown-content {position: relative;}
		  .topnav.responsive .dropdown .dropbtn {
			display: block;
			width: 100%;
			text-align: left;
		  }
		}
	.sidebar {
		  height: 100%;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 50;
		  left: 0;
		  background-color: #111;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidebar a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 20px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		  align-items:right;
		}

		.sidebar a:hover {
		  color: #f1f1f1;
		}

		.sidebar .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		.openbtn {
		  font-size: 20px;
		  cursor: pointer;
		  background-color: white;
		  color: black;
		  padding: 5px 15px;
		  border: none;
		  margin-left:100;
		  top:0;
		}

		.openbtn:hover {
		  background-color: #fff;
		}

		#x {
		  transition: margin-left .5s;
		  padding: 16px;
		  color:black;
		}

		/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
		@media screen and (max-height: 450px) {
		  .sidebar {padding-top: 15px;}
		  .sidebar a {font-size: 18px;}
		}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="homes?xx=" class="active">Home</a>
  <div id="mySidebar" class="sidebar">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	  <a href="employees">Add Staff</a>
	  <a href="leaveap">Process Leave</a>
	  <a href="news">Memos & News</a>
	  <a href="perfomance">Perfomance Evaluation</a>
	  <a href="letter">Warning Letter</a>
	  <a href="index">LogOut</a>
	</div>
	<a id="x" class="openbtn" onclick="openNav()">☰ Menu</a>  
	<script>
		function openNav() {
		  document.getElementById("mySidebar").style.width = "250px";
		  document.getElementById("main").style.marginLeft = "250px";
		  document.getElementById("x").style.display= "none";
		}

		function closeNav() {
		  document.getElementById("mySidebar").style.width = "0";
		  document.getElementById("main").style.marginLeft= "0";
		  document.getElementById("x").style.display= "block";
		}
	</script>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
