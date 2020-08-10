<?php
require('common.php');
if (isset($_POST['roll_no'])) {
	$roll_no = $_POST['roll_no'];
    $roll_no = mysqli_real_escape_string($con, $roll_no);
}
$new_password = $_POST['new_password'];
$retype_new_password = $_POST['retype_new_password'];
if (strlen($new_password) >=6) {
if ($new_password == $retype_new_password) {
	$new_password = mysqli_real_escape_string($con, $new_password);
	$new_password = MD5($new_password);
$status = $_POST['status'];
$status = mysqli_real_escape_string($con, $status);
$class = $_POST['class'];
$class = mysqli_real_escape_string($con, $class);
if (isset($roll_no)) {
$query = "SELECT * FROM users WHERE roll_no = '$roll_no' AND class = '$class'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0) {
	$error = "<span class= 'red'> Seems like You are New to this Site!<br>If not, Enter Correct Details which you have given Earlier </span>";
	header('location: forgot.php?error='.$error);
} else {
	$row = mysqli_fetch_array($result);
	$_SESSION['roll_no'] = $row['roll_no'];
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
    $_SESSION['status'] = $row['status'];
    $_SESSION['class'] = $row['class'];
    $queryss = "UPDATE users SET password = '$new_password' WHERE roll_no = '$roll_no'";
	$resultss = mysqli_query($con, $queryss) or die(mysqli_error($con));
	header('location: post.php');
}
} else {
	$query = "SELECT * FROM users WHERE status = '$status' AND class = '$class'";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	$num = mysqli_num_rows($result);
if ($num == 0) {
	$error = "<span class= 'red'> Seems like You are New to this Site!<br>If not, Enter Correct Details which you have given Earlier </span>";
	header('location: forgot.php?error='.$error);
} else {
	$row = mysqli_fetch_array($result);
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
    $_SESSION['status'] = $row['status'];
    $_SESSION['class'] = $row['class'];
    $queryss = "UPDATE users SET password = '$new_password' WHERE status = '$status'";
	$resultss = mysqli_query($con, $queryss) or die(mysqli_error($con));
	header('location: post.php');
}
}
} else {
	$error = "<span class= 'red'> Confirmation Password doesn't match with the New Password </span>";
	header('location: forgot.php?error='.$error);
}
} else {
	$error = "<span class= 'red'> Password must be atleast six characters long for safety </span>";
	header('location: forgot.php?error='.$error);
}
?>