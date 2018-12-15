<?php
	include_once 'dbh/dbh.inc.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel= "stylesheet" href="css/style.css">
<body style="background-color:#7ed6df" >
<title>
</title>
</head>
<link rel= "stylesheet" href="css/style2.css">
<link rel= "stylesheet" href="css/button.css">
<body>
	<?php 
	if ($_SESSION['username'] == " " && $_SESSION['name'] == " "){
		echo "You are not logged, you need to login to access grades";
	   echo "<script> location.href='http://localhost:8080/Website/index.php'; </script>";
	}
		if ($_SESSION['title'] == 'student') {
	} else {
		echo "<script> location.href='http://localhost:8080/Website/accessdenied.php'; </script>";
	}
	?>
<div id="main-wrapper">

		<h2 id= "Header"> 
			<?php
	echo "Hello,". " ". $_SESSION['name'];
?>
	</h2> 	<a  href="http://localhost:8080/Website/index.php">
    <button id = "mybut">Log out</button>
</a> &nbsp; &nbsp; &nbsp;
		<div class="dropdown">

  <button id="view" class="dropbtn">View</button>
  <div class="dropdown-content">
    <a href="#" onclick="func">My Courses</a>
    <a href="http://localhost:8080/Website/grades.php">My Grades</a>
  </div>
</div>
<center>
<h2>Check your grades</h2>
		<form action="" method="GET">
		
		<select name="course1" id="drop">
			<?php 
			$student = $_SESSION['username'];
			$sql_course = "select * from students_take_courses
			where student = '$student';";
	        $result = mysqli_query($conn, $sql_course);
	        while ($row1 = mysqli_fetch_assoc($result)) {
	        	?>
	        	<option value="<?php echo $row1['course'];?>"> <?php echo $row1['course'];?> </option>
	        	<?php
	        }
	        ?>
		</select>
	<button id="SeeGrades" > See Grades </button>
	    </form>
</center>
	<?php
	if (isset($_GET['course1'])){
	$username = $_SESSION['username'];
	$course = $_GET['course1'];
	$sql = "select grade_title, grade, first_name, last_name
     from grades inner join users ON student = username 
     where student = '$username' and course_title ='$course';";
	$grades = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($grades);
	?>
	<label id="label"> <?php echo $course; ?> </label>
	<?php 
            echo "<table>";
	if ($resultCheck > 0) {
		    echo "<table class='table table-striped'>  
            <th> Title </th>";
            echo "<th> Grade </th>";
		while ($row = mysqli_fetch_assoc($grades)) {
        echo "<tr><td width=80%>" . $row['grade_title'] . "</td><td width=50%>" . $row['grade'] . "</td></tr>";
		}
	}
}
			echo "</table>";
	?>
	
</div>
</body>
<style>
* {
  box-sizing: border-box;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>
</html>