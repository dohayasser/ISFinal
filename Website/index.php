
<?php
include_once 'dbh/dbh.inc.php';
session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
<title> </title>
</head>
<link rel= "stylesheet" href="css/style.css">
 <body style="background-color:#7ed6df">
<?php 
$_SESSION['username'] =" ";
$_SESSION['name'] =" ";
echo $_SESSION['name'];
?>
<div id="main-wrapper">
	<center><h2>Login </h2>
		<img src="imgs/avatar.JPG" class="avatar"/> 
	</center>

<form class="myform" action="index.php" method="post">
	<label><b>Username:</b></label><br>
	<input type="text" class="inputvalues" name="username" placeholder="Type your username"/><br>
	<label><b>Password:</b></label><br>
	<input type="password" class="inputvalues" name="password" placeholder="Type your password"/><br>
	<input type="submit" id="login_btn" value=login><br>
</form>


<?php

	if (isset($_POST['username']) & isset($_POST['password']) && $_POST['username'] != "" && $_POST['password']){
	$username = mysqli_real_escape_string($conn , $_POST['username']);
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$sql = "select * from users 
	where username = '$username';";
	$results = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($results);
	$_SESSION['title'] = $user['title'];
	$storedhash = $user['password'];
	$student = "student";
	if (password_verify($password,$storedhash) != 1){
		echo "Username or password is incorrect";
	}
	else {
		echo "Hello";
		if ($_SESSION['title'] == 'student'){
			$_SESSION['name'] = $user ['first_name']. " ". $user['last_name'];
		    $_SESSION['username'] = $username;
        echo "<script> location.href='http://localhost:8080/Website/student.php'; </script>";
		} 
		else if ($_SESSION['title'] == 'ta') {
		    $_SESSION['name'] = $user ['first_name']. " ". $user['last_name'];
		    $_SESSION['username'] = $username;
		echo "<script> location.href='http://localhost:8080/Website/ta.php'; </script>";

		}
		else {
			$_SESSION['name'] = $user ['first_name']. " ". $user['last_name'];
		    $_SESSION['username'] = $username;
		echo "<script> location.href='http://localhost:8080/Website/lecturer.php'; </script>";
		}

	}
}
else {

	echo "Please type username and password.";

}
?>
<style>
div {
  margin-bottom: 15px;
  padding: 4px 12px;
}
.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
}

</style>
</div>
</body>
</html>