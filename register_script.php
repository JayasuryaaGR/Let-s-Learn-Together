<?php

require("common.php");

  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $roll_no = $_POST['roll_no'];
  $roll_no = mysqli_real_escape_string($con, $roll_no);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);
  $size_of_contact = strlen($contact);

  $city = $_POST['class'];
  $city = mysqli_real_escape_string($con, $city);

  $query = "SELECT * FROM users WHERE roll_no='$roll_no'";
  $result = mysqli_query($con, $query);
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $m = "<span class='red'> Roll Number Already Exists </span>";
    header('location: register.php?m1=' . $m);
  } else if ($size_of_contact<10) {
    $m = "<span class='red'>Not a valid phone number</span>";
    header('location: register.php?m2=' . $m);
  } else {
    
    $query = "INSERT INTO users(name, roll_no, password, contact)VALUES('" . $name . "','" . $roll_no . "','" . $password . "','" . $contact . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['roll_no'] = $roll_no;
    $_SESSION['user_id'] = $user_id;
    header('location: index.php');
  }
?>