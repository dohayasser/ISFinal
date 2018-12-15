<?php
	include_once 'dbh/dbh.inc.php';
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<link rel= "stylesheet" href="css/style2.css">
<link rel= "stylesheet" href="css/button.css">

<body>
	<h2 id="Header"> 
			<?php
	echo "Hello,". " ". $_SESSION['name'];
		if ($_SESSION['title'] == 'student') {
	} else {
		echo "<script> location.href='http://localhost:8080/Website/accessdenied.php'; </script>";
	}
?>
	</h2> <a  href="http://localhost:8080/Website/index.php">
    <button id = "mybut">Log out</button>
</a> &nbsp; &nbsp; &nbsp;
	<div class="dropdown">
  <button class="dropbtn">View</button>
  <div class="dropdown-content">
    <a href="http://localhost:8080/Website/grades.php">My Grades</a>
  </div>
</div>


</body>
</html>