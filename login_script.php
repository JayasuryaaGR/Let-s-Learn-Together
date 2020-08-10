<?php
require('common.php');
if (isset($_POST['roll_no'])) {
	$roll_no = $_POST['roll_no'];
    $roll_no = mysqli_real_escape_string($con, $roll_no);
}
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);
$status = $_POST['status'];
$status = mysqli_real_escape_string($con, $status);
if (isset($roll_no)) {
$query = "SELECT * FROM users WHERE roll_no ='" .$roll_no. "' AND password = '" .$password. "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0) {
	$error = "<span class= 'red'> Your Roll Number and Password doesn't Match! </span>";
	header('location: login.php?error='.$error);
} else {
	$row = mysqli_fetch_array($result);
	$_SESSION['roll_no'] = $row['roll_no'];
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
    $_SESSION['status'] = $row['status'];
    $_SESSION['class'] = $row['class'];
	header('location: post.php');
}
} else {
	$query = "SELECT * FROM users WHERE password ='" .$password. "'";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	$num = mysqli_num_rows($result);
if ($num == 0) {
	$error = "<span class= 'red'> Your Password doesn't Exists! </span>";
	header('location: login.php?error='.$error);
} else {
	$row = mysqli_fetch_array($result);
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
    $_SESSION['status'] = $row['status'];
    $_SESSION['class'] = $row['class'];
	header('location: post.php');
}
}
?>