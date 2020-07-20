<?php

require('common.php');

$name = $_POST['name'];
$name = mysqli_real_escape_string($con, $name);

$roll_no = $_POST['roll_no'];
$roll_no = mysqli_real_escape_string($con, $roll_no);

$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);

$query = "SELECT * FROM users WHERE roll_no ='" .$roll_no. "' AND password = '" .$password. "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$num = mysqli_num_rows($result);

if ($num == 0) {
	$error = "<span class= 'red'> Your Roll Number or Password is Incorrect! </span>";
	header('location: login.php?error='.$error);
} else {

	$row = mysqli_fetch_array($result);
	$_SESSION['roll_no'] = $row['roll_no'];
	$_SESSION['user_id'] = $row['id'];

	header('location: index.php');
}



?>