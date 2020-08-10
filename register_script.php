<?php
require("common.php");
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];
if ($password == $retype_password) {
if (strlen($password)>=6) {
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);
  $status = $_POST['status'];
  if (isset($_POST['roll_no'])) {
  $status = mysqli_real_escape_string($con, $status);
  $roll_no = $_POST['roll_no'];
  $roll_no = mysqli_real_escape_string($con, $roll_no);
  $class = $_POST['class'];
  $class = mysqli_real_escape_string($con, $class);
  $query = "SELECT * FROM users WHERE roll_no='$roll_no'";
  $result = mysqli_query($con, $query);
  $num = mysqli_num_rows($result);
  if ($num != 0) {
    $m = "<span class='red'> Roll Number Already Exists </span>";
    header('location: register.php?m2=' . $m);
  } else {
    $query = "INSERT INTO users(name, class, status, roll_no, password)VALUES('" . $name . "','" . $class . "','" . $status . "','" . $roll_no . "','" . $password . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['roll_no'] = $roll_no;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = $name;
    $_SESSION['status'] = $status;
    $_SESSION['class'] = $class;
    header('location: index.php');
  }
  } else {
  $status = mysqli_real_escape_string($con, $status);
  $class = $_POST['class'];
  $class = mysqli_real_escape_string($con, $class);
  $query = "INSERT INTO users(name, class, status, password) VALUES('" . $name . "','" . $class . "','" . $status . "','" . $password . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = $name;
    $_SESSION['status'] = $status;
    $_SESSION['class'] = $class;
    header('location: index.php');
  }
} else {
    $m = "<span class='red'> <br> Password must be atleast six characters long for security purposes </span>";
    header('location: register.php?m2=' . $m);
}
} else {
  $m = "<span class='red'> <br> Confirmation Password doesn't match with the New Password </span>";
    header('location: register.php?m2=' . $m);
}