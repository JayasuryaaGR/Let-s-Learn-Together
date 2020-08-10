<?php
if (isset($_SESSION['user_id'])) {
	header('location:post.php');
} else{
	require('common.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title> LET'S LEARN TOGETHER </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<?php
require 'header.php';
?>
<center>
<div class="panel panel-primary" style="width: 90%; margin-top: 100px;">
    <div class="panel-heading">
        <h1> RESET PASSWORD </h1>
    </div>
    <div class="panel-body">
<form method="post" action="forgot_script.php">
    <b>Status:</b><br><input type="radio" name="status" value="student" required = "true" id="student"> Student<br>
    <input type="radio" name="status" value="mentor" required = "true" id="mentor"> Mentor <br><br>
    <b>Class: </b><br><input type="radio" name="class" value="ECE G1" required = "true" id="student"> ECE G1<br>
    <input type="radio" name="class" value="ECE G2" required = "true" id="mentor"> ECE G2 <br><br>
    <b>Roll.no (If Student):</b><br>19L<input name="roll_no" maxlength="3" style="width: 75%;" id="roll_no" required="true"><br><br>
	<b>New Password:</b><br><input type="password" name="new_password" placeholder="New Password" required="true" style="width: 90%;"><br><br>
    <b>Confirm New Password:</b><br><input type="password" name="retype_new_password" placeholder="Re-type New Password" required="true" style="width: 90%;"> <br><br>
<?php
if (isset($_GET['error'])) {
	echo $_GET['error'];
}
?>
<script type="text/javascript">
    var inp1 = document.getElementById("mentor");
    inp1.oninput = function () {
        document.getElementById("roll_no").disabled = this.value!="";
    };
    var inp2 = document.getElementById("student");
    inp2.oninput = function () {
        document.getElementById("roll_no").disabled = false;
    }
</script>
	<br><input type="submit" name="submit" value="SUBMIT" class="btn btn-primary" style="width: 95%;">
    <br>
</form>
</div>
</div>
</center>
<footer class="footer fixed-bottom" style="text-align: center; background-color: black; width: 100%; height: 45px; color: white;">
    <div style="padding-top: 5px;">
        <h4> LLT | ECE | PSG College of Technology </h4>
    </div>
</footer>
</body>
</html>