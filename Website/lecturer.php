<?php
	include_once 'dbh/dbh.inc.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>
<link rel= "stylesheet" href="css/style1.css">
<link rel= "stylesheet" href="css/style2.css">
<link rel= "stylesheet" href="css/button.css">
<body>
	<?php
	if ($_SESSION['username'] == " " && $_SESSION['name'] == " "){
		echo "You are not logged, you need to login to access grades";
	   echo "<script> location.href='http://localhost:8080/Website/index.php'; </script>";

	} 
	if ($_SESSION['title'] == 'lecturer') {
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
</a>  &nbsp; &nbsp; &nbsp;

<center>
<h2>Check Course Grades</h2>
		<form action="" method="GET">
		
		<select name="course1" id="drop">
			<?php 
			$lecturer = $_SESSION['username'];
			$sql_course = "select * from courses
			where lecturer = '$lecturer';";
	        $result = mysqli_query($conn, $sql_course);
	        while ($row1 = mysqli_fetch_assoc($result)) {
	        	?>
	        	<option value="<?php echo $row1['title'];?>"> <?php echo $row1['title'];?> </option>
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
	$sql = "select grade_title, grade, first_name, last_name, username, course_title from grades g inner join students_take_courses s ON g.student = s.student and g.course_title = s.course INNER join users u on g.student = u.username
	where course_title ='$course';";
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
            echo "<th> Student</th>";
		while ($row = mysqli_fetch_assoc($grades)) {
        echo "<tr><td width=80%>" . $row['grade_title'] . "</td><td width=50%>" . $row['grade'] . "</td><td width=50%>" . $row['first_name']. " ". $row['last_name'].  "</td></tr>";
		}
	}
}


			echo "</table>";


	?>
<div>
	<label id="label"> Add grades</label>
	<form action="" method="GET">
			<select name="course2" id="drop">
			<?php 
			$lecturer = $_SESSION['username'];
			$sql_course = "select * from courses
			where lecturer = '$lecturer';";
	        $result = mysqli_query($conn, $sql_course);
	        while ($row1 = mysqli_fetch_assoc($result)) {
	        	?>
	        	<option value="<?php echo $row1['title'];?>"> <?php echo $row1['title'];?> </option>
	        	<?php
	        }
	        ?>
		</select>
	<select name="stud" id="drop">
			<?php 
			$lecturer = $_SESSION['username'];
			$sql_course = "select * from courses inner join students_take_courses
			on title = course inner join users
            on student = username
			where lecturer = '$lecturer' and course ='$course';";
	        $result = mysqli_query($conn, $sql_course);
	        while ($row2 = mysqli_fetch_assoc($result)) {
	        	?>
	        	<option value="<?php echo $row2['student'];?>"> <?php echo $row2['first_name'] ." ".$row2['last_name'];?> </option>
	        	<?php
	        }
            if (isset($_GET['stud']) && isset($_GET['grade_title']) && isset($_GET['grade']) && isset($_GET['course2'])){
            $student = $_GET['stud'];
            $course = $_GET['course2'];
            $grade_title = $_GET['grade_title'];
            $grade = $_GET['grade'];
            if (!empty($grade_title) && !empty($grade)){
            $insert_sql = "INSERT into grades values ('$course', '$student', '$grade_title', '$grade');";
            mysqli_query($conn, $insert_sql);
            echo $student." ". $grade_title. " ". $course;
            }
            else {
            	echo "Please insert grade values.";
            }
            }

	        ?>
		</select>
		<br>
	<label id="labely"><b> Grade definition</b></label><br>
	<input type="text" class="inputvalues" name="grade_title" placeholder="grade title"/><br>
	<label id="labely"><b> Grade</b></label><br>
	<input type="text" class="inputvalues" name="grade" placeholder="grade"/><br>
	<input type="submit" id="login_btn" value=Add><br>
</form>
<?php

?>
<?php
?>
</div>
</div>
</div>
</body>

</html>