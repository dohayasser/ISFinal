
<form action="edit.php" method="GET">
	Grade: <input type="text" name="g"> <br/>
<input type="submit" id="login_btn" value=Add><br>
</form>
<?php
include_once 'dbh/dbh.inc.php';
session_start();
	if ($_SESSION['username'] == " " && $_SESSION['name'] == " "){
		echo "You are not logged, you need to login to access grades";
	   echo "<script> location.href='http://localhost:8080/Website/index.php'; </script>";

	}
	if (isset($_GET['course']) && isset($_GET['grade_title']) && isset($_GET['id'])){
			$course = $_GET['course'];
            $grade_title =  $_GET['grade_title'];
            $student = $_GET['id'];
	       echo $student. " ". $grade_title. " ". $course;

  if  (isset($_GET['g'])){
  	$new_grade = $_GET['g'];
    $sql1 = "UPDATE grades SET grade= '$new_grade' WHERE
	student = '$student' AND grade_title = '$grade_title' AND course_title = '$course';";
    mysqli_query($conn, $sql1);
}

}
?>
<?php
?>
<!-- 	// if (isset ($_GET['edit'])) {
	// 	$id = $_GET['edit'];
	// 	$res = mysql_query("SELECT * FROM grades ");
	// 	$row = mysql_fetch_array(res);
	// }
	// if (isset($_POST['grade_title']) && isset($_POST['grade']))
	// {
	// 	$newtitle = $_POST['t'];
	// 	$newgrade = $_POST['g'];
	// 	$username = $_POST['student'];
	// 	if (empty($newtitle) && empty($newgrade)) {
	// 		echo "ERROR!!!!";
	// 	} else{

	// 	}
		
	// 	 // or die("ERRORRRR!");
	// } -->



